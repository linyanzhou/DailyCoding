<?php

#防误确认
if(!bat::confirm()){
    bat::message("用户取消");
    exit;
}

#全局变量
global $x;

$x = 12345;

#添加任务
bat::run('a');
bat::run('b', __LINE__);
bat::run('c');
bat::run('b', __LINE__);
bat::run('a');

#启动任务
bat::start();

#任务函数
function a(){
    global $x;
    do{
        bat::notify("我是通知主进程显示的提示文字，测试变量 \$x = " . $x++);
        usleep(500000);
    }while(mt_rand(100, 999) > 159);
}

function b($line){
    do{
        bat::notify("我是显示传递的参数 \$line = $line");
        usleep(500000);
    }while(mt_rand(100, 999) > 359);
}

function c(){
    global $x;
    bat::notify("多个任务之间的初始变量值不受影响， \$x = $x");
    bat::notify("我是暂停 9 秒时间测试");
    sleep(9);
    bat::notify("我是出错代码 5 测试");
    exit(5);
}

?>