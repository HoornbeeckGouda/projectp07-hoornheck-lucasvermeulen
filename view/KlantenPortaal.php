<?php
include('./header.php');
?>
<div class="KlantenPortaalcontainer">
<div class="KlantenPortaalHeader">
    
    <img src="../img/chair.png" id="headerImg">
    <div id="headercolor"></div>
    <div onclick="location.href='../view/klantenPortaal.php'" style="cursor: pointer;position: absolute;top: 0px; margin: 10px;">
        <img src="../img/WhiteLogo.png"  width="178" height="55" >
    </div>
</div>
<div class="cardsContainer">    
    <div class="card">
        <div onclick="location.href='./bezoekinplannen.php'" id="bezoek" class="innerCard">
            <i class="material-icons icons" style="font-size:120px;">calendar_month</i>
            Bezoek
        </div>
    </div>
    <div class="card">
        <div onclick="location.href='../hekkensluiter/login.php?page=aanmelding'" id="aanmelding" class="innerCard">
            <i class="material-icons icons" style="font-size:120px;">event_note</i>
            aanmelden
        </div>
    </div>
    <div onclick="location.href='../hekkensluiter/login.php'" class="card">
        <div id="hekkensluiter" class="innerCard">
            <i class="material-icons icons" style="font-size:120px;">apartment</i>
            hekkensluiter
        </div>
    </div>
    <div onclick="location.href='../hekkensluiter/login.php'" class="card">
        <div id="hulp" class="innerCard">
            <i class="material-icons icons" style="font-size:120px;">handshake</i>
            prakitsche hulp
        </div>
    </div>
</div>

<div class="Niews">
    <div class="cellenInfo">
        <img src="../img/cellen.jpg" width="50%" style="border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
        <div>
        De routing en functionele layout van alle faciliteiten is ontworpen en gebouwd om het proces van de gebruiker heen. </br>
        Hierin is verzorgen en verhoren als duidelijke scheiding in de routing opgenomen. </br>
        In het complex zijn opgenomen; </br>
        - 105 cellen, </br>
        - 10 intake cellen, </br>
        - 20 verhoorkamers, </br>
        - 2 digitale verhoorstudio's, </br>
        - advocatenruimten, </br>
        - familieruimten, </br>
        - dagverblijven en luchtplaatsen. </br>
        De kantooromgeving is ingericht volgens 'Het Nieuwe Werken'. </br>

        </div>
    </div>
</div>
</div>
<!-- <div>
    <a href="../hekkensluiter/login.php"> hekkensluiter</a>
</div> -->

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
.cardsContainer{
    display: flex;  
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
    /* height: 50px; */
    gap: 10px;
    margin-left: 10px;
    margin-right: 10px;
}
.card{
    margin-top: 50px;
    max-width: 300px;
    min-width: 100px;
    width: 100%;
    height: 250px;
    background-color: white;
    border-radius: 15px;

}
.innerCard{
    height: 100%;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-wrap: nowrap;
    justify-content: space-evenly;
    font-size: 25px;
}


.Niews{
    margin-top: 100px;
}
.cellenInfo{
    display: flex;
    align-items: center;
    background: white;
    margin: 50px;
    border-radius: 15px;
    gap: 20px;
    font-size: 21px;
}
</style>