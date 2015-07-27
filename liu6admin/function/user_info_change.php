<?php
//引入配置文件
require_once '../../lib/config.php';
require_once '_check.php';
$uid = $_POST['uid'];
$u = new \Ss\User\UserInfo($uid);
$n = new \Ss\User\Plan($uid);
$user_name = $_POST['user_name'];
$email = $_POST['user_email'];
$pass = $_POST['user_pass'];
if($pass!=null){
$pass = \Ss\User\Comm::SsPW($pass);
}
$status = $_POST['status'];
$passwd = $_POST['user_passwd'];
$plan = $_POST['user_plan'];
$transfer_enable = $_POST['transfer_enable']*$togb;
$remark = $_POST['remark'];
$u->Change_user_name($user_name);
$u->Change_email($email);
if ($pass!=null){
$u->Change_pass($pass);
}
if ($status==0 or $status==1){
    $u->Change_enable($status);
}
$u->Change_passwd($passwd);
if($plan!=null){
$u->Change_plan($plan);
}
if ($transfer_enable!=null){
$u->Change_transfer_enable($transfer_enable);
}
if ($remark!=null){
    $u->Change_remark($remark);
}
$page=$_POST['page'];
echo ' <script>alert("更新成功")</script> ';
echo " <script>window.location='user.php?page=$page';</script> " ;
