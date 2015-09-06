<?php


namespace Ss\Port;


 class Port {

     public  $port;
     private $dbc;
     private $db;

     private $table = "ss_port";

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
     
     //
     function ListPort($page){
        $page=($page-1)*15;
        $datas = $this->db->query("select * from ".$this->table." order by uid asc LIMIT $page, 15 ");
        return $datas;
     }

     //删除账号下的所有端口
     function del_uid_port(){
         $this->db->delete($this->table,[
             "uid" => $this->uid
         ]);
         return 1;
     }

     //获取 临时 temp $pass
     function get_temp_pass(){
         $a = rand(10000,99999);
         return $a;
     }

     
 }
