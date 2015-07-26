<?php
//引入配置文件
require_once '../../lib/config.php';
require_once '_check.php';
$port = $_POST['port'];
$enable=$_POST['enable'];
$page=$_POST['page'];
if($enable==1){
    $enable=0;
}else{
    $enable=1;
}
$u = new \Ss\User\UserInfo();
$u->Change_port_enable($port,$enable);

