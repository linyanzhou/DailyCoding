<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);


$aWeekInfoList = [
    [
        'week' => 1,
        'star_total' => 16
    ],
    [
        'week' => 2,
        'star_total' => 18
    ],
    [
        'week' => 3,
        'star_total' => 150
    ],
];

$iUid = 1;

$sKey = "_initWeekAward_" . $iUid;
$sHasReceivedAward = "_setReceivedAward_" . $iUid;
$sWeekReceivedAward = "_hashRecordWeekAward_" . $iUid;
//$redis->del("_initWeekAward_1");
//$redis->del("_setReceivedAward_1");
//$redis->del("_hashRecordWeekAward_1");


if (empty($redis->lRange($sKey, 0, -1)) && $redis->sCard($sHasReceivedAward) == 0) {
    $redis->rPush($sKey, 85, 86, 87);
}
if ($redis->lRange($sKey, 0, -1)) {
    foreach ($redis->lRange($sKey, 0, -1) as $iAWardId) {
        foreach ($aWeekInfoList as $aWeek) {
            //如果已经领取过该奖励  则不再领取
            if(in_array($iAWardId, $redis->SMEMBERS($sHasReceivedAward))){
                continue;
            }
            if ($aWeek['star_total'] >= 15 && !$redis->hGet($sWeekReceivedAward, "w" . $aWeek['week'])) {
                if ($redis->sAdd($sHasReceivedAward, $iAWardId)) {
                    $redis->hSet($sWeekReceivedAward, "w" . $aWeek['week'], 1);
                    $redis->lPop($sKey);
                }
            }
        }
    }
}

echo "此时已经领取记录为:";
print_r($redis->hGetAll($sWeekReceivedAward)) . "<br/>";
echo "此时剩下的奖励为：";
print_r($redis->lRange($sKey, 0, -1)) . "<br/>";
echo "此时已经领取的奖励为：";
print_r($redis->SMEMBERS($sHasReceivedAward));
exit;