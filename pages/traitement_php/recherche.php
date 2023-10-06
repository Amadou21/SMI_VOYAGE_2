<?php 
function to_jour($date){
    $date_explose=explode("-", $date); 
    $jour=(int)$date_explose[2];
    $mois=(int)$date_explose[1];
    $anne=(int)$date_explose[0];
    $nb=$jour+($mois*30)+($anne*365);
    return $nb;
}
$dest=$_POST["dest"];
$dep=$_POST["dep"] ; 
$date=$_POST["date"];
$cat=$_POST["categori"];


$dest=$_GET["dest"];
$dep=$_GET["dep"] ; 
$date=$_GET["date"];
$cat=$_GET["categori"];
$dest=strtoupper($dest);
$dep=strtoupper($dep);
 $date_j=to_jour($date);
header('Location: ../liste.php?pa=3&cat=3&vil=3&dat=3');
?>