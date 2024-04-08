<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten Portaal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    <?php
    include '../conn/database.php';
    ?>