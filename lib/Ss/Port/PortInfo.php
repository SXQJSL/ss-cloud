<?php

namespace Ss\Port;

class PortInfo{

    public  $port;
    private $db;

    protected $table_port = "port";

    function __construct($port=0){
        global $db;
        $this->port = $port;
        $this->db  = $db;
    }

    //user info array
    function PortArray(){
        $datas = $this->db->select($this->table_port,"*",[
            "port" => $this->port,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function GetPasswd(){
        return $this->UserArray()['pass'];
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

    function InviteNumToZero(){
        $this->db->update("user",[
            "invite_num" => '0'
        ],[
            "port" => $this->port
        ]);
    }

    function GetRefCount(){
        $c = $this->db->count($this->table_port,"port",[
            "ref_by" => $this->port
        ]);
        return $c;
    }

    function Get_last_check_in_time(){
        return $this->UserArray()['last_check_in_time'];
    }

    function DelMe(){
        $this->db->delete($this->table_port,[
            "port" => $this->port
        ]);
    }
    
    function Change_user_name($user_name){    
        $this->db->update($this->table_port,[
            "user_name" => $user_name
        ],['port' => $this->port]);
    }
    
    function Change_email($email){
        $this->db->update($this->table_port,[
            "email" => $email
        ],['port' => $this->port]);
    }
    
    function Change_pass($pass){
        $this->db->update($this->table_port,[
            "pass" => $pass
        ],['port' => $this->port]);
    }
    
    function Change_passwd($passwd){
        $this->db->update($this->table_port,[
            "passwd" => $passwd
        ],['port' => $this->port]);
    }
    
    function Change_plan($plan){
        $this->db->update($this->table_port,[
            "plan" => $plan
        ],['port' => $this->port]);
    }
    
    function Change_transfer_enable($transfer_enable){
        $this->db->update($this->table_port,[
            "transfer_enable" => $transfer_enable
        ],['port' => $this->port]);
    }
    

    
    function Change_port_enable($port,$enable){
        $this->db->update("port",[
            "enable" => $enable
        ],['port' => $port]);
    }
    
    
    
    function Change_remark($remark){
        $this->db->update($this->table_port,[
            "remark" => $remark
        ],['port' => $this->port]);
    }  
    

    

}