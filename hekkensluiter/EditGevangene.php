<?php
include('../view/header.php');
include('./components/header.php');
include('../class/Gevangene.php');
include('../class/Logboek.php');

$gevangene = new gevangene($dbconn);
$gevangeneFromID = $gevangene->GetFromId($_GET['id']);
$gevangeneFromID->setFetchMode(PDO::FETCH_BOTH);

if(isset($_POST['id'])){
    
    $gevangeneUpdate = $gevangene->update(
        $_POST['id'],$_POST['burgerservicenummer'],$_POST['voornaam'],
        $_POST['tussenvoegsel'],$_POST['achternaam'],$_POST['postcode'],$_POST['woonplaats'],$_POST['straatnaam']
        ,$_POST['geboorteplaats'],$_POST['telefoon'],$_POST['email'],$_POST['huisnummer'],$_POST['geboortedatum']);



    if($_FILES['foto']['name']){
        $foto = $_FILES['foto'];
        $gevangene = $gevangene->updateFoto($_POST['id'],$foto);
    }
    $reden = 'verkeerd ingevult';
    $medewerkerId = $_SESSION['gebruiker']['id'];
    $gevangeneId = $_POST['id'];
    $actie = 'Edit';
    $tijd = date("Y/m/d  h:i:s");
    $opmerkingen = 'geen';
    $Logboek = new Logboek($dbconn);
    $setLogboek = $Logboek->setInfo($reden, $medewerkerId, $gevangeneId, $actie, $tijd, $opmerkingen);

    header('Location: '.'./overzicht.php');
    die();
}

?>
 <a  style="margin-left: 10px;
    margin-top: 10px;
    top: 10px;
    position: relative;" href="./overzicht.php"><i class="material-icons" style="font-size:20px; ">arrow_back</i></a>

<div id="formContainer">
    <div id="InnerContainer">
    <div id="FormLabel">Edit:</div>

        <form class="hekkensluiterForm"   method="POST" enctype="multipart/form-data" >
            
               <table>
                <?php
                foreach($gevangeneFromID as $row){
    
                
                echo"
                <tr>
                <tr>
                <td>gevangene ID:</td>
                
                    <td><label name='id'>".$row['id']."</label></td>
                    <td style='text-indent:10px'><input type='hidden'  readonly name='id' value='".$row['id']."'></td>
                </tr>
                    <tr>
                        <td>BSN:</td>
                        <td ><input style='text-indent:5px' type='text' name='burgerservicenummer' value='".$row['burgerservicenummer']."'></td>
                    </tr>
                    <tr>
                        <td>Voornaam:</td>
                        <td><input style='text-indent:5px'  type='text' name='voornaam' value='".$row['voornaam']."'></td>
                    </tr>
                    <tr>
                        <td>Tussenvoegsel:</td>
                        <td><input style='text-indent:5px'  type='text' name='tussenvoegsel' value='".$row['tussenvoegsel']."'></td>
                    </tr>
                    <tr>
                        <td>Achternaam:</td>
                        <td><input  style='text-indent:5px'  type='text' name='achternaam' value='".$row['achternaam']."'></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><input style='text-indent:5px'  type='text' name='postcode' value='".$row['postcode']."'></td>
                    </tr>
                    <tr>
                        <td>Straatnaam:</td>
                        <td><input style='text-indent:5px'  type='text' name='straatnaam' value='".$row['straatnaam']."'></td>
                    </tr>
                    <tr>
                        <td>Huisnummer:</td>
                        <td><input style='text-indent:5px'  type='text' name='huisnummer' value='".$row['huisnummer']."'></td>
                    </tr>
                    <tr>
                        <td>Woonplaats:</td>
                        <td><input  style='text-indent:5px'  type='text' name='woonplaats' value='".$row['woonplaats']."'></td>
                    </tr>
                    <tr>
                        <td>Geboortedatum:</td>
                        <td><input style='text-indent:5px'  type='date' name='geboortedatum' value='".$row['geboortedatum']."'></td>
                    </tr>
                    <tr>
                        <td>Geboorteplaats:</td>
                        <td><input style='text-indent:5px'  type='text' name='geboorteplaats' value='".$row['geboorteplaats']."'></td>
                    </tr>
                    <tr>
                        <td>Telefoon:</td>
                        <td><input style='text-indent:5px'  type='text' name='telefoon' value='".$row['telefoon']."'></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input style='text-indent:5px'  type='text' name='email' value='".$row['email']."'></td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><input  type='file' name='foto' value=''></td>
                    </tr>
                ";}
                ?>
               </table>

                <input type="submit" value="Versturen" id="FormSubmit">       
        </form> 
    </div>


<?php
include('../view/footer.php');
?>