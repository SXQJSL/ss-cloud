<?php

namespace Ss\Node;
// extends Ss\Etc\Db
 class Node {
     public  $id;
     public  $db;

     function __construct($id=0){
         global $db;
         $this->id  = $id;
         $this->db  = $db;
     }

     function AllNode(){
         $node_array = $this->db->select("ss_node","*",[
             "ORDER" => "node_order"
             //"LIMIT" => 21
         ]);
         return $node_array;
     }

     function Add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order,$node_ip,$node_free,$uid){
         $sspass = \Ss\Etc\Comm::get_random_char(24);
         $this->db->insert("ss_node", [
             "node_name" => $node_name,
             "node_type" => $node_type,
             "node_server" => $node_server,
             "node_method" => $node_method,
             "node_info" => $node_info,
             "node_status" => $node_status,
             "node_order" =>  $node_order,
             "node_key" =>  $sspass,
             "node_ip" =>  $node_ip,
             "node_free" =>  $node_free,
             "node_uid" =>  $uid
           
         ]);
         return $sspass;
     }

     function NodesArray($node_type){
         $node_array = $this->db->select("ss_node","*",[
             "node_type[=]" => $node_type,
             "ORDER" => "node_order",
             //"LIMIT" => 21
         ]);
         return $node_array;
     }
     
     function FreeNode(){
         $free_node = $this->db->select("ss_node",[ "node_ip" ],[
             "node_free" => "0",
             //"LIMIT" => 21
         ]);
         return $free_node;
     }
     
     function Get_Node_Uid($uid){
         $Get_node = $this->db->select("ss_node","*",[
             "node_uid" => $uid,
             //"LIMIT" => 21
         ]);
         return $Get_node;
     }
     
     function PlanNode($plan){
         $plan_node = $this->db->select("ss_plan","array('node')",[
             "node_free" => $plan,
             //"LIMIT" => 21
         ]);
         return $plan_node;
     }
     
     function Get_node_name($id){
         $Node_name = $this->db->select("ss_node",array("node_name"),[
             "id" => $id,
     ]);
         return $Node_name[0]['node_name'];
     }
     
     function Get_some_node_name($Node_id){
         $nodes_id=json_decode($Node_id);
         $length=sizeof($nodes_id);
         for($n=0;$n<$length;$n++){
             echo $this->Get_node_name($nodes_id[$n]).',';
         }
     } 
}