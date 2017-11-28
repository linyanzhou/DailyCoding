<?php
$str = 'fdjborsnabcdtghrjosthabcrgrjtabc';
$find = 'abc';
preg_match_all('/' . $find . '/', $str, $matches);
print_r($matches)  ;
exit;