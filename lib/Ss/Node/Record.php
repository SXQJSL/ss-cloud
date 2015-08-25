<?php

namespace Ss\Node;
// extends Ss\Etc\Db
 class Record {
     private $db;
     protected $table = "ss_record";
     
     function __construct($id=0){
         global $db; 
         $this->db  = $db;
     }

    function AllRecord(){
        $datas = $this->db->select($this->table, [
            "id",
            "node_id",
            "time",
            "content"
            ],[
    "ORDER" => "id DESC",
    "LIMIT" => 15
]);
        return $datas;
    }
}