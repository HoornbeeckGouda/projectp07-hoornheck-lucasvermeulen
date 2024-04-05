
<?php
include('./header.php');
include('../class/bezoek.php');

$bezoek = new bezoek($dbconn);
if(isset($_POST['gevangeneNaam'])){
    $gevangeneNaam = $_POST['gevangeneNaam'];
    $reden =  $_POST['reden'];
    $bezoekTijd =  $_POST['bezoekDatum'] . ' '. $_POST['bezoekTijd'];
    $setBezoek = $bezoek->insertBezoek($gevangeneNaam, $reden, $bezoekTijd);
}

?>
<div class="KlantenPortaalcontainer">
    <div class="KlantenPortaalHeader">
        <img src="../img/chair.png" id="headerImg">
        <div id="headercolor"></div>
        <div onclick="location.href='../view/klantenPortaal.php'" style="cursor: pointer;position: absolute;top: 0px; margin: 10px;">
        <img src="../img/WhiteLogo.png"  width="178" height="55" >
    </div>
    </div>

    
    <div class="bezoekcontainer">
        <form class="bezoek" method="POST" id="bezoekForm">
            <div class="bezoekinputContainer">
                <div class="bezoekinputs" style="width: 100%; ">
                    <div class="labels">
                        <label>Gevangene naam:</label>
                        <input type="text" value="" name="gevangeneNaam"> </input>  
                    </div>
                    <div class="labels">
                        <label>Reden:</label>
                        <textarea type="text" value="" id="bezoekreden" name="reden" > </textarea>
                    </div>
                    
                </div>
                <div class="bezoekinputs">
                    <div class="labels">
                        <label>Datum:</label>
                        <input type="date" value="" name="bezoekDatum"> </input>
                    </div>
                    <div class="labels">
                        <label>Tijd:</label>
                        <input type="time" value="" name="bezoekTijd"> </input>
                    </div>
                </div>
            </div>
                   <input type="submit" value="versturen" style="width: 100%; height: 40px;    margin: 10px;">

                
            </table>
        </form> 
    </div>
</div>
<?php
include('./footer.php');
?>

<style>
.KlantenPortaalcontainer{
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: column;

}
.KlantenPortaalHeader{
    height: 350px;
    width: 100%;
    background-color: red;
}

#headerImg{
    height: 100%;
    width: 100%;
    position: relative;
    object-fit: cover;
}
#headercolor{
    height: 350px;
    width: 100%;
    top: 0px;
    position: absolute;
    background-color: #cd503c90;
}
.bezoekcontainer{
    height: 300px;
    /* width: 100%; */
    /* position: absolute; */
    top: 370px;
    margin: 20px;
    background-color:white;
    border-radius: 15px;
    
}


#bezoekForm{
    display: flex;
    flex-direction: column;
    width: 700px;
    height: 100%;
    /* padding: 10px; */
    justify-content: space-between;
}

.bezoekinputContainer{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
#bezoekForm input{
  font-size: 15px;
  height: 20px;
}
.bezoekinputs{
    display: flex;
    flex-direction: column;
    width: 230px;
    padding: 10px;
    gap: 25px;
}
#bezoekreden{
    height: 125px;
    width: 100%;
}
.labels{
    display: flex;
    flex-direction: column;
}
</style>

<?php
include('../view/footer.php');
?>
