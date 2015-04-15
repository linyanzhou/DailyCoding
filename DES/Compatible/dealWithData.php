<?php
include("./3desClass.php");

$content = "陈超/23@%^&`";

$encrypted = encrypt($content);

$decrypted = decrypt($encrypted);

echo $encrypted;

echo '<br/>';

echo $decrypted;