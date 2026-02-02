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
