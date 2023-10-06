<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
?>
<!DOCTYPE html>

<html lang="fr">
<head>
<title>DETAILS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="../layout/styles/layout2.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="../layout/styles/details.css">
</head>
<body id="top">
<?php 
$ls=$_GET['id'];
?>
<div class="bgded overlay yb_zone_de_base" style="background-image:url('../images/demo/details3.jpg');">
  <!-- header -->
  <?php
    include("../includes/header.php");
  ?>

  <!-- Le menu de navigation et la search bar de la page-->
  <?php
    include("../includes/nav_bar.php");
  ?> 

  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Details de l'offre</h6>l
  </div>
</div>

<div class="promotion_zone">
<?php 
$off=$bdd->prepare("SELECT * FROM offre WHERE id_of=?");
$off->execute(array($ls));
$i=1;
while($res=$off->fetch()){
?>
<div class="card_zone" align="center">
    <div class="image"><img src="../images/offre/<?php echo ($res['lien_image']) ?>" alt=""></div>
    <div class="info">
      <hr>
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black"><?php echo ($res['ville_dep']) ?></span><span style="color:black"><?php echo($res['ville_dest']) ?></span></h4>
    <hr>
    <h5><span style="color:black;"><?php echo ($res['titre']) ?></span></h5>
    <hr>
    <h4 style="display:flex;justify-content: space-around; color:black">Type du voyage: <?php echo ($res['categorie']) ?></h4>
    <hr>
    <h1 style="font-size:12px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0)"><?php echo($res['nb_place']) ?></i></h1>
    <hr>
    <h1 style="font-size:15px; color:black">A partir de <i style="color:rgb(173, 0, 0)"><?php echo($res['prix']) ?><sup> DHS</sup></i></h1>
    <hr><?php $urlv=$res['id_of']?>
    </div>
</div>
</div>
<header class="heading" align=center style="color:black; padding-bottom:0px; font-size:50px">Description</header>
<div class='promotion_zone'>
<div class="card_zone">
<p><?php echo ($res['description_of']) ?></p>
<hr>
<?php
   if(!isset($_COOKIE['login'])){ 
 ?>
 <a href='connexion.php?et=co'><button style='width:600px; font-size:50px;' class="consultation_btn" id="but">Reserver</button></a>
 <?php }else{ ?>
   <a href='reservation.php?id=<?php echo $urlv ?>'><button style='width:600px; font-size:50px;' class="consultation_btn" id="but">Reserver</button></a>
 <?php }?>
</div>
<?php 
}
?>
</div>

<div class="clear"></div>
  </main>
</div>

  <!-- footer zone -->
  <?php
    include("../includes/footer.php");
  ?>

  <!-- pied de page et bibliotheque js -->
  <?php
    include("../includes/pied_de_site.php");
  ?>
</body>
</html>
<style>
marquee{
    font-size: 18px;
    font-weight: bold;
    position: fixed;
    bottom: 0px;
    background-color: rgba(255, 255, 255, 0.445);
    padding-top: 10px;
    backdrop-filter: blur(2px);
}
.promotion_zone{
    display: flex;
    justify-content: space-around;
    padding-bottom: 20px;
    padding-top: 20px;
    border-radius: 15px;
    background-image: url('../../images/IMG_4557.WEBP');
    background-size: cover;
    font-family: arial;
}
.promotion_zone>h3{
  font-family: arial;
}
.promotion_zone>span{
  font-family: arial;
}
.card_zone{
    width:90%;
    padding:1%;
    border: 1px solid;
    box-shadow: 10px 10px 15px grey;
    background-color: rgba(255, 255, 255, 0.438);
    backdrop-filter: blur(3px);
    font-family: arial;
}     
.image{
    width:35%;
    float: left;
    height: 100%;
}
.image>img{
    height: 100%;
    width:100%;
    
}
.info{
    margin:auto;
    width:64%;
    height:100%;
    float:left;
}
.consultation_btn{
    padding: calc(+10px);
    border-radius: 15px;
    border: none;
    background-color: #37AE6A;
    font-weight: bold;
    color:white;
}
.consultation_btn:hover{
    color:rgb(0, 110, 255);
    background-color: white;
    border:1px solid rgb(0, 110, 255);
}
.name_des{
    border-radius: 9px;
}   
</style>