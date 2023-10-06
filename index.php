<?php
  require("includes/url_picker.php");
  require("layout/php_scripts/connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="fr">
<?php
require("layout/php_scripts/connexion_bd.php");
?>
<head>
  <title>SMI VOYAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout3.css" rel="stylesheet" type="text/css" media="all">
  <script src="layout/scripts/jquery.min.js"></script>
  <script type="text/javascript" src="layout/scripts/index/Yb_index.js"></script>

</head>
<body id="top">
  <div class="bgded overlay yb_zone_de_base" style="background-image:url('images/demo/fontV.png');">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="one_quarter first test">
        <p style="text-align: center"><a href="#" title="SMI VOYAGE"><img class="logo_du_site" src="images/demo/SMI_logo.png" alt="" /></a></p>
        <p align="center" style="margin-top:15px;">Reservez en toute serenité</p>
      </div>
      <div class="three_quarter">
        <ul class="nospace clear">
            <li class="one_third first">
                <div class="block clear"><a href="tel:+212"><i class="fas fa-phone"></i></a> <span><strong> Appelez nous:</strong><a href="tel:+223"> +212 612842357</a></span></div>
            </li>
            <li class="one_third">
                <div class="block clear"><a href="mailto:"><i class="fas fa-envelope"></i></a> <span><strong>Envoyez nous un email:</strong> <a href="mailto:">ad.maiga2107@gmail.com</span></div>
            </li>
          <?php
            if(!isset($_COOKIE['login'])){ 
          ?>
              <li class="one_third">
                <div class="block clear"><a href="#"><i class="fa fa-user"></i></a> <span><strong><a href="pages/connexion.php?et=co" style="color:white;">Connexion</a> </strong><a href="pages/inscription.php"style="color:white;">Inscription</a> </span></div>
              </li>
          <?php
            }
            else{
          ?>
          <?php
            if((($_COOKIE['roleu'])=='client')){
          ?>
              <li class="one_third">
                <div class="block clear"><a href="pages/client.php"><i class="fa fa-user"></i></a> <span><strong> <?php echo $_COOKIE['login']; ?></strong><a href="pages/connexion.php?et=deco" style="color:white;">Deconnexion</a> </span></div>
              </li>
          <?php 
            } 
            else{
          ?>
          <li class="one_third">
              <div class="block clear"><a href="pages/admin.php"><i class="fa fa-user"></i></a> <span><strong> <?php echo $_COOKIE['login']; ?></strong><a href="pages/connexion.php?et=deco" style="color:white;">Deconnexion</a> </span></div>
            </li>
            <?php
            }
          }
            ?>
        </ul>
      </div>
    </header>
    <!-- Le menu de navigation et la search bar de la page-->
    <section id="navwrapper" class="hoc clear"  style="margin-bottom:0px;"> 
      <!-- Les iconnes du contact jusqua la barre de recherche -->
      <nav id="mainav">
        <ul class="clear">
          <li class="active"><a href="index.php">Acceuil</a></li>
          <li><a class="drop" href="#">Pays</a>
              <ul>
                  <li><a href="pages/liste.php?pa=Maroc&cat=0&vil=0&dat=0">Maroc</a></li>
                  <li><a href="pages/liste.php?pa=Mali&cat=0&vil=0&dat=0">Mail</a></li>
                  <li><a href="pages/liste.php?pa=Turquie&cat=0&vil=0&dat=0">Turquie</a></li>
                  <li><a href="pages/liste.php?pa=France&cat=0&vil=0&dat=0">France</a></li>
                 
              </ul>
          </li>
          <li><a class="drop" href="#">Categorie</a>
               <ul>
                  <li><a href="pages/liste.php?pa=0&cat=Balneaire&vil=0&dat=0">Balneaire</a></li>
                  <li><a href="pages/liste.php?pa=0&cat=Ete&vil=0&dat=0">Eté</a></li>
                  <li><a href="pages/liste.php?pa=0&cat=Hiver&vil=0&dat=0">Hiver</a></li>
                  <li><a href="pages/liste.php?pa=0&cat=Noce&vil=0&dat=0">Noces</a></li>
                  <li><a href="pages/liste.php?pa=0&cat=Familliale&vil=0&dat=0">Familliale</a></li>
                </ul>
        </li>  
        <li><a href="pages/liste.php?pa=0&cat=0&vil=0&dat=0">Liste de toutes nos offres</a></li>
        <li><a href="pages/liste.php?pa=0&cat=promotion&vil=0&dat=0">Liste des promotion</a></li>
        </ul>
      </nav>
    </section>

    <div class="hoc clear" style="margin-top:150px;  margin-bottom: 50px;">
      <!-- Presentation du site -->
      <article>
        <h3 align="center" style="font-family: arial; font-size: 30px;">--------------------Welcome sur <b>SMI VOYAGE--------------------</b></h3>
        <p align="center" style="font-size: 20px;">Nous vous proposons tout type de voyage en accord avec une grande variétée de pays.</p>
        <p align="center">Donc, plus besoin de chercher longtemps des voyages en destination <b id="Change_text" style="font-size: 30px;"></b></p>
        <script type="text/javascript">
          var mot_a_changer=document.getElementById("Change_text");
          var i=0;
          function change(){
            var mot=["de Paris", "d'Istanbul", "de Montreal", "de Dubai", "de Moscow", "de Bamako", "de Californie"];
            mot_a_changer.innerHTML=mot[i];
            i=i+1;
            if(i==mot.length){
              i=0;
            }
          }
          setInterval(change,1500);
        </script>
      </article>
    </div>
    
<section style="margin-bottom:100px;"> 
<div class="search_zone" >
  <h2 style=" text-align:center ; color:aliceblue; top:50px; letter-spacing: 2px; font-size: 60px;">Reserver en toute <br> simplicite</h2>
<form action="pages/liste.php" class="search_form">
    <input type="text" placeholder="Destination" id="" name="pa" style="color:black; font-size: 17px;" required>
    <input type="text" placeholder="Ville de départ" id="" name="vil" style="color:black; font-size: 17px;" required>
    <input type="date" placeholder="Date de depart" id="" name="dat" style="color:black; font-size: 17px; width: 200px;" required >
    <select name='cat'>
    <option value="Balneaire" name="tout" >Tout</option>
      <option value="Balneaire" name="cat" >Balneaire</option>
      <option value="Hiver" name="cat">Hiver</option>
      <option value="Ete" name="cat">Eté</option>
      <option value="Familliale" name="cat">Familliale</option>
      <option value="Noce" name="cat">Noce</option>
    </select>
    <button type="submit">Rechercher</button>
</form>
</div>
</section>   
  </div>
  <header class="heading" align=center style="color:black; padding-bottom:30px; font-size:50px">Nos offres du moment!!</header>
  <div class="promotion_zone">
<!-- ----------------------------------------------------------------------Affichage des offres ---------------------------------------------------------->

<!-- ----------------------------------------------------------------------Affichage des offres=Toutes les offres -->
<?php 
  $off=$bdd->query("SELECT * FROM offre ORDER BY RAND() LIMIT 6");
  $i=1;
  while($res=$off->fetch()){
?>
<div class="card_zone" align="center">
    <img src="images/offre/<?php echo ($res['lien_image']) ?>" alt="">
    <h4 style="display:flex;justify-content: space-around;"><span style="color:black"><?php echo($res['pays_dest']) ?></span></h4>
    <hr>
    <h5><span style="color:black;"><?php echo ($res['titre']) ?></span></h5>
    <hr>
    <h1 style="font-size:10px; color:black">Nombre de place restante: <i style="color:rgb(173, 0, 0);font-family:Stencil std, fantasy"><?php echo($res['nb_place']) ?></i></h1>
    <hr>
    <h1 style="font-size:15px; color:black">A partir de <i style="color:rgb(173, 0, 0); font-family:Stencil std, fantasy"><?php echo($res['prix']) ?><sup> DHS</sup></i></h1>
    <hr><?php $urlv=$res['id_of']?>
    <a href='pages/details.php?id=<?php echo $urlv ?>'><button class="consultation_btn" id="but">Consulter</button></a>
</div>
<?php 
$i++;
if($i==4){$i=1; echo '</div><div class="promotion_zone">';}
//<!-- ----------------------------------------------------------------------Affichage des offres qui sont dans le nav bar:Pays et categorie -->
} ?>
  </div>
  <div class="wrapper row2">
    <section class="hoc container clear">
      <!-- Methode de payement -->
      <div class="sectiontitle">
        <h6 style="font-family:arial;" ><b id="okokok">Methodes de payement</b></h6>
        <p>Nous vous offrons plusieures methode de payement pour vous faciliter la tache</p>

      </div>
      <img src="images/demo/payement2.jpg" style="box-shadow: 15px 15px 15px #474747;">
      <!-- fin methode de payement -->
    </section>
  </div>

  <!-- footer zone -->
  <div id="go_to_footer" class="bgded overlay row4" style="background-image:url('../images/demo/backgrounds/01.png');">
    <footer id="footer" class="hoc clear">
      <div style="display:inline;">
          <div class="contactez_nous">
              <h6 class="heading" align="center">Contactez Nous</h6>
              <ul class="faico clear" align="center">
                  <li><a class="faicon-snapchat-ghost" href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
                  <li><a class="faicon-facebook animfacebook" href="#"><i class="fab fa-facebook"></i></a></li>
                  <li><a class="faicon-whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                  <li><a class="faicon-instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a class="faicon-telegram" href="#"><i class="fab fa-telegram"></i></a></li>
              </ul>
              <p style="text-align: center"><img class="logo_du_site logo_du_site_footer" src="images/demo/SMI_logo.png" alt="" /></p>
              <p class="nospace" align="center" style="margin-top:2%">N'hesitez pas a partager.</p>
          </div>
          <div class="Abonnement">
              <h4 style="margin-top:7%" class="heading">Abonnez vous pour recevoir des notifications de nos offres promotionnelle</h4>
              <p class="nospace btmspace-15">Remplissez le champ.</p>
              <form action="pages/traitement_php/abonnement_script.php" method="post">
                      <fieldset>
                      <legend>Newsletter:</legend>
                      <input class="btmspace-15" type="text" value="" placeholder="Nom" id="nom_field" name="nom_field" required>
                      <input class="btmspace-15" type="email" value="" placeholder="Email" id="email_field" name="email_field" required>
                      <button type="submit" value="submit">Valider</button>
                      </fieldset>
              </form>
          </div>
      </div>
    </footer>
  </div>

  <!-- pied de page et bibliotheque js -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
        <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="#">SMI VOYAGE</a></p>
    </div>
  </div>

  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>

  <!-- JAVASCRIPTS -->
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery.backtotop.js"></script>
  <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
<style>
  *{
    font-style: normal;
  }
  .search_zone{
    height:250px;
    margin-top: 70px;
    
    
    border:2px solid #37AE6A;
    border-radius: 15px;
    background-image: url('images/demo/rech.JPG');
    background-size: cover;
    background-position-y:-200px ;
    background-color: (256, 256, 256, 75%);
    background: linear-gradient(rgba(0,0,0,0.50), rgba(0,0,0,0.7));
}
.search_form{
    display: flex;
    margin-top: 65px;
    margin-left: 30px;
    margin-right: 30px;
    justify-content: space-evenly;

}
.search_form>input{
    height: 40px;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    padding: 5px;
}
.search_form>select{
    height: 40px;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    padding: 5px;
    color:black;
    width: 200px;
    font-size: 17px;
}
.search_form>button{
    font-weight: bold;
    border-radius: 10px;
    border: 1px solid #37AE6A;
    background-color:#37AE6A;
    backdrop-filter: blur(5px);
    width: 130px;
}
.search_form>button:hover{
    background-color: #37AE6A;
    color:white;
}
</style>
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