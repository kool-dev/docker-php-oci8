#!/usr/bin/env bash
set -euo pipefail

image="${1:?image required}"
dockerfile="${2:?Dockerfile required}"
parent="$(awk '$1 == "FROM" { print $2; exit }' "$dockerfile")"
docker pull "$parent"
expected="$(docker run --rm --network none --entrypoint php "$parent" -r 'echo PHP_VERSION;')"

# Instant Client 11.2 hangs on Alpine with Docker's network=none.
# Use the normal bridge, but connect only to the container's loopback address.
docker run --rm -i --entrypoint timeout \
  -e EXPECTED_PHP_VERSION="$expected" "$image" 30 php < tests/smoke.php
