## Description

Minimal PHP Docker image with Oracle OCI8 drivers. It's use is intended for [kool.dev](https://github.com/kool-dev/kool), but can fit in any other PHP use-case.

This image is based on [kooldev/php](https://github.com/kool-dev/docker-php), please refer to that repo README for further documentation.

## Available Tags

### 7.4

- [7.4-nginx-oci8](https://github.com/kool-dev/docker-php-oci8/blob/main/7.4-nginx-oci8/Dockerfile)
- [7.4-nginx-oci8-prod](https://github.com/kool-dev/docker-php-oci8/blob/main/7.4-nginx-oci8-prod/Dockerfile)

## Environment Variables

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

### NGINX

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

## Usage

Please refer to [kooldev/php](https://github.com/kool-dev/docker-php).

## Contributing

### Update images with templates

- [fwd](https://github.com/fireworkweb/fwd#fireworkwebfwd)

You should change `fwd-template.json` and `template` folder.

After your changes, just run `kool docker fireworkweb/fwd:v1.0 fwd template` to compile the template and generate all version folder/files.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
