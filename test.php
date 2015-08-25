<?php
header("Content-type:application/json");
$datas['1']="1";
$datas['2']="2";
$datas['3']="3";
$datas['4']="4";
$en_datas = json_encode($datas);
echo $en_datas;
?>