<?php

function encNanoSec($in) {
    $saltKey = 'ssHGHGGGJGKGGVN5hj8xxffFFnanoX4kih';
    $method = 'AES-256-CBC';

    // Generate a 256-bit key and a 16-byte IV
    $key = hash('sha256', $saltKey, true);
    $iv = substr(hash('sha256', 'iv' . $saltKey), 0, 16);

    // Encrypt the input string
    $encrypted = openssl_encrypt($in, $method, $key, OPENSSL_RAW_DATA, $iv);

    // Encode for safe storage
    return base64_encode($encrypted);
}

function decNanoSec($in) {
    $saltKey = 'ssHGHGGGJGKGGVN5hj8xxffFFnanoX4kih';
    $method = 'AES-256-CBC';

    // Generate the same key and IV
    $key = hash('sha256', $saltKey, true);
    $iv = substr(hash('sha256', 'iv' . $saltKey), 0, 16);

    // Decrypt and return
    $decrypted = openssl_decrypt(base64_decode($in), $method, $key, OPENSSL_RAW_DATA, $iv);
    return rtrim($decrypted, "\0");
}

?>
