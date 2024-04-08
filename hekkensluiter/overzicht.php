<?php
include('../view/header.php');
include('./components/header.php');


// print_r($_SESSION["gebruiker"]['voornaam']);

include('../class/Gevangene.php');

$gevangene = new gevangene($dbconn);

$searchFor = null;
if(isset($_POST['search'])){
 $searchFor = $_POST['search'];
}
$gevangene = $gevangene->getInfo($searchFor);
$gevangene->setFetchMode(PDO::FETCH_BOTH);


?>

<div class="MainPagecontainer">

        <div id="Search">
            <?php
            if($_SESSION['gebruiker']['rol'] != 'maatschappelijkewerker'){ 
                echo '
                <button id="toevoegenGevange" style="margin-right:15px;" > <a  href="./Logboek.php"style="color:black; "><i class="material-icons" style="font-size:20px; color:black;">book</i>LogBoek</a></button>

                <button id="toevoegenGevange"> <a  href="./toevoegenGevangene.php" style="color:black; "><i class="material-icons" style="font-size:20px;color:black; ">add</i>Toevoegen</a></button>
                ';
            }
?>
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
                    <th>cell</th>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Postcode</th>
                    <th>Straatnaam</th>
                    <th>Woonplaats</th>
                    <th>Huisnummer</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                    <?php
                        foreach($gevangene as $row) {
                            echo '<tr>
                            '.
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['id'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['cell'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['voornaam'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['tussenvoegsel'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['achternaam'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['postcode'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['straatnaam'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['woonplaats'] . '</td>' .
                            '<td onclick="location.href=`./GevangeneInfo.php?id='.$row['id'].'`">' . $row['huisnummer'] . '</td>
                            '; 

                            if($_SESSION['gebruiker']['rol'] == 'bewaker' OR $_SESSION['gebruiker']['rol'] == 'admin'){ 
                                echo
                                '<td> <a href="./editGevangene.php?id='.$row['id'].'">
                                <i class="material-icons" style="font-size:20px; padding:0px;width:100%; height: 100%; color: black;">edit</i>
                                </a> </td>';
                            }  
                            if($_SESSION['gebruiker']['rol'] == 'portier' OR $_SESSION['gebruiker']['rol'] == 'admin'){ 
                                echo 
                                '<td > <a href="./verplaatsGevangene.php?id='.$row['id'].'">
                                <i class="material-icons" style="font-size:20px;padding:0px; width:100%; height: 100%; color: black;">trending_flat
                                </i>
                                </a></td>      
                                    </tr> ';
                            }
                        }   
                    ?>
                
            </table>
        </div>
</div>
<?php
include('../view/footer.php');
?>
