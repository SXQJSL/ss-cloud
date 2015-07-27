<?php


namespace Ss\Port;


 class Port {

     public  $port;
     private $dbc;
     private $db;

     private $table = "port";

     function __construct($port=0){
         global $dbc;
         global $db;
         $this->port = $port;
         $this->dbc = $dbc;
         $this->db  = $db;
     }

     function Page($page){
         if ($page==null){return 1;}
         elseif ($page==1||$page==0){return 1;}
         else {return $page;}  
     }
     
     function ListPort($page){
        $page=($page-1)*15;
        $datas = $this->db->query("select * from port order by uid asc LIMIT $page, 15 ");
        return $datas;
     }

     function updata($user_name,$user_email,$user_pass,$user_passwd,$transfer_enable){
         $sql = " UPDATE `user` SET
                  `user_name` = '$user_name',
                  `email` = '$user_email',
                  `pass` = '$user_pass',
                  `passwd` = '$user_passwd',
                  `transfer_enable` = '$transfer_enable'
                  WHERE  `uid` = '$this->uid' ";
         $query = $this->dbc->query($sql);
         return $query;
     }
     //del user
     function del(){
         $this->db->delete("user",[
             "uid" => $this->uid
         ]);
         return 1;
     }

     //获取 临时 temp $pass
     function get_temp_pass(){
         $a = rand(10000,99999);
         return $a;
     }

     //判断username是否可用
     //可用,用户名不存在返回1
     function is_username_used($username){
         if($this->db->has("user",[
             "user_name" => $username
         ])){
             //用户名不可用
             return 0;
         }else{
             //用户名可用
             return 1;
         }
     }

     //is email used
     function is_email_used($email){
         if($this->db->has("user",[
             "email" => $email
         ])){
             return 0;
         }else{
             return 1;
         }
     }

     //login check
     function login_check($username,$passwd){
         if($this->db->has("user",[
             "AND" => [
                 "OR" => [
                     "user_name" => $username,
                     "email" => $username
                 ],
                 "pass" => $passwd
             ]
         ])){
             return 1;
         }else{
             return 0;
         }
     }

     //根据用户名返回UID
     function get_user_uid($username){
         $datas = $this->db->select("user","*", [
             "OR" => [
                 "user_name" => $username,
                 "email" => $username
             ],
             "LIMIT" => 1
         ]);
         return $datas['0']['uid'];
     }

     // 用户注册 $pass ss密码
     function reg($username,$email,$pass,$passwd,$plan,$transfer,$port,$invite_num,$money){
         $sql ="INSERT INTO `user` (`uid`, `user_name`, `email`, `pass`, `passwd`, `t`, `u`, `d`, `plan`, `transfer_enable`, `port`, `switch`, `enable`, `type`, `reg_date`,`invite_num`,`money`)
           VALUES (NULL, '$username', '$email', '$pass', '$passwd', '0', '0', '0', 'A', '$transfer', '$port', '1', '1', '7', now(),$invite_num,$money)";
         $query = $this->dbc->query($sql);
         $this->db->insert("user",[
             "user_name" => $username,
             "email"     => $email,
             "pass" => $pass,
             "passwd" => $passwd,
             "t"  => "0",
             "u"  => "0",
             "d"  => "0",
             "plan" => $plan,
             "transfer" => $transfer,
             "port"  => $port,
             "invite_num" => $invite_num,
             "money" => $money
         ]);
         if($query){
             return 1;
         }else{
             return 0;
         }
     }

     function UpdatePWd($pwd){
         $this->db->update("user",[
            "pass" => md5($pwd)
         ],[
             "uid" => $this->uid
         ]);
     }
     
     function getIp(){
         $onlineip='';
         if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){
             $onlineip=getenv('HTTP_CLIENT_IP');
         } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){
             $onlineip=getenv('HTTP_X_FORWARDED_FOR');
         } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){
             $onlineip=getenv('REMOTE_ADDR');
         } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){
             $onlineip=$_SERVER['REMOTE_ADDR'];
         }
         return $onlineip;
     }
    
     function updata_transfer($uid,$num){
         $this->db->update("user",[
             "transfer_enable" => $num
         ],[
             "uid" => $uid
         ]);
     }
     
     function Alluser(){
         $datas = $this->db->select("user",["uid","transfer_enable"]);
         return $datas;
     }
 }
