<?php
include('../view/header.php');
include('./components/header.php');

include('../class/Zaak.php');
include('../class/Gevangene.php');

$gevangene = new gevangene($dbconn);
$gevangeneFromID = $gevangene->GetFromId($_GET['id']);
$gevangeneFromID->setFetchMode(PDO::FETCH_BOTH);

$zaak = new Zaak($dbconn);
if(isset($_POST['reden'])){
    $setzaak = $zaak->setzaak($_POST['gevangeneId'], $_POST['reden'], $_POST['opmerkingen'], $_POST['StrafLengte']);


    include('../class/Logboek.php');

    $reden = 'Zaak Toevoegen';
    $medewerkerId = $_SESSION['gebruiker']['id'];
    $gevangeneId =  $_POST['gevangeneId'];
    $actie = 'Zaaktoevoegen';
    $tijd = date("Y/m/d  h:i:s");
    $opmerkingen = 'geen';
    $Logboek = new Logboek($dbconn);
    $setLogboek = $Logboek->setInfo($reden, $medewerkerId, $gevangeneId, $actie, $tijd, $opmerkingen);

    header('Location: '.'./gevangeneInfo.php?id='.$_POST['gevangeneId'].'');
    die();
}




?>

 <a  style="margin-left: 10px;
    margin-top: 10px;
    top: 10px;
    position: relative;" href="./gevangeneInfo.php?id=<?php echo $_GET['id'] ;?>"><i class="material-icons" style="font-size:20px; ">arrow_back</i></a>
<div id="formContainer">

    <div class="zaak">
    <div id="FormLabel">Zaak Toevoegen:</div>
    <form class="hekkensluiterForm"  method="POST" >

        <table class="infoTabel">

            <?php

                echo '

                <tr>
                    <td>gevangeneId:</td>
                    <input type="hidden" name="gevangeneId" readonly value="'.$_GET['id'].'"></input>
                    <td><label name="id">'.$_GET['id'].'</label></td>
                </tr>
                <tr>
                    <td>reden:</td>
                
                    <td>
                        <select name="reden" id="">
                            <option value="Diestal">Diestal</option>
                            <option value="moord">moord</option>
                            <option value="huiselijk_geweld">huiselijk geweld</option>
                        </select>
                    </td>
                </tr>   
                <tr>
                    <td>Straf Tijd:</td>
                    <td>
                        <input type="text"  name="StrafLengte" value="" placeholder="maanden">
                    </td>
                </tr>
                <tr>
                    <td>opmerkingen:</td>
                </tr>   
                <tr>
                    <td colspan="2"><textarea id="opmerkingen" name="opmerkingen" rows="8" style="width: 100%;"></textarea></td>
                </tr>   
                
                ';
            ?>
        </table>
        
        <input type="submit" value="Versturen" id="FormSubmit">       
    </form> 
    </div>
</div>

<?php
include('../view/footer.php');
?>
