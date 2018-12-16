<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);


$key = 'ex-set-key';
$key2 = 'ex-set-key2';

$redis->sAdd($key,'a','b','c');

print_r( "sadd 赋值后 key ex-set-key 的值为：").var_dump($redis->sMembers($key))."\t\n";

$redis->sRem($key,'c','d');
print_r( "sRem 赋值后 key ex-set-key 的值为：").var_dump($redis->sMembers($key))."\t\n";
$redis->sRem($key,'c','d');
print_r( "再次 sRem 赋值后 key ex-set-key 的值为：").var_dump($redis->sMembers($key))."\t\n";

print_r( "scard key ex-set-key 的值为：").var_dump($redis->sCard($key))."\t\n";

$redis->sMove($key,$key2,'a');

print_r( "smove  ex-set-key ex-set-key2 a  后 key ex-set-key 的值为：").var_dump($redis->sMembers($key))."\t\n";


$redis->sMove($key,$key2,'c');

print_r( "smove  ex-set-key ex-set-key2 c  后 key ex-set-key2 的值为：").var_dump($redis->sMembers($key2))."\t\n";

