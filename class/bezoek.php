<?php
class bezoek {
    public $dbconn;
    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo($searchFor){
        $qry_Select = "SELECT 
            *
            FROM bezoek
            WHERE
            id LIKE '%$searchFor%' OR
            gevangeneNaam LIKE '%$searchFor%' OR
            reden LIKE '%$searchFor%'
            ";
        $select=$this->dbconn->prepare($qry_Select);
        $select->execute();
        return $select;
    } 

    public function insertBezoek($gevangeneNaam, $reden, $bezoekTijd) {
        // Voorbereiden van de SQL-query
        $query = "INSERT INTO bezoek (gevangeneNaam, reden, bezoekTijd) VALUES (:gevangeneNaam, :reden, :bezoekTijd)";
        
        // Voorbereiden van de statement
        $statement = $this->dbconn->prepare($query);
        
        // Uitvoeren van de query
        $statement->execute([
            ':gevangeneNaam' => $gevangeneNaam,
            ':reden' => $reden,
            ':bezoekTijd' => $bezoekTijd
        ]);
    }

}

?>