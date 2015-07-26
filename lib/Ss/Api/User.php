<?php

namespace Ss\Api;


class User {

    private $db;
    private $node_id;
    private $table = "user"; 
    
    function __construct($node_id){
        global $db;
        $this->node_id = $node_id;
        $this->db  = $db;
    }

    function ModOne(){

    }
    
    function GetUser(){
        $plans = $this->db->queryown('SELECT plan FROM ss_plan WHERE node LIKE \'%'.$this->node_id.'%\'');
        $datas = $this->db->selectpdo($this->table,["port","u","d","transfer_enable","passwd","switch","enable"],[  
             'plan'=>$plans
            ]);
        if($datas==null){
            return 0;
        }
        return json_encode($datas);
    }
    
    function updataUser($port,$u,$d,$time){
        $last_data=$this->db->select("user",["u","d"],[
           'port'=>$port
        ]);
        $updata = $this->db->update("user",[
            't'=>$time,
            'u'=>$u+$last_data[0]['u'],
            'd'=>$d+$last_data[0]['d']
        ],[
            'port'=>$port
        ]);
    
    }
    
    function record($infos){
        $plans = $this->db->insert("ss_record", [
            "node_id"=>$this->node_id,
            "time"=>time(),
            "content"=>$infos
        ]);
    }
    
    function object_array($array){
        if(is_object($array)){
            $array = (array)$array;
        }
        if(is_array($array)){
            foreach($array as $key=>$value){
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
}