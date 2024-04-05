<?php
include('../view/header.php');

session_destroy();

header('Location: '.'./login.php');
        die();
?>