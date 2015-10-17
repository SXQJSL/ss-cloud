<?php
//引入配置文件
require_once '../../lib/config.php';
require_once '_check.php';
$sub  = $_POST['code_sub'];
$type = $_POST['code_type'];
$num  = $_POST['code_num'];
$c = new \Ss\User\InviteCode();
$c->AddCode($sub,$type,$num);
return $sub;
