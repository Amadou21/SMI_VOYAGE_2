<?php
  if(!isset($_COOKIE['login'])){ header('Location: ../index.php');
?>
<?php 
}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='admin'){header('Location: ../index.php');}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='client'){
?>
<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layout/styles/inscription.css">
    <script src="../layout/scripts/jquery.min.js"></script>
   </head>
<body classe="bo" style="background-color:white; background-image:url('../imagest/demo/reservation.png');">
<style>.bo>img{
  height: 100%; width: 100%;
}</style>
<?php 
$ls=$_GET['id'];
?>
  <div class="container" style="float:right">
  <a href="details.php?id=<?php echo $ls ?>"><i class="fas fa-window-close" style="color:black; position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i></a>
    <div class="title" style="padding-bottom:0%; ">Reservation</div><br>
    <div class="content">
        <div class="user-details">
        <div class="form_wrap">
        <div class="input_wrap">
		    <label align=center class="titre" style="padding-bottom:20px; font-size:30px" >Choisissez un mode de payement</label>
		    <ul>
		    	<li>
		    		<label class="radio_wrap">
		    			<input type="radio" name="genre" id="carte" value="Male" class="input_radio">
		    			<span>Carte Bancaire</span>
		    		</label>
		    	</li>
		    	<li>				
		    		<label class="radio_wrap">
		    			<input type="radio" name="genre" id="wafacash" value="Femelle" class="input_radio">
		    			<span>Wafacash</span>
		    		</label>
		    	</li>
		    </ul>
		    </div>
        </div>
        <div id="carte_zone"  style="display: none">
        <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" maxlength="30" placeholder="votre Nom" required autofocus>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" name="prenom" maxlength="30" placeholder="votre Prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Numero de la carte</span>
            <input type="text" name="num" placeholder="XXXX XXXX XXXX XXXX" maxlength="8" required>
          </div>
          <div class="input-box">
            <span class="details">Date d'expiration</span>
            <input type="text" name="password1" maxlength="60" placeholder="MM/AA-(12/24)" required>
          </div>
          <div class="input-box">
              <span class="details">CVV</span>
              <input type="text" name="password1" maxlength="60" placeholder="XXX" required>
          </div>
        </div>
        <div class="button" style="padding-top:2%">
        <input type="submit" style=" background-color:#37AE6A; font-size: 20px; " value="Reserver">
        </div>
        </form>
      
    </div>
  </div>
  </div>
    <script>
        let btn=document.getElementById('i');
        btn.onclick=function(){
            window.location.replace('../index.php');
        }
    </script>
<script>
    $('#carte').on('click', function(){
    $('#carte_zone').show();
    $('#wafacash_zone').hide();
   
});
$('#wafacash').on('click', function(){
    $('#wafacash_zone').show();
    $('#carte_zone').hide();
});

$(document).ready(function(){
    $("#subcl").click(function(){location.reload(true);});
})

</script>
</body>
</html>
<?php 

?>
<?php 
}
?>

