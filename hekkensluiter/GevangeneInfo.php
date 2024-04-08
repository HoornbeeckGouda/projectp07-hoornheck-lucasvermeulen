<?php
include('../view/header.php');
include('./components/header.php');

include('../class/Zaak.php');
include('../class/Gevangene.php');

$gevangene = new gevangene($dbconn);
$gevangeneFromID = $gevangene->GetFromId($_GET['id']);
$gevangeneFromID->setFetchMode(PDO::FETCH_BOTH);



$zaak = new Zaak($dbconn);
$zaakFromId = $zaak->getInfo($_GET['id']);
$zaakFromId->setFetchMode(PDO::FETCH_BOTH);


?>
<a  style="margin-left: 10px;
    margin-top: 10px;
    top: 10px;
    position: relative;" href="./overzicht.php"><i class="material-icons" style="font-size:20px; ">arrow_back</i></a>
<div class="infoContainter">
    
    <div class="info">
        
        <?php
        foreach($gevangeneFromID as $row){
            
    
            echo "

            <table class='infoTabel'>
            <tr>
            <td>Gevangene id:</td>
            <td><label name='id'>".$row['id']."</label></td>
            </tr>
            <tr>
                <td>Burgerservicenummer:</td>
                <td><label name='burgerservicenummer'>".$row['burgerservicenummer']."</label></td>
            </tr>
            <tr>
                <td>Voornaam:</td>
                <td><label name='voornaam'>".$row['voornaam']."</label></td>
            </tr>
            <tr>
                <td>Tussenvoegsel:</td>
                <td><label name='tussenvoegsel'>".$row['tussenvoegsel']."</label></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><label name='achternaam'>".$row['achternaam']."</label></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><label name='postcode'>".$row['postcode']."</label></td>
            </tr>
            <tr>
                <td>Straatnaam:</td>
                <td><label name='straatnaam'>".$row['straatnaam']."</label></td>
            </tr>
            <tr>
                <td>Huisnummer:</td>
                <td><label name='huisnummer'>".$row['huisnummer']."</label></td>
            </tr>
            <tr>
                <td>Woonplaats:</td>
                <td><label name='woonplaats'>".$row['woonplaats']."</label></td>
            </tr>
            <tr>
                <td>Geboortedatum:</td>
                <td><label name='geboortedatum'>".$row['geboortedatum']."</label></td>
            </tr>
            <tr>
                <td>Geboorteplaats:</td>
                <td><label name='geboorteplaats'>".$row['geboorteplaats']."</label></td>
            </tr>
            <tr>
                <td>Telefoon:</td>
                <td><label name='telefoon'>".$row['telefoon']."</label></td>
            </tr>
            
            <tr>
                <td>Email:</td>
                <td><label name='email'>".$row['email']."</label></td>
            </tr>
            </table>

            ";
            if(isset($row['foto'])){
                echo '<img style="width:150px; right:0px" src="data:image/jpeg;base64,'.base64_encode($row['foto']).'"/>';
            };
           
        }
        ?>
         
    </div>
    <div class="zaak">
        <?php
        if($_SESSION['gebruiker']['rol'] != 'maatschappelijkewerker'){ 
            echo '
            <button id="toevoegenGevange"> <a  href="./zaakToevoegen.php?id='.$_GET['id'].'"><i class="material-icons" style="font-size:20px;">add</i>Toevoegen</a></button>
        ';
        }
        
        ?>
        <table class="infoTabel">
                <tr>
                    <th>zaakId:</th>
                    <th>gevangene:</th>
                    <th>StrafLengte</th>
                    <th>reden:</th>
                </tr>
            
            <?php
            
            foreach($zaakFromId as $row){
                echo '
                
                <tr onclick="location.href=`./zaakInfo.php?id='.$row['id'].'`">
                    <td style="width: 75px;"><label name="id">'.$row['id'].'</label></td>
                    <td style="width: 120px;"><label name="gevangeneId">'.$row['gevangeneId'].'</label></td>
                    <td style="width: 120px;"><label name="straflengte">'.$row['StrafLengte'].' maanden</label></td>

                    <td style=" white-space:nowrap;"><label>'.substr($row['reden'], 0, 60).'</label></td>
                </tr>   
                
                ';
            }
            ?>
        </table>
    </div>
</div>

<?php
include('../view/footer.php');
?>
