

<div class="background">
<div onclick="location.href='../view/klantenPortaal.php'" style="cursor:pointer; padding-left:10px; display: flex;  align-items: center;">
   <img src="../img/WhiteLogo.png"  width="178" height="55" >
</div>
   <div id="account">
      <div style="font-size:25px; color: white;">
         <?php
            if(isset($_SESSION["gebruiker"]['voornaam'])){
               echo $_SESSION["gebruiker"]['voornaam'];
            }
         ?>
      </div>
      <a href="./logout.php">

         <i class="material-icons" style="font-size:91px; color: white;">person</i>
      </a>
   </div>

</div>
<style>
 .background{

    background-color: #CD523E;
    width: 100%;
    height: 75px;
    display: flex;
 }

 #account{
   font-size: 40px;
   height: 75px;
   position: absolute;
   line-height: 75px;
   right: 0px;
   display: flex;
    flex-direction: row;
 }
</style>