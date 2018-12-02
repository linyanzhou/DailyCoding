<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$sKey = "mrc";
$redis->del($sKey); // 默认先删除
$iGetKey=$redis->get($sKey);
print_r("初始化获取key mrc 的值为：".$iGetKey."<br/>");
$redis->set($sKey,7);
$iGetKey=$redis->get($sKey);
print_r("获取key mrc 的值为：".$iGetKey);
