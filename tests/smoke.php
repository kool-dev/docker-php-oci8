<?php

function check($condition, $message)
{
    if (!$condition) {
        fwrite(STDERR, $message . "\n");
        exit(1);
    }
}

check(PHP_VERSION === getenv('EXPECTED_PHP_VERSION'), 'PHP must match the freshly pulled parent');
check(extension_loaded('oci8'), 'oci8 must load');
check(function_exists('oci_connect'), 'OCI connection API must be available');
check(oci_client_version() === '11.2.0.4.0', 'The bundled Instant Client must load');

// Exercise the native client without a database or external network access.
$connection = @oci_connect('invalid', 'invalid', '//127.0.0.1:1/XE');
check($connection === false, 'Connection to an unused loopback port must fail');
$error = oci_error();
check(is_array($error) && $error['code'] === 12541, json_encode($error));

echo 'PHP ', PHP_VERSION, '; OCI8 ', phpversion('oci8'),
    '; Instant Client ', oci_client_version(), "; native client smoke checks passed\n";
