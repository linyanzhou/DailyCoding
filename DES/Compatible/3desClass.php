<?php
//使用前保证在php.ini中打开了extension=php_mcrypt.dll
function encrypt($string) {

    //加密用的密钥文件

    $key = "R3KdjTyu";

    //加密方法

    $cipher_alg = MCRYPT_TRIPLEDES;

    //初始化向量来增加安全性

    $iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher_alg,MCRYPT_MODE_ECB), MCRYPT_RAND);

    //开始加密

    $encrypted_string = mcrypt_encrypt($cipher_alg, $key, $string, MCRYPT_MODE_ECB, $iv);

    return base64_encode($encrypted_string);//转化成16进制

}



function decrypt($string) {

    $string = base64_decode($string);



    //解密用的密钥文件

    $key = "R3KdjTyu";



    //解密方法

    $cipher_alg = MCRYPT_TRIPLEDES;

    //初始化向量来增加安全性

    $iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher_alg,MCRYPT_MODE_ECB), MCRYPT_RAND);


    //开始解密

    $decrypted_string = mcrypt_decrypt($cipher_alg, $key, $string, MCRYPT_MODE_ECB, $iv);

    return trim($decrypted_string);

}