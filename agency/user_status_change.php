<?php
//引入配置文件
require_once '../lib/config.php';
require_once '_check.php';
$uid = $_GET['uid'];
$status=$_GET['enable'];
$page=$_GET['page'];
$u = new \Ss\User\UserInfo($uid);
$u->Change_enable($status);
echo ' <script>alert("更改成功!")</script> ';
echo " <script>window.location='user.php?page=$page';</script> " ;
