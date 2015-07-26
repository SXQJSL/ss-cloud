<?php
require_once '../lib/config.php';
require_once '_check.php';
$infos=file_get_contents("php://input");
$apiuser->record($infos);
$datas=json_decode($infos);
$datas=$apiuser->object_array($datas);
$length=count($datas);
if($length==0){
    exit();
}
for($n=0;$n<$length;$n++){
    if($datas[$n]['u']<=60){
        continue;
    }
    $apiuser->updataUser($datas[$n]['p'],$datas[$n]['u'],$datas[$n]['d'],$datas[$n]['time']);
}
echo 'ok' ;