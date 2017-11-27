<?php
require_once 'CJsonWebServiceClient.php';
$aCfg = ['debug'=>false, 'package_security_pub_key'=>[],
    'access_key'=>1110,
    'sign_pub_key'=>'2cbca44843a864533ec05b321ae1f9d1',
    'url'=>'http://tlapis-class.leoao.com/',
];

$o = new CJsonWebServiceClient($aCfg);


$data = array(
    'coach_id'=>14,
    'idx_date'=> '2017-09-18',
    'snatch_content_id' => 143
);

$res = $o->exec('public_platform.class_sys.snatch_class.front.operate','COACH_SNATCH_SCHEDULE',$data);

print_r($res);exit;