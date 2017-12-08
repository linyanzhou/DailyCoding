<?php
$str = '1';
$str2  = addslashes(sprintf("%s", $str));
var_dump($str2);