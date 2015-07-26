<?php

namespace Ss\Api;


class CheckIn {

    private $db;
    private $node_key;
    private $node_id;
    private $table = "ss_node"; 
    
    function __construct($node_id,$node_key){
        global $db;
        $this->node_id = $node_id;
        $this->node_key = $node_key;
        $this->db  = $db;
    }

    function ModOne(){

    }
    
    function CheckExist(){
        $datas = $this->db->select($this->table,"*",[
            "AND" =>[
            'id' => $this->node_id,
            'node_key' => $this->node_key
        ]]);
        $count=count($datas);
        if ($count==1){
        return 1;
        }else{
            return 0;     
        }
    }
}