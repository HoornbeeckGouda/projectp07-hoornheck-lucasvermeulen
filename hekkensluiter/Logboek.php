<?php
include('../view/header.php');
include('./components/header.php');

include('../class/logboek.php');

$logboek = new Logboek($dbconn);
$searchFor = null;
if(isset($_POST['search'])){
    $searchFor = $_POST['search'];
   }
$logboekGet = $logboek->getInfo($searchFor);
$logboekGet->setFetchMode(PDO::FETCH_BOTH);
?>
      <a  style="margin-left: 10px;
    margin-top: 10px;
    top: 10px;
    position: relative;" href="./overzicht.php"><i class="material-icons" style="font-size:20px; ">arrow_back</i></a>
<div class="MainPagecontainer">

        <div id="Search">
  
        <form class="GevangeneForm" method="POST" id="" >
            <div id='searchGevangene'>
                <input type="text" id="searchinput" name="search" style="text-indent: 10px;"  placeholder="search" value="<?php if(isset($_POST['search'])){
                    echo $_POST['search']; }?>">
            </div>
            <div id='FormSubmit' style=" justify-content: end;">
            <input type="submit" value="versturen" id="submitButton">
            </div>
        </form> 
        </div>
        <div id="Tabel">
            <table id="GevangeneTable">
            <thead>

                <tr id="gevangeneHeader">
                    <th>id</th>
                    <th>medewerkerId</th>
                    <th>Voornaam</th>
                    <th>gevangeneId</th>
                    <th>actie</th>
                    <th>tijd</th>
                    <th>opmerkingen</th>
                </tr>
                </thead>

                    <?php
                        foreach($logboekGet as $row) {
                            echo '<tr>
                            '.
                            '<td>' . $row['id'] . '</td>' .
                            '<td>' . $row['medewerkerId'] . '</td>' .
                            '<td>' . $row['voornaam'] . '</td>' .
                            '<td>' . $row['gevangeneId'] . '</td>' .
                            '<td>' . $row['actie'] . '</td>' .
                            '<td>' . $row['tijd'] . '</td>' .
                            '<td>' . $row['opmerkingen'] . '</td>'; 

                            
                        }   
                    ?>
                
            </table>
        </div>
</div>
<?php
include('../view/footer.php');
?>
