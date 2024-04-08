<?php
include('../view/header.php');
include('./components/header.php');

include('../class/Zaak.php');
include('../class/Gevangene.php');

$gevangene = new gevangene($dbconn);
$gevangeneFromID = $gevangene->GetFromId($_GET['id']);
$gevangeneFromID->setFetchMode(PDO::FETCH_BOTH);



$zaak = new Zaak($dbconn);
if(isset($_POST['opmerkingen'])){
    $updateZaak = $zaak->updatezaak($_GET['id'], $_POST['opmerkingen']);
echo $_POST['gevangeneId'];
    header('Location: '.'./gevangeneInfo.php?id='.$_POST['gevangeneId'].'');
    die();
}

$zaakFromId = $zaak->getZaakFromID($_GET['id']);
$zaakFromId->setFetchMode(PDO::FETCH_BOTH);



?>
<div id="formContainer">

    <div class="zaak">
    <form class="hekkensluiterForm"  method="POST" >

        <table class="infoTabel">

            <?php
            
            foreach($zaakFromId as $row){
                echo '
                <tr>
                    <td>zaakid</td>
                    <td><label name="id">'.$row['id'].'</label></td>
                </tr>
                <tr>
                    <td>gevangeneId</td>
                    <td><input name="gevangeneId" readonly value="'.$row['gevangeneId'].'"></input></td>
                </tr>
                <tr>
                    <td>opmerkingen</td>
                </tr>   
                <tr>
                    <td colspan="2"><textarea id="reden" name="opmerkingen" rows="8" style="width: 100%;">'.$row['opmerkingen'].'</textarea></td>
                </tr>   
                
                ';
            }
            ?>
        </table>
        
        <input type="submit" value="Versturen" id="FormSubmit">       
    </form> 
    </div>
</div>

<?php
include('../view/footer.php');
?>
