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

        public function updatezaak($id, $opmerkingen){
            $qry_zaak = "UPDATE 
                        zaak
                        SET 
                        opmerkingen = :opmerkingen
                            WHERE id = :id";
            $zaak=$this->dbconn->prepare($qry_zaak);
            $zaak->execute([
                ':opmerkingen' => $opmerkingen,
                ':id' => $id
            ]);
        }
        public function setzaak($gevangeneId, $reden, $opmerkingen, $StrafLengte){
            $qry_setzaak = "INSERT INTO zaak (gevangeneId,reden, opmerkingen, StrafLengte)
                                                VALUES (:gevangeneId,:reden, :opmerkingen, :StrafLengte);";
            $setzaak=$this->dbconn->prepare($qry_setzaak);
            $setzaak->execute([
                ':gevangeneId' => $gevangeneId,
                ':reden' => $reden,
                ':opmerkingen' => $opmerkingen,
                ':StrafLengte' => $StrafLengte
            ]);
        }


    }

?>