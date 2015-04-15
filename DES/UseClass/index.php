<?php
include_once "./desClass.php";
global $key, $iv;
$key ="R3KdjTyu";
$iv ="20150316";
$des =new DES($key,$iv);

$str = '陈超';
$cryptStr=$des->encrypt($str);
echo $cryptStr;
echo '-----';
echo $des->decrypt($cryptStr);
exit;


