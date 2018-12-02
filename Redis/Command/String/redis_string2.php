<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$sKey = "string";
$redis->del($sKey); // 默认先删除
$sGetKey=$redis->get($sKey);
print_r("初始化key string 的值为：".$sGetKey."<br/>");
$redis->append($sKey,"hello ");
$sGetKey=$redis->get($sKey);
print_r("append赋值 string 的值为：".$sGetKey."<br/>");
$redis->append($sKey,"world!");
$sGetKey=$redis->get($sKey);
print_r("append再赋值 string 的值为：".$sGetKey."<br/>");
$sGetKey=$redis->getRange($sKey,3,7);
print_r("getRange 3,7 string 的值为：".$sGetKey."<br/>");
$redis->setRange($sKey,0,'H');
$sGetKey=$redis->get($sKey);
print_r("setRange 0 H string 的值为：".$sGetKey."<br/>");
$redis->setRange($sKey,6,'W');
$sGetKey=$redis->get($sKey);
print_r("setRange 6 W string 的值为：".$sGetKey."<br/>");
$redis->setRange($sKey,11,', how old are you');
$sGetKey=$redis->get($sKey);
print_r("setRange 11 , how old are you  string 的值为：".$sGetKey."<br/>");