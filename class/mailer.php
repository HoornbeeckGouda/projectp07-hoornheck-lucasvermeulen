<?php
// Deze dependencies laden we handmatig in...
use PHPMailer\PHPMailer\PHPMailer;
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
// deze functie stuurt e-mails via je mailaccount...
function mailen($mailTo, $ontvangerNaam, $onderwerp, $bericht) {
    $mail = new PHPMailer();

    //Verbinden met je mail account (<leerlingnummer>@<leerlingnummer>.hbcdeveloper.nl)
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure =
    //$mail->SMTPSecure = 'ssl';
	//Debuginformatie aanzetten… zet deze inproductie uit…
    $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
    //$mail->Host = 'mail.<leerlingnummer>.hbcdeveloper.nl';
    $mail->Host = 'mail.71010.hbcdeveloper.nl';
    $mail->Port = 587;

    //Identificeer jezelf bij je mailaccount
    $mail ->Username = 'd71010';
    $mail ->Password = '!UCL(m+[L{.mP9p}lIzd';

    //E-mail opstellen...
    $mail ->isHTML(true);
// ook voor het mailadres staat een h!!!
    $mail->setFrom("d71010@71010.hbcdeveloper.nl", "Naam");
    $mail->Subject = $onderwerp;
    $mail->CharSet ='UTF-8';

    $bericht = "<body style=\"font-family: Verdana, Verdana, Geneva, sans-serif; 
                    font-size: 14px; color: #000;\">" . $bericht . "</body>";
    $mail -> addAddress($mailTo, $ontvangerNaam);
    //$mail ->addAddress('bkd@hoornbeeck.nl', "Dick")
    $mail -> Body = $bericht;
    //stuur de mail...
    if ($mail->Send()) {
        echo "<script>alert('Mail is verstuurd');</script>";
    }
    else {
        echo 'Mailer Error: '.$mail->ErrorInfo;
        echo "<script>alert('Mail kon niet verstuurden worden...');</script>";
    }
}
?>

