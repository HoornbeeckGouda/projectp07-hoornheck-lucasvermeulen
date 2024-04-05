<?php
include('../view/header.php');
include('./components/header.php');
include('../class/Gevangene.php');
include('../class/Logboek.php');
include('../class/Gevangenis.php');

$gevangene = new gevangene($dbconn);

if(isset($_POST['burgerservicenummer'])){

    $foto = $_FILES['foto'];
    $gevangene = $gevangene->setGevangene($_POST['cell'],
    $_POST['mederwerkersId'],
    $_POST['burgerservicenummer'],$_POST['voornaam'],
    $_POST['tussenvoegsel'],$_POST['achternaam'],$_POST['postcode'],$_POST['woonplaats'],$_POST['straatnaam'],$_POST['huisnummer']
    ,$_POST['geboorteplaats'],$_POST['telefoon'],$_POST['email'],$_POST['geboortedatum'], $foto);

    $last_id = $dbconn->lastInsertId();

    $reden = 'Niewe Gevangene';
    $medewerkerId = $_SESSION['gebruiker']['id'];
    $gevangeneId =  $last_id;
    $actie = 'toevoegen';
    $tijd = date("Y/m/d  h:i:s");
    $opmerkingen = 'geen';
    $Logboek = new Logboek($dbconn);
    $setLogboek = $Logboek->setInfo($reden, $medewerkerId, $gevangeneId, $actie, $tijd, $opmerkingen);

    header('Location: '.'./overzicht.php');
    die();
}

$gevangenis = new Gevangenis($dbconn);
$gevangenis = $gevangenis->getInfo();
$gevangenis = $gevangenis->fetch();

$Allgevangene = $gevangene->getInfo(null);
$Allgevangene->setFetchMode(PDO::FETCH_BOTH);
$numbers = array();

for ($i = 1; $i <= $gevangenis['aantal']; $i++) {
    $numbers[] = $i; // Change the range (1, 100) as needed
}
foreach($Allgevangene as $row){
    $key = array_search($row['cell'], $numbers);
    if ($key !== false) {
        unset($numbers[$key]);
    }
}

?>
 <a  style="margin-left: 10px;
    margin-top: 10px;
    top: 10px;
    position: relative;" href="./overzicht.php"><i class="material-icons" style="font-size:20px; ">arrow_back</i></a>
<div id="formContainer">
    <div id="InnerContainer">
    <div id="FormLabel">Edit :</div>

        <form class="hekkensluiterForm"  method="POST" enctype="multipart/form-data"> 
            
               <table>
                <?php
                
                echo"
                <tr>
                    <tr>
                        <td>mederwerkersId:</td>
                        <td><input type='text' name='mederwerkersId' value=''></td>
                    </tr>
                    <tr>
                        <td>cell:</td>
                        <td>
                            <select name='cell' id='cell' style='width: 100%;'>
                            ";
                            foreach($numbers as $num) {

                                echo "<option value='".$num."'>".$num."</option>";
                            }; 
                            echo "
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Burgerservicenummer:</td>
                        <td><input type='text' name='burgerservicenummer' value=''></td>
                    </tr>
                    <tr>
                        <td>Voornaam:</td>
                        <td><input type='text' name='voornaam' value=''></td>
                    </tr>
                    <tr>
                        <td>Tussenvoegsel:</td>
                        <td><input type='text' name='tussenvoegsel' value=''></td>
                    </tr>
                    <tr>
                        <td>Achternaam:</td>
                        <td><input type='text' name='achternaam' value=''></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><input type='text' name='postcode' value=''></td>
                    </tr>
                    <tr>
                        <td>Straatnaam:</td>
                        <td><input type='text' name='straatnaam' value=''></td>
                    </tr>
                    <tr>
                        <td>Huisnummer:</td>
                        <td><input type='text' name='huisnummer' value=''></td>
                    </tr>
                    <tr>
                        <td>Woonplaats:</td>
                        <td><input type='text' name='woonplaats' value=''></td>
                    </tr>
                    <tr>
                        <td>Geboortedatum:</td>
                        <td><input type='date' name='geboortedatum' value=''></td>
                    </tr>
                    <tr>
                        <td>Geboorteplaats:</td>
                        <td><input type='text' name='geboorteplaats' value=''></td>
                    </tr>
                    <tr>
                        <td>Telefoon:</td>
                        <td><input type='text' name='telefoon' value=''></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type='text' name='email' value=''></td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><input type='file' name='foto' value=''></td>
                    </tr>
                ";
                ?>
               </table>

                <input type="submit" value="Versturen" id="FormSubmit">       
        </form> 
    </div>


<?php
include('../view/footer.php');
?>