<?php
//引入配置文件
require_once '../lib/config.php';
require_once 'function/_check.php';
$id = $_GET['id'];
$u = new \Ss\User\Plan();
$u->DelPlan($id);
echo ' <script>alert("删除成功!")</script> ';
echo " <script>window.location='plan.php';</script> " ;
