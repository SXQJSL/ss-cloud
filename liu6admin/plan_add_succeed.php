<?php
require_once '../lib/config.php';
require_once 'function/_check.php';
    $plan_code     = $_POST['plan_code'];
    $plan_describe     = $_POST['plan_describe'];
    $plan_node   = json_encode(explode(",",$_POST['plan_node']));
    $plan_transfer   = $_POST['plan_transfer'];
    $plan_type     = $_POST['plan_type'];
    
    $plan = new Ss\User\Plan($uid);
    $query = $plan->Add($plan_code,$plan_describe,$plan_node,$plan_transfer,$plan_type);
    if($query){
        echo ' <script>alert("添加成功!")</script> ';
        echo " <script>window.location='plan.php';</script> " ;
    }

?>