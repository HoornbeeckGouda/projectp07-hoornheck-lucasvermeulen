<?php
if (isset($_POST['submit'])) {
    //als het formulier gepost is:
    $username = $_POST['username'];
    $secretKey = "6LeBiIEpAAAAAKF4685f5ZXEDTTHjc2SyLSHrpOI";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP= $_SERVER['REMOTE_ADDR'];
    //aanroepen api:
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    //echo $response.'<br>';
    $response = json_decode($response);
    echo var_dump($response).'<br>';
    if ($response->success) {
        echo "Verification success. Your name is: $username";
        header('Location: '.'../hekkensluiter/overzicht.php');
        die();
    }
    else {
        echo "Verification failed!";
    }
}

?>