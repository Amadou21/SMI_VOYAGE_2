<?php
 require("../../includes/url_picker.php");
 include("../../layout/php_scripts/connexion_bd.php");
$ls=$_GET['id'];
$Nom = (htmlspecialchars($_POST['nom']));$Nom=strtoupper($Nom);
$Prenom = (htmlspecialchars($_POST['prenom']));$Prenom=strtoupper($Prenom);
$Email = (htmlspecialchars($_POST['email']));
$Passeport = (htmlspecialchars($_POST['passport']));$Passeport=strtoupper($Passeport);
$Genre = (htmlspecialchars($_POST['genre']));
$Tel = (htmlspecialchars($_POST['num']));
$mod=($_POST['mode']);
if($mod=='wafa'){
$off=$bdd->prepare("INSERT INTO reservation(id_offre, id_client, nom_cl, prenom_cl, email_cl, tel_cl, passeport_cl) VALUES (?,?,?,?,?,?,?)") ;
$off->execute(array($ls, $_COOKIE['id_client'], $Nom, $Prenom, $Email, $Tel, $Passeport));header('Location: ../../index.php');}
else{
$off=$bdd->prepare("INSERT INTO reservation(id_offre, id_client, nom_cl, prenom_cl, email_cl, tel_cl, passeport_cl) VALUES (?,?,?,?,?,?,?)") ;
$off->execute(array($ls, $_COOKIE['id_client'], $Nom, $Prenom, $Email, $Tel, $Passeport));
      header('Location: ../../index.php');
}

?>