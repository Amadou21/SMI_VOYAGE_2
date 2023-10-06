<?php
  if(!isset($_COOKIE['login'])){ header('Location: ../index.php');
?>
<?php 
}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='admin'){header('Location: ../index.php');}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='client'){
?>
<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
  $ls=$_GET['id'];
?>
<?php 
$Nom = (htmlspecialchars($_POST['nom']));$Nom=strtoupper($Nom);
$Prenom = (htmlspecialchars($_POST['prenom']));$Prenom=strtoupper($Prenom);
$Email = (htmlspecialchars($_POST['email']));
$Passeport = (htmlspecialchars($_POST['passport']));$Passeport=strtoupper($Passeport);
$Genre = (htmlspecialchars($_POST['genre']));
$Tel = (htmlspecialchars($_POST['num']));
$off=$bdd->prepare("INSERT INTO reservation(id_offre, id_client, nom_cl, prenom_cl, email_cl, tel_cl, passeport_cl) VALUES (?,?,?,?,?,?,?)") ;
$off->execute(array($ls, $_COOKIE['id_client'], $Nom, $Prenom, $Email, $Tel, $Passeport));
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
  <div class="container" style="float:right">
  <a href="details.php?id=<?php echo $ls ?>"><i class="fas fa-window-close" style="color:black; position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i></a>
    <div class="title" style="padding-bottom:0%; ">Reservation</div><br>
    <div class="content">
        <div class="user-details">
        <div class="form-group" id="ndc">
        <label>Vous avez le choix entre payer votre reservation dès maintenant ou la pays plus tard dans votre espace client qui se situe a ce niveau dans l'acceuil</label>
        </div> 
        </div>
        <div class="image"><img align=center src="../images/demo/choix.jpeg" alt=""></div>
        <div align=center>
        <label align=center style="color:red;">Attention! Apres 24h votre reservation sera annulée si elle est non payée.</label>
        </div> 
        <div class="btnc" align=center>
        <a href="reservation_avance.php?id=<?php echo $ls ?>"><button class="btnc1" type="submit" id="acc" >Payer tout de suite</button></a>
        <a href="details.php?id=<?php echo $ls ?>"><button type="submit" class="btnc1" id="tout">Payer plutard</button></a>
        </div>
    </div>
    </div>
  </div>
  </div>
    <script>
        let btn=document.getElementById('i');
        btn.onclick=function(){
            window.location.replace('../index.php');
        }

    </script>

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
<?php 

?>
<?php 
}
?>

