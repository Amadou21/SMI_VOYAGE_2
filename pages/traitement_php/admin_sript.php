<?php
  require("../../includes/url_picker.php");
  include("../../layout/php_scripts/connexion_bd.php");
  function to_jour($date){
    $date_explose=explode("-", $date); 
    $jour=(int)$date_explose[2];
    $mois=(int)$date_explose[1];
    $anne=(int)$date_explose[0];
    $nb=$jour+($mois*30)+($anne*365);
    return $nb;
}
?>
<?php 
if(isset($_POST['addoffre'])){
  $titre=$_POST['titre'];
  $date_dep=$_POST['date_dep'];
  $date_arr=$_POST['date_arr'];
  $pays_dep=$_POST['pays_dep']; $pays_dep=strtoupper($pays_dep);
  $pays_arr=$_POST['pays_arr']; $pays_arr=strtoupper($pays_arr);
  $ville_dep=$_POST['ville_dep'];$ville_dep=strtoupper($ville_dep);
  $ville_arr=$_POST['ville_arr'];$ville_arr=strtoupper($ville_arr);
  $nb=$_POST['nb'];
  $prix=$_POST['prix'];
  $cat=$_POST['cat']; $cat=strtoupper($cat);
  $description=$_POST['description'];
  $lien=$_POST['image'];
  $nb_r=$nb;
  $date_sec=to_jour($date_dep);
  $off=$bdd->prepare("INSERT INTO offre(titre, date_dep, date_arr, pays_dep, ville_dep, pays_dest, ville_dest, nb_place, nb_place_total, prix, categorie, description_of, date_sec, lien_image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)") ;
  $off->execute(array($titre, $date_dep, $date_arr, $pays_dep, $ville_dep, $pays_arr, $ville_arr, $nb_r, $nb, $prix, $cat, $description, $date_sec, $lien ));
  header('Location: ../admin.php');
}
if(isset($_POST['arddoffre'])){
  $titre=$_POST['titre'];
  $date_dep=$_POST['date_dep'];
  $date_arr=$_POST['date_arr'];
  $pays_dep=$_POST['pays_dep']; $pays_dep=strtoupper($pays_dep);
  $pays_arr=$_POST['pays_arr']; $pays_arr=strtoupper($pays_arr);
  $ville_dep=$_POST['ville_dep'];$ville_dep=strtoupper($ville_dep);
  $ville_arr=$_POST['ville_arr'];$ville_arr=strtoupper($ville_arr);
  $nb=$_POST['nb'];
  $prix=$_POST['prix'];
  $cat=$_POST['cat']; $cat=strtoupper($cat);
  $description=$_POST['description'];
  $nb_r=$nb;
  $date_sec=to_jour($date_dep);
  $off=$bdd->prepare("INSERT INTO offre(titre, date_dep, date_arr, pays_dep, ville_dep, pays_dest, ville_dest, nb_place, nb_place_total,prix, categorie, description_of, date_sec) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)") ;
  $off->execute(array($titre, $date_dep, $date_arr, $pays_dep, $ville_dep, $pays_arr, $ville_arr, $nb_r, $nb, $prix, $cat, $description,$date_sec ));
  header('Location: ../admin.php');
  }
  if(isset($_POST['addreservation'])){
  $=$_POST[''];
  $=$_POST[''];
  $=$_POST[''];
  $=$_POST[''];
  $=$_POST[''];
  $=$_POST[''];
  $=$_POST[''];
  
  
  
  
  
  $date_sec=to_jour($date_dep);
  $off=$bdd->prepare("INSERT INTO offre(titre, date_dep, date_arr, pays_dep, ville_dep, pays_dest, ville_dest, nb_place, nb_place_total,prix, categorie, description_of, date_sec) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)") ;
  $off->execute(array($titre, $date_dep, $date_arr, $pays_dep, $ville_dep, $pays_arr, $ville_arr, $nb_r, $nb, $prix, $cat, $description,$date_sec ));
  header('Location: ../admin.php');
}
?>
<script>console.log( jour :<?php echo $jour ?> mois:<?php echo $mois ?>)</script>
