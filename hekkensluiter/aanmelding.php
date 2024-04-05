<?php
include('../view/header.php');
include('./components/header.php');


// print_r($_SESSION["gebruiker"]['voornaam']);

include('../class/Gevangene.php');
include('../class/bezoek.php');

$bezoek = new bezoek($dbconn);

$searchFor = null;
if(isset($_POST['search'])){
    $searchFor = $_POST['search'];
}
$bezoek = $bezoek->getInfo($searchFor);
$bezoek->setFetchMode(PDO::FETCH_BOTH);


?>

<div class="MainPagecontainer">

        <div id="Search">
        <form class="GevangeneForm" method="POST" id="" >
            <div id='searchGevangene'>
                <input type="text" id="searchinput" name="search"  placeholder="search" value="<?php if(isset($_POST['search'])){
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
                    <th>gevangene</th>
                    <th>reden</th>
                    <th>tijd</th>
                </tr>
                </thead>

                    <?php
                        foreach($bezoek as $row) {
                            echo '<tr>
                            '.
                            '<td>' . $row['id'] . '</td>' .
                            '<td>' . $row['gevangeneNaam'] . '</td>'.
                            '<td>' . $row['reden'] . '</td>'.
                            '<td>' . $row['bezoekTijd'] . '</td>';
                        }   
                    ?>
                
            </table>
        </div>
</div>
<?php
include('../view/footer.php');
?>
