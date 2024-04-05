<?php
class gevangene {
    public $dbconn;

    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo($searchFor){
        if($_SESSION['gebruiker']['rol'] == 'maatschappelijkewerker'){
            $qry_Select = "SELECT 
                *
                FROM gevangene
                WHERE 
                medewerkersid = :medewerkerid AND ( 
                cell LIKE '%$searchFor%' OR 
                 voornaam LIKE '%$searchFor%' OR 
                tussenvoegsel LIKE '%$searchFor%' OR
                achternaam LIKE '%$searchFor%' OR
                postcode LIKE '%$searchFor%' OR
                straatnaam LIKE '%$searchFor%' OR
                woonplaats LIKE '%$searchFor%' OR
                huisnummer LIKE '%$searchFor%' ) ";
            $select=$this->dbconn->prepare($qry_Select);
            $select->bindParam(":medewerkerid",$_SESSION['gebruiker']['id']);
        }else{
            $qry_Select = "SELECT 
                *
                FROM gevangene
                WHERE  
                cell LIKE '%$searchFor%' OR 
                 voornaam LIKE '%$searchFor%' OR 
                tussenvoegsel LIKE '%$searchFor%' OR
                achternaam LIKE '%$searchFor%' OR
                postcode LIKE '%$searchFor%' OR
                straatnaam LIKE '%$searchFor%' OR
                woonplaats LIKE '%$searchFor%' OR
                huisnummer LIKE '%$searchFor%' ";
            $select=$this->dbconn->prepare($qry_Select);
        }

            $select->execute();
            return $select;
    } 
    public function GetFromId($id){
        $qry_Select = "SELECT 
                *
                FROM gevangene
                WHERE id = :CheckId";
            $select=$this->dbconn->prepare($qry_Select);


            $select->execute(['CheckId' => $id]);
            return $select;
    }

    public function setGevangene($cell,$medewerkersid, $burgerservicenummer, $voornaam, $tussenvoegsel, $achternaam, $postcode, $woonplaats, $straatnaam, $huisnummer, $geboorteplaats, $telefoon, $email,  $geboortedatum, $foto){
        $foto = file_get_contents($foto['tmp_name']);
        
        $qry_setGevangene = "INSERT INTO gevangene (cell,medewerkersid, voornaam, tussenvoegsel, achternaam, postcode, straatnaam, woonplaats, geboorteplaats, huisnummer, burgerservicenummer, geboortedatum, telefoon, email, foto)
                                            VALUES (:cell,:medewerkersid, :voornaam, :tussenvoegsel, :achternaam, :postcode, :straatnaam, :woonplaats, :geboorteplaats, :huisnummer, :burgerservicenummer, :geboortedatum, :telefoon, :email, :foto);";
        $setGevangene=$this->dbconn->prepare($qry_setGevangene);
        $setGevangene->execute([
            ':cell' => $cell,
            ':medewerkersid' => $medewerkersid,
            ':voornaam' => $voornaam,
            ':tussenvoegsel' => $tussenvoegsel,
            ':achternaam' => $achternaam,
            ':postcode' => $postcode,
            ':woonplaats' => $woonplaats,
            ':straatnaam' => $straatnaam,
            ':huisnummer' => $huisnummer,
            ':burgerservicenummer' => $burgerservicenummer,
            ':geboorteplaats' => $geboorteplaats,
            ':telefoon' => $telefoon,
            ':email' => $email,
            ':geboortedatum' => $geboortedatum,
            ':foto' => $foto
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