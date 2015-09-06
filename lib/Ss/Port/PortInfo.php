<?php

namespace Ss\Port;

class PortInfo{

    public  $port;
    private $db;

    protected $table = "ss_port";

    function __construct($port=0){
        global $db;
        $this->port = $port;
        $this->db  = $db;
    }

    //user info array
    function PortArray(){
        $datas = $this->db->select($this->table,"*",[
            "port" => $this->port,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function GetPasswd(){
        return $this->UserArray()['passwd'];
    }

    
    function GetPlan(){
        return $this->UserArray()['plan'];
    }

    function RegDate(){
        return $this->UserArray()['reg_date'];
    }

    function RegDateUnixTime(){
        return strtotime($this->RegDate());
    }

    function GetRefCount(){
        $c = $this->db->count($this->table,"port",[
            "ref_by" => $this->port
        ]);
        return $c;
    }

    function Get_last_check_in_time(){
        return $this->UserArray()['last_check_in_time'];
    }

    function Del_port(){
        $this->db->delete($this->table,[
            "port" => $this->port
        ]);
    }
    
    function Change_passwd($passwd){
        $this->db->update($this->table,[
            "passwd" => $passwd
        ],['port' => $this->port]);
    }
    
    function Change_plan($plan){
        $this->db->update($this->table,[
            "plan" => $plan
        ],['port' => $this->port]);
    }
    
    function Change_transfer_enable($transfer_enable){
        $this->db->update($this->table,[
            "transfer_enable" => $transfer_enable
        ],['port' => $this->port]);
    }
    
    function Change_port_enable($port,$enable){
        $this->db->update($this->table,[
            "enable" => $enable
        ],['port' => $port]);
    }
     
    function Change_remark($remark){
        $this->db->update($this->table,[
            "remark" => $remark
        ],['port' => $this->port]);
    }  
    

    

}