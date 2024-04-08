<?php
include('../view/header.php');
include('./components/header.php');
include('../class/gebruiker.php');

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gebruiker = new gebruiker($dbconn);
    if($gebruiker->checkPassword($email, $password)){
        $result = $gebruiker->getInfo($email);
        $result->setFetchMode(PDO::FETCH_BOTH);
        foreach($result as $row) {
            $_SESSION['gebruiker'] = array('id'=>$row['id'],'voornaam'=>$row['voornaam'],'tussenvoegsel'=>$row['tussenvoegsel'],'achternaam'=>$row['achternaam'],'email'=>$row['email'],'rol'=>$row['rolName'],'sleutel'=>$row['sleutelnummer']);
        }

        // echo 'hier' . $gebruiker;
        if(isset($_GET['page']) && $_SESSION['gebruiker']['rol'] != 'maatschappelijkewerker'){
            header('Location: '.'./aanmelding.php');
            die();
        }else{
            header('Location: '.'./Recaptcha.php');
            // header('Location: '.'./overzicht.php');
            die();
        }
    }
}



?>

<div id="formContainer">
    <div id="InnerContainer">
    <div id="FormLabel">Login:</div>

        <form class="LoginForm" method="POST" >
            
                <input type="text" id="email" name="email"  placeholder="Email" style="text-indent: 10px;">

                <input type="PASSWORD" id="PASSWORD" name="password" placeholder="Wachtwoord" style="text-indent: 10px;">

                <input type="submit" value="Submit" id="FormSubmit" style="height: 60px;">       
        </form> 
    </div>
</div>



<?php
include('../view/footer.php');
?>