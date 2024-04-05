<?php
class Zaak {
    public $dbconn;

    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo($id){
            $qry_Select = "SELECT * FROM zaak WHERE gevangeneid = :gevangeneid ";
            $select=$this->dbconn->prepare($qry_Select);
            $select->execute([
            ':gevangeneid' => $id
            ]);
            return $select;
    } 
    public function getZaakFromID($id){
        $qry_Select = "SELECT * FROM zaak WHERE id = :id ";
        $select=$this->dbconn->prepare($qry_Select);
        $select->execute([
        ':id' => $id
        ]);
        return $select;} 

        public function updatezaak($id, $reden){
            $qry_zaak = "UPDATE 
                        zaak
                        SET 
                            reden = :reden
                            WHERE id = :id";
            $zaak=$this->dbconn->prepare($qry_zaak);
            $zaak->execute([
                ':reden' => $reden,
                ':id' => $id
            ]);
        }
        public function setzaak($gevangeneId, $reden){
            $qry_setzaak = "INSERT INTO zaak (gevangeneId,reden)
                                                VALUES (:gevangeneId,:reden);";
            $setzaak=$this->dbconn->prepare($qry_setzaak);
            $setzaak->execute([
                ':gevangeneId' => $gevangeneId,
                ':reden' => $reden
            ]);
        }


    }

?>