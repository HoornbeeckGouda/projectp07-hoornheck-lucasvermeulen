<?php
include('../view/header.php');
include('./components/header.php');
?>

<div id="formContainer" style="height:fit-content;">
    <div id="InnerContainer">
        <form class="Form" action="../class/democap.php" method="POST">
            <!-- onderin de form zet je: <div class="g-recaptcha" data-sitekey="your_site_key"></div>-->
            <div class="g-recaptcha" data-sitekey="6LeBiIEpAAAAAAOqKv4UJOtiv5g2U2iKYyKuB5tK"></div>
            <input type="submit" name="submit" id="FormSubmit" style="height: 60px; font-size:22px" value="Versturen">
        </form>
    </div>
</div>


<?php   
include('../view/footer.php')
?>