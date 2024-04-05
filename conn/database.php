<?php
//STAP 1 - Initialisatie
define('HOST', 'localhost');
define('DATABASE', 'hekkensluiter');
define('USER', 'webuser');
define('PASSWORD','7q06DXjDr1Z3reXK');

$dbconn='';
//connectie maken
try {
    $dbconn = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=utf8mb4", USER,PASSWORD);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo $e->getMessage();
    echo "verbinding NIET gemaakt<br>";
}
?>