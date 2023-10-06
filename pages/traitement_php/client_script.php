<?php
  require("../../includes/url_picker.php");
  include("../../layout/php_scripts/connexion_bd.php");
?>
<?php 
if(isset($_POST['modifier'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $add=$_POST['addresse'];
    $tel=$_POST['tel'];
    $off=$bdd->prepare("UPDATE user SET nom=?, prenom=?, addresse=?, tel=? WHERE id_ut=? ") ;
    $off->execute(array($nom, $prenom, $add, $tel, $_COOKIE['id_client']));
    header('Location: ../client.php');
}
?>