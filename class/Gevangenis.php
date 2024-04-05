<?php
class Gevangenis {
    public $dbconn;

    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo(){
            $qry_Select = "SELECT * FROM gevangenis";
            $select=$this->dbconn->prepare($qry_Select);
            $select->execute();
            return $select;
    } 
}

?>