<?php
class Logboek {
    public $dbconn;

    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo($searchFor){
            $qry_Select = "SELECT 
                *
                FROM logboek
                WHERE 
                id LIKE '%$searchFor%' OR 
                medewerkersId LIKE '%$searchFor%' OR 
                gevangeneId LIKE '%$searchFor%' OR
                actie LIKE '%$searchFor%' OR
                tijd LIKE '%$searchFor%'";
            $select=$this->dbconn->prepare($qry_Select);          
            $select->execute();
            return $select;
    } 
    public function setInfo($reden, $medewerkerId, $gevangeneId, $actie, $tijd, $opmerkingen){
        $qry_setLog = "INSERT INTO logboek (reden, medewerkerId, gevangeneId, actie, tijd, opmerkingen)
        VALUES (:reden, :medewerkerId, :gevangeneId, :actie, :tijd, :opmerkingen);";

        $setLog=$this->dbconn->prepare($qry_setLog);
        $setLog->execute([
            ':reden' => $reden,
            ':medewerkerId' => $medewerkerId,
            ':gevangeneId' => $gevangeneId,
            ':actie' => $actie,
            ':tijd' => $tijd,
            ':opmerkingen' => $opmerkingen

        ]);
    }
    public function update($id, $burgerservicenummer, $voornaam, $tussenvoegsel, $achternaam, $postcode, $woonplaats, $straatnaam, $geboorteplaats, $telefoon, $email, $huisnummer, $geboortedatum){
        $qry_gevangene = "UPDATE 
                    gevangene
                    SET 
                        burgerservicenummer = :burgerservicenummer,
                        voornaam = :voornaam,
                        tussenvoegsel = :tussenvoegsel,
                        achternaam = :achternaam,
                        postcode = :postcode,
                        woonplaats = :woonplaats,
                        straatnaam = :straatnaam,
                        straatnaam = :straatnaam,
                        geboorteplaats = :geboorteplaats,
                        telefoon = :telefoon,
                        email = :email,
                        geboortedatum = :geboortedatum,
                        huisnummer = :huisnummer
                        WHERE id = :id";
        $updateGevangene=$this->dbconn->prepare($qry_gevangene);
        $updateGevangene->execute([
            ':burgerservicenummer' => $burgerservicenummer,
            ':voornaam' => $voornaam,
            ':tussenvoegsel' => $tussenvoegsel,
            ':achternaam' => $achternaam,
            ':postcode' => $postcode,
            ':woonplaats' => $woonplaats,
            ':straatnaam' => $straatnaam,
            ':geboorteplaats' => $geboorteplaats,
            ':telefoon' => $telefoon,
            ':email' => $email,
            ':huisnummer' => $huisnummer,
            ':geboortedatum' => $geboortedatum,
            ':id' => $id
        ]);
    }
    public function updateCell($id, $cell){
        
        $qry_gevangenecell = "UPDATE 
                    gevangene
                    SET 
                        cell = :cell
                        WHERE id = :id";
        $updateGevangenecell=$this->dbconn->prepare($qry_gevangenecell);
        $updateGevangenecell->execute([
            ':cell' => $cell,
            ':id' => $id
        ]);
    }
}

?>