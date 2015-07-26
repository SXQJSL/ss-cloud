<?php
if(!empty($_GET)){
        $node_id = $_GET['node_id'];
        $node_key = $_GET['node_key'];
        $C = new \Ss\Api\CheckIn($node_id,$node_key);
        if($C->CheckExist()!=1){
            $data['msg']='the id not empty';
            $datas=json_encode($data);
            echo $datas;
            exit();
        }        
}else{
    $data['msg']='the id not empty';
    $datas=json_encode($data);
    echo $datas;
    exit();
}
$apiuser = new Ss\Api\User($node_id);
