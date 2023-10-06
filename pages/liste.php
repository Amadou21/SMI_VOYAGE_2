<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
?>
<!DOCTYPE html>

<html lang="fr">

<head>
  <title>SMI VOYAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout2.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="../layout/styles/card.css">

  <link href="../layoutss/boot/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<?php 
$nb=0;$pro=0;
$ls1=$_GET['pa'];
$ls2=$_GET['cat'];
$ls3=$_GET['vil'];
$ls4=$_GET['dat'];
if($ls2=='promotion'){$lsaff='Promotion';$nb++;}
if($ls1=='0' AND $ls2<>'0'){$ls=$ls2; $lsaff=$ls2;}
elseif($ls2=='0' AND $ls1<>'0'){$ls=$ls1; $lsaff=$ls1;}
elseif($ls1=='0' and $ls2=='0' and $ls3=='0' and $ls4=='0'){$ls='Toutes les offres'; $lsaff='Toutes les offres';}
else{$lsaff='';}
$tab_pa=array("Maroc", "Mali", "Turquie", "France");
$tab_cat=array("Balneaire", "Ete", "Hiver", "Voyage de noce", "Familliale");
?>
<body id="top">

<div class="bgded overlay yb_zone_de_base" style="background-image:url('../images/demo/header3.jpg');">
  <!-- header -->
  <?php
    include("../includes/header.php");
  ?>
  <!-- Le menu de navigation et la search bar de la page-->
  <?php
    include("../includes/nav_bar.php");
  ?>   
  <div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Recherche - <b style="color:#37AE6A"><?php echo $lsaff ?> </b></h6>
  </div>
</div>
<div style="padding-left: 50px; visibility:hidden;"><h3>RIEN</h3></div>
<div class="promotion_zone">
<!-- ----------------------------------------------------------------------Affichage des offres ---------------------------------------------------------->

<!-- ----------------------------------------------------------------------Affichage des offres=Toutes les offres -->
<?php 
if ($lsaff=='Toutes les offres'){
  $off=$bdd->query("SELECT * FROM offre");
  $i=1;
  while($res=$off->fetch()){
?>
<div class="card_zone" align="center">
    <img src="../images/offre/<?php echo ($res['lien_image']) ?>" alt="">
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black"><?php echo($res['pays_dest']) ?></span></h4>
    <hr>
    <h5><span style="color:black;"><?php echo ($res['titre']) ?></span></h5>
    <hr>
    <h1 style="font-size:10px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy"><?php echo($res['nb_place']) ?></i></h1>
    <hr>
    <h1 style="font-size:15px; color:black">A partir de <i style="color:rgb(173, 0, 0); font-family:Stencil std, fantasy"><?php echo($res['prix']) ?><sup> DHS</sup></i></h1>
    <hr><?php $urlv=$res['id_of']?>
    <a href='details.php?id=<?php echo $urlv ?>'><button class="consultation_btn" id="but">Consulter</button></a>
</div>
<?php 
$i++;$nb++;$pro++;
if($i==4){$i=1; echo '</div><div class="promotion_zone">';}
//<!-- ----------------------------------------------------------------------Affichage des offres qui sont dans le nav bar:Pays et categorie -->
}}elseif((in_array($lsaff, $tab_pa))or(in_array($lsaff, $tab_cat))){
  $off=$bdd->prepare("SELECT * FROM offre WHERE pays_dest=? OR pays_dep=? OR categorie=?" );
  $off->execute(array($ls, $ls, $ls));
  $i=1;
  while($res=$off->fetch()){
    $urlv=$res['id_of'];
    echo '<div class="card_zone" align="center"> <img src="../images/offre/'.($res['lien_image']).'" alt="">
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black">'.($res['pays_dest']).'</span></h4>
    <hr>
    <h5><span style="color:black;">'.($res['titre']).'</span></h5>
    <hr>
    <h1 style="font-size:10px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0); font-family:Stencil std, fantasy">'.($res['nb_place']).'</i></h1>
    <hr>
    <h1 style="font-size:15px; color:black;">A partir de <i style="color:rgb(173, 0, 0); font-family:Stencil std, fantasy">'.($res['prix']).'<sup> DHS</sup></i></h1>
    <hr>
    <a href="details.php?id='.$urlv.'"><button class="consultation_btn">Consulter</button></a>
    </div>'; 
    $i++; $nb++; $pro++;
    if($i==4){$i=1; echo '</div><div class="promotion_zone">';}
}}
?>

<!-- ----------------------------------------------------------------------Affichage des offres promotionel-->
<?php
if($lsaff=='promotion'){
$off=$bdd->query("SELECT * FROM promotion") ;
$i=1;
  while($res=$off->fetch()){
    $urlv=$res['id_of'];
    echo '<div class="card_zone" align="center"> <img src="../images/offre/'.($res['lien_image']).'" alt="">
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black">'.($res['pays_dest']).'</span></h4>
    <hr>
    <h5><span style="color:black;">'.($res['titre']).'</span></h5>
    <hr>
    <h1 style="font-size:10px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy">'.($res['nb_place']).'</i></h1>
    <hr>
    <h1 style="font-size:15px; color:black">A partir de <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy">'.($res['prix']).'<sup> DHS</sup></i></h1>
    <hr>
    <a href="details.php?id='.$urlv.'"><button class="consultation_btn">Consulter</button></a>
    </div>'; 
    $i++; $pro++;
    if($i==4){$i=1; echo '</div><div class="promotion_zone">';}
}}

?>

<!-- ----------------------------------------------------------------------Affichage des offres chercher par la barre de rechereche-->
<?php 
function to_jour($date){
  $date_explose=explode("-", $date); 
  $jour=(int)$date_explose[2];
  $mois=(int)$date_explose[1];
  $anne=(int)$date_explose[0];
  $nb=$jour+($mois*30)+($anne*365);
  return $nb;
}
if($lsaff==''){
  $dest=strtoupper($ls1);
  $dep=strtoupper($ls3);
  $date_j=to_jour($ls4);
  $cat=strtoupper($ls2);
if(($_GET['cat'])=='tout'){ $off=$bdd->prepare("SELECT * FROM offre WHERE pays_dest=? and ville_dep=?") ;
$off->execute(array($dest, $dep));
}else{
  $off=$bdd->prepare("SELECT * FROM offre WHERE pays_dest=? AND ville_dep=? AND categorie=? AND date_sec>?") ;
  $off->execute(array($dest, $dep, $cat, $date_j ));
}
$i=1;
  while($res=$off->fetch()){
    $urlv=$res['id_of'];
    echo '<div class="card_zone" align="center"> <img src="../images/offre/'.($res['lien_image']).'" alt="">
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black">'.($res['pays_dest']).'</span></h4>
    <hr>
    <h5><span style="color:black;">'.($res['titre']).'</span></h5>
    <hr>
    <h1 style="font-size:10px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy">'.($res['nb_place']).'</i></h1>
    <hr>
    <h1 style="font-size:15px; color:black">A partir de <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy">'.($res['prix']).'<sup> DHS</sup></i></h1>
    <hr>
    <a href="details.php?id='.$urlv.'"><button class="consultation_btn">Consulter</button></a>
    </div>'; 
    $i++; $nb++; $pro++;
    if($i==4){$i=1; echo '</div><div class="promotion_zone">';}
}}if($nb==0){echo '<h3 align="center" style="color:black">Desole il n \'y a pas d\'offres pour votre requete pour le moment</h3>';$pro++;}
if($pro==0){echo '<h3 align="center" style="color:black">Desole il n \'y a pas d\'offres promotionnelle pour le moment</h3>';}
?>


<script>
 
 
  console.log('val de pa' <?php echo $ls1 ?>)
 
</script>


</div>
  <!-- footer zone -->
  <?php
    include("../includes/footer.php");
  ?>

  <!-- pied de page et bibliotheque js -->
  <?php
    include("../includes/pied_de_site.php");
    echo($_SERVER['PHP_SELF']);
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
    padding-bottom: 50px;
    border-radius: 15px;
    background-image: url('../../images/IMG_4557.WEBP');
    background-size: cover;
    font-family: arial;
}
.card_zone{
    width:30%;
    padding:1%;
    border: 1px solid;
    box-shadow: 10px 10px 15px grey;
    background-color: rgba(255, 255, 255, 0.438);
    backdrop-filter: blur(3px);
    font-family: arial;
}
.card_zone>img{
  width:350px; 
  height:200px; 
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
