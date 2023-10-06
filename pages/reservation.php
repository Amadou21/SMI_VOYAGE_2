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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layout/styles/inscription.css">
    <script src="../layout/scripts/jquery.min.js"></script>
   </head>
<body classe="bo" style="background-color:darkgrey; width:100%; height:100%; background-image:url('../images/demo/reservation.png');">
<style>.bo>img{
  height: 100%; width: 100%;
}</style>
<?php 
$ls=$_GET['id'];
?>
  <div class="container" style="float:right">
  <a href="details.php?id=<?php echo $ls ?>"><i  class="fas fa-window-close" style="color:black; position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i></a>
    <div class="title" style="padding-bottom:0%; ">Reservation</div><br>
    <div align=center class="" style="font-size:15px; padding-top:0%; color:red;">Mettez les informations figurant sur votre passeport</div>
    <div class="content">
      <form action="traitement_php/reservation_script.php?id=<?php echo $ls ?>" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" maxlength="30" placeholder="votre Nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" name="prenom" maxlength="30" placeholder="votre Prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" maxlength="60" placeholder="exemple@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Numero de telephone</span>
            <input type="number" name="num" placeholder="votre Numero" maxlength="8" required>
          </div>
          <div class="input-box">
            <span class="details">Numero du passeport</span>
            <input type="text" name="passport" maxlength="60" placeholder="" required>
          </div>
        </div>
        <div class="form_wrap">
        <div class="input_wrap">
					<label  class="titre" >Genre</label>
					<ul>
						<li>
							<label class="radio_wrap">
								<input type="radio" name="genre" value="Male" class="input_radio" checked>
								<span>Male</span>
							</label>
						</li>
						<li>				
							<label class="radio_wrap">
								<input type="radio" name="genre" value="Femelle" class="input_radio">
								<span>Femelle</span>
							</label>
						</li>
            <li>
            <label class="radio_wrap">
								<input type="radio" name="genre" value="Autre" class="input_radio">
								<span>Autre</span>
							</label>
            </li>
					</ul>
				</div>
        </div>
        <div class="form_wrap">
        <div class="input_wrap">
	      <label  class="titre" >Mode de payement</label>
	        <ul>
    	    <li>
    	    	<label class="radio_wrap">
    	    		<input type="radio" name="mode" id="carte" value="cart" class="input_radio">
    	    		<span>Carte Bancaire</span>
    	    	</label>
    	    </li>
    	    <li>				
    	    	<label class="radio_wrap">
    	    		<input type="radio" name="mode" id="wafacash" value="wafa" class="input_radio">
    	    		<span>Wafacash</span>
    	    	</label>
    	    </li>
          </ul>
      </div>
      </div>
      <div id="wafacash_zone" style="display: none">
      <div class="input-box">
      <div class="button" style="padding-top:2%">
        <input type="submit" style=" background-color:#37AE6A; font-size: 20px; " value="Reserver">
      </div>
      </div>
      </div>
    <div id="carte_zone"  style="display: none">
    <div class="user-details">
    <div class="input-box">
        <span class="details">Nom</span>
        <input type="text" name="nom" maxlength="30" placeholder="votre Nom">
      </div>
      <div class="input-box">
        <span class="details">Prenom</span>
        <input type="text" name="prenom" maxlength="30" placeholder="votre Prenom" >
      </div>
      <div class="input-box">
        <span class="details">Numero de la carte</span>
        <input type="number" name="num" placeholder="XXXX XXXX XXXX XXXX" maxlength="8" >
      </div>
      <div class="input-box">
        <span class="details">Date d'expiration</span>
        <input type="text" name="date" maxlength="60" placeholder="MM/AA-(12/24)">
      </div>
      <div class="input-box">
          <span class="details">CVV</span>
          <input type="number" name="cvv" maxlength="60" placeholder="XXX">
        </div>
    </div>
    <div class="button" style="padding-top:2%">
      <input type="submit" style=" background-color:#37AE6A; font-size: 20px; " value="Reserver">
    </div>
    </div>
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
</body>
</html>

<style>
.image{
    margin-top: 2%;
    margin-bottom: 1%;
    margin-left: 5%;
    margin-right: 5%;
    width: 90%;
    height: 200px;
}
.image>img{
    width: 100%;
    height: 100%;
}
.btnc1{
    font-weight: bold;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    background-color:#37AE6A;
    backdrop-filter: blur(5px);
    margin: 10px;
    color:white;
    font-size: 30px;
}
</style>
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
<?php 
}
?>
