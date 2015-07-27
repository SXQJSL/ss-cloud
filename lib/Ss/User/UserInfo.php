<?php

namespace Ss\User;


class UserInfo {

    public  $uid;
    private $db;

    protected $table_user = "user";

    function __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
    }

    //user info array
    function UserArray(){
        $datas = $this->db->select($this->table_user,"*",[
            "uid" => $this->uid,
            "LIMIT" => "1"
        ]);
        return $datas['0'];
    }

    function GetPasswd(){
        return $this->UserArray()['pass'];
    }

    function GetEmail(){
        return $this->UserArray()['email'];
    }

    function GetUserName(){
        return $this->UserArray()['user_name'];
    }

    function RegDate(){
        return $this->UserArray()['reg_date'];
    }

    function RegDateUnixTime(){
        return strtotime($this->RegDate());
    }

    function InviteNum(){
        return $this->UserArray()['invite_num'];
    }

    function InviteNumToZero(){
        $this->db->update("user",[
            "invite_num" => '0'
        ],[
            "uid" => $this->uid
        ]);
    }

    function Money(){
        return $this->UserArray()['money'];
    }

    function AddMoney($money){
        $this->db->update("user",[
            "money[+]" => $money
        ],[
            "uid" => $this->uid
        ]);
    }

    function GetRefCount(){
        $c = $this->db->count($this->table_user,"uid",[
            "ref_by" => $this->uid
        ]);
        return $c;
    }

    function Get_last_check_in_time(){
        return $this->UserArray()['last_check_in_time'];
    }
    
    function UpdatePwd($pass){
        $this->db->update("user",[
            "pass" => $pass
        ],[
            "uid" => $this->uid
        ]);
    }

    function IsAdmin(){
        if($this->db->has("ss_user_admin",[
            "uid" => $this->uid
        ])){
            return true;
        }else{
            return false;
        }
    }

    function DelMe(){
        $this->db->delete($this->table_user,[
            "uid" => $this->uid
        ]);
    }
    
    function Change_user_name($user_name){    
        $this->db->update($this->table_user,[
            "user_name" => $user_name
        ],['uid' => $this->uid]);
    }
    
    function Change_email($email){
        $this->db->update($this->table_user,[
            "email" => $email
        ],['uid' => $this->uid]);
    }
    
    function Change_pass($pass){
        $this->db->update($this->table_user,[
            "pass" => $pass
        ],['uid' => $this->uid]);
    }
    
    
    
    function Change_enable($enable){
        $this->db->update($this->table_user,[
            "enable" => $enable
        ],['uid' => $this->uid]);
    } 
    
    function Get_username1($uid){
         $this->uid=$uid;
         return $this->UserArray()['user_name'];
    }
    

    

}