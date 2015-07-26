<?php

namespace Ss\User;


class Plan {

    public  $uid;
    private $db;

    private $table = "ss_plan";

    function __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

     function Add($plan_code,$plan_describe,$plan_node,$plan_transfer,$plan_type){
         $this->db->insert("ss_plan", [
             "plan" => $plan_code,
             "uid" => $this->uid,
             "content" => $plan_describe,
             "transfer" => $plan_transfer,
             "node" => $plan_node,
             "type" => $plan_type
         ]);
         return 1;
     }
    
    function AllPlan(){
        $datas = $this->db->select($this->table,"*");
        return $datas;
        }
        
    function PlanNode($plan){
            $plan_node = $this->db->select($this->table,array("node"),[
                "plan" => $plan,
            ]);
            return $plan_node[0]['node'];
        }
       
   function DelPlan($id){
            $this->db->delete($this->table,[
                "id" => $id
            ]);
        }
}