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
    $setzaak = $zaak->setzaak($_POST['gevangeneId'], $_POST['reden']);
    header('Location: '.'./gevangeneInfo.php?id='.$_POST['gevangeneId'].'');
    die();
}




?>
<div id="formContainer">

    <div class="zaak">
    <form class="hekkensluiterForm"  method="POST" >

        <table class="infoTabel">

            <?php

                echo '

                <tr>
                    <td>gevangeneId</td>
                    <td><input name="gevangeneId" readonly value="'.$_GET['id'].'"></input></td>
                </tr>
                <tr>
                    <td>reden</td>
                </tr>   
                <tr>
                    <td colspan="2"><textarea id="reden" name="reden" rows="8" style="width: 100%;"></textarea></td>
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
