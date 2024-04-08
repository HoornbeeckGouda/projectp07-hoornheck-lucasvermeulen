<?php
include('../view/header.php');
include('./components/header.php');
include('../class/Gevangene.php');
include('../class/Gevangenis.php');
include('../class/Logboek.php');

$gevangene = new gevangene($dbconn);
$gevangeneFromID = $gevangene->GetFromId($_GET['id']);
$gevangeneFromID->setFetchMode(PDO::FETCH_BOTH);


if(isset($_POST['gevangeneid'])){
    $gevangene = $gevangene->updateCell($_POST['gevangeneid'],$_POST['naarCell']);

    $reden = 'niewe cell';
    $medewerkerId = $_SESSION['gebruiker']['id'];
    $gevangeneId = $_POST['gevangeneid'];
    $actie = 'Verplaatsen';

    $tijd = $_POST['date'] . ' '.$_POST['time'];
    $opmerkingen = $_POST['opmerkingen'];
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

        <form class="hekkensluiterForm"  method="POST" >
            
               <table>
                <?php
                foreach($gevangeneFromID as $row){
                    // <td><input type='text' name='cell' value='".$row['cell']."'></td>
                
                echo"
                <tr>
                
                    <td>medewerker id:</td>
                        <td><input type='text' name='mederwerkerid' readonly value='".$_SESSION['gebruiker']['id']."'></td>
                    </tr>
                    <td>Gevangene id:</td>
                        <td><input type='text' name='gevangeneid' readonly value='".$row['id']."'></td>
                    </tr>
                    <td>van cell:</td>
                        <td><input type='text' name='vanCell' readonly value='".$row['cell']."'></td>
                    </tr>
                    <td>naar cell:</td>
                        
                        <td>
                        <select name='naarCell' id='cell' style='width: 100%;'>
                        ";
                        foreach($numbers as $num) {

                            echo "<option value='".$num."'>".$num."</option>";
                        }; 
                        echo '
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>datum:
                        </td>
                        <td>
                            <input type="date"  name="date" value="'. date("Y-m-d") .'">
                      </td>
                    </tr>
                    <tr>
                        <td>
                            tijd:
                        </td>
                        <td>
                                <input id="appt-time" type="time" name="time" value="'. date("h:i") .'" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            opmerkingen:
                        </td>
                        <td>
                            <textarea id="opmerkingen" name="opmerkingen" rows="8" style="width: 100%;" ></textarea>
                        </td>
                    </tr>
                    
                ';}
                ?>
               </table>

                <input type="submit" value="Versturen" id="FormSubmit">       
        </form> 
    </div>


<?php
include('../view/footer.php');
?>