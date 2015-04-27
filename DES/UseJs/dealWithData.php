<?php

$key = $_POST['key'];
$encrypted= $_POST['message'];
$unencrypted = trim(mcrypt_decrypt(MCRYPT_DES
    , $key
    , safeHexToString($encrypted)
    , MCRYPT_MODE_ECB));


echo $unencrypted;exit;
/**
 *
 * Convert input HEX encoded string to a suitable format for decode
 * // Note: JS generates strings with a leading 0x
 *
 * @return string
 */
function safeHexToString($input)
{
    if(strpos($input, '0x') === 0)
    {
        $input = substr($input, 2);
    }
    return hex2bin($input);
}