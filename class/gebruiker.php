<?php
class gebruiker {
    public $dbconn;
    private $selectQry;



    public function __construct($dbconn){
        $this->dbconn = $dbconn;
    }

    public function getInfo($email){
            $qry_Select = "SELECT g.`id`, g.`email`, g.`wachtwoord`, g.`rolId`, g.`voornaam`, g.`tussenvoegsel`, g.`achternaam`, g.`telefoon`, g.`start_datum`, rol.naam AS rolName 
            FROM gebruiker AS g INNER JOIN rol ON g.`rolId` = rol.id WHERE email = '$email'";
            $select=$this->dbconn->prepare($qry_Select);
            $select->execute();
            return $select;
    } 
    public function getAll(){
        $qry_Select = "SELECT g.`id`, g.`email`, g.`wachtwoord`, g.`rolId`, g.`voornaam`, g.`tussenvoegsel`, g.`achternaam`, g.`telefoon`, g.`start_datum`, rol.naam AS rolName FROM gebruiker AS g INNER JOIN rol ON g.`rolId` = rol.id";
        $select=$this->dbconn->prepare($qry_Select);
        $select->execute();
        return $select;
} 
    public function checkPassword($email, $password){
        $qry_GetPassword = "SELECT 
                *
                FROM gebruiker 
                WHERE email = '$email'";
        $GetPassword=$this->dbconn->prepare($qry_GetPassword);
        $GetPassword->execute();
        
        $GetPassword->setFetchMode(PDO::FETCH_BOTH);
        $CorrectPassword = null;
        
        foreach($GetPassword as $row) {
            // $hash = password_hash('1234', PASSWORD_DEFAULT);
            $CorrectPassword = password_verify($password, $row['wachtwoord']);

        }
        return $CorrectPassword;
    }
}

?>