<?php
require_once '../../lib/config.php';
require_once '_check.php';
    $gift_num = $_POST['gift_num'];
    $num=$gift_num*$togb; 
    $U= new Ss\Port\User();
    $datas=$U->Alluser();
    $length=count($datas);
    for($n=0;$n<$length;$n++){
        $nums=$datas[$n]['transfer_enable']+$num;
        $U->updata_transfer($datas[$n]['uid'], $nums);
    }
?>