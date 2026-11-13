## Description

Minimal PHP Docker image with Oracle OCI8 drivers. It's use is intended for [kool.dev](https://github.com/kool-dev/kool), but can fit in any other PHP use-case.

This image is based on [kooldev/php](https://github.com/kool-dev/docker-php), please refer to that repo README for further documentation.

## Available Tags

### 8.4

- [8.4-oci8-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.4-oci8-nginx/Dockerfile)
- [8.4-oci8-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.4-oci8-nginx-prod/Dockerfile)

### 8.4 with Swoole

- [8.4-oci8-swoole-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.4-oci8-swoole-nginx/Dockerfile)
- [8.4-oci8-swoole-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.4-oci8-swoole-nginx-prod/Dockerfile)

### 8.3

- [8.3-oci8-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.3-oci8-nginx/Dockerfile)
- [8.3-oci8-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.3-oci8-nginx-prod/Dockerfile)

### 8.3 with Swoole

- [8.3-oci8-swoole-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.3-oci8-swoole-nginx/Dockerfile)
- [8.3-oci8-swoole-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.3-oci8-swoole-nginx-prod/Dockerfile)

### 8.2

- [8.2-oci8-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.2-oci8-nginx/Dockerfile)
- [8.2-oci8-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.2-oci8-nginx-prod/Dockerfile)

### 8.2 with Swoole

- [8.2-oci8-swoole-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/8.2-oci8-swoole-nginx/Dockerfile)
- [8.2-oci8-swoole-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/8.2-oci8-swoole-nginx-prod/Dockerfile)

There are also older versions available like [7.4-oci8-nginx](https://github.com/kool-dev/docker-php-oci8/blob/main/7.4-oci8-nginx/Dockerfile), [7.4-oci8-nginx-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/7.4-oci8-nginx-prod/Dockerfile).

## Environment Variables

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

### NGINX

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

### Swoole

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php-swoole).

## Usage

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

## Contributing

### Update images with templates

The Dockerfile's are automatically managed by `fwd-template.json` configuration file and files in the `template` folder. We should always make changes directly to these files.

After any changes, we need to run `kool run template` to parse the templates and generate folder/files for each version.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Rebuilds and validation

CI rebuilds on `docker-php-updated` and `docker-php-swoole-updated` repository
dispatches and every Monday as a fallback, using `docker build --pull` to
refresh each parent. The Swoole follow-up event is sent after all of its image
publications succeed, rebuilding OCI8 against those newly published parents.
Workflow runs are serialized by ref so an early PHP-triggered rebuild cannot
publish over the subsequent Swoole-triggered rebuild. Only superseded PR runs
are canceled; main-branch release runs are allowed to finish. Dispatch delivery
still requires the upstream PHP repository's dispatch credentials and OCI8
recipient configuration. Only builds on this repository's `main` branch publish
images; PRs do not.

To validate a local build:

```sh
python3 tests/check-generated.py
docker build --pull -t oci8-test 8.4-oci8-nginx
bash tests/test-image.sh oci8-test 8.4-oci8-nginx/Dockerfile
```

The smoke test checks PHP against the freshly pulled parent, OCI8, native
Instant Client loading, and the expected Oracle no-listener error from a
loopback connection. It is bounded to 30 seconds. Instant Client 11.2 hangs
in the tested Alpine image with Docker's `--network none`, so this check uses
the normal bridge but connects only to loopback. It does not test
authentication, queries, TLS, SQL*Plus, or a live Oracle database.

These images remain **amd64-only**. The template still downloads legacy Oracle
Instant Client 11.2 x64 ZIPs from a third-party GitHub repository's mutable
`master` branch without checksum verification. Successful loading is not
provenance or security validation. Replacing that source/client and adding ARM
support require separate licensing, provenance, and compatibility review.
Swoole variants depend on the separately published Swoole parents; verify
delivery of the post-publication follow-up event as well as the PHP event.
After merging, maintainers must publish and verify every supported tag's
runtime version and digest before considering stale published images fixed.
