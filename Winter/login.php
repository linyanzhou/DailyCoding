<?php
$tk = $_REQUEST['tk'];
setcookie('tk', $tk, time() + 1800);
$aTk = $_COOKIE['tk'];
file_put_contents("Demo.txt",$aTk,FILE_APPEND);
$url = 'http://zt.233.mistong.com/winter/index.html';  // 专题活动页面
header('location:' . $url);