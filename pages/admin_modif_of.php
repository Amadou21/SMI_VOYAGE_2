<!DOCTYPE html>
<html lang="en">
<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../layout/styles/admin2.css">
    <link rel="stylesheet" href="../layout/styles/admin.css">
    <link rel="stylesheet" href="../layout/styles/layout2.css">
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/jquery.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color:darkgrey ;">
<?php
$ls=$_GET['id'];
$cat=$_GET['cat'];
if($cat=='off'){$aff='une offre';}
if($cat=='cl'){$aff='un client';}
if($cat=='res'){$aff='une reservation';}
?>
<?php 
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
$nb_r=$nb;
$date_sec=to_jour($date_dep);
$off=$bdd->prepare("UPDATE offre SET titre=?, date_dep=?, date_arr=?, pays_dep=?, ville_dep=?, pays_dest=?, ville_dest=?, nb_place=?, nb_place_total=?, prix=?, categorie=?, description_of=?, date_sec=? WHERE id_of=? ") ;
$off->execute(array($titre, $date_dep, $date_arr, $pays_dep, $ville_dep, $pays_arr, $ville_arr, $nb_r, $nb, $prix, $cat, $description, $date_sec, $ls ));
header('Location: admin.php');
}
?>
  <div id="addOffres">
      <?php 
        $aff=$bdd->prepare("SELECT * FROM offre WHERE id_of=?");
        $aff->execute(array($ls));
        while($res=$aff->fetch()){
      ?>
  <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="admin_modif_of.php?cat=off&id=<?php echo ($res['id_of']) ?>&addofre=mod">
              <div class="modal-header">						
                  <h4 class="modal-title">Modiffier offre</h4>
                  <button type="button" onclick="history.go(-1)" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">					
                  <div class="form-group" id="ndc">
                      <label>Titre</label>
                      <input type="text" name="titre" class="form-control" required value="<?php echo ($res['titre']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Date de depart</label>
                      <input type="date" name="date_dep" class="form-control" required value="<?php echo ($res['date_dep']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Date d'arrivé</label>
                      <input type="date" name="date_arr" class="form-control" required value="<?php echo ($res['date_arr']) ?>">
                  </div> 
                  <div class="form-group" id="ndc">
                      <label>Pays de depart</label>
                      <input type="text" name="pays_dep" class="form-control" required value="<?php echo ($res['pays_dep']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Pays de destination</label>
                      <input type="text" name="pays_arr" class="form-control" required value="<?php echo ($res['pays_dest']) ?>">
                  </div> 
                  <div class="form-group" id="ndc">
                      <label>Ville de depart</label>
                      <input type="text" name="ville_dep" class="form-control" required value="<?php echo ($res['ville_dep']) ?>">
                  </div>   
                  <div class="form-group" id="ndc">
                      <label>Ville de destination</label>
                      <input type="text" name="ville_arr" class="form-control" required value="<?php echo ($res['ville_dest']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Nombre de place</label>
                      <input type="number" name="nb" class="form-control" required value="<?php echo ($res['nb_place_total']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Prix</label>
                      <input type="number" name="prix" class="form-control" required value="<?php echo ($res['prix']) ?>">
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Categorie</label>
                      <div class="form_wrap">
                           <div class="input_wrap">
                               <ul>
                                   <li>
                                       <label class="radio_wrap">
                                           <input type="radio" id="type"name="cat" value="Balneaire" class="input_radio">
                                           <span>Balneaire</span>
                                       </label>
                                   </li>
                                   <li>				
                                       <label class="radio_wrap">
                                           <input type="radio" id="type"name="cat" value="Hiver" class="input_radio">
                                           <span>Hiver</span>
                                       </label>
                                   </li>
                                   <li>				
                                       <label class="radio_wrap">
                                           <input type="radio" id="type"name="cat" value="Famlliale" class="input_radio">
                                           <span>Familliale</span>
                                       </label>
                                   </li>
                                   <label class="radio_wrap">
                                           <input type="radio" id="type"name="cat" value="Ete" class="input_radio">
                                           <span>Ete</span>
                                  </label>
                                   </li>
                                   <label class="radio_wrap">
                                           <input type="radio" id="type"name="cat" value="Noce" class="input_radio">
                                           <span>Noce</span>
                                       </label>
                                   </li>
                               </ul>
                           </div>
                       </div>
                  </div>
                  <div class="form-group" id="ndc">
                      <label>Description</label>
                      <textarea name="description" class="form-control" required value="<?php echo ($res['description_of']) ?>"></textarea>
                  </div>
              <div class="modal-footer">
                  <a href="admin.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                  <input type="submit" class="btn btn-success" value="Modifier" name="addoffre">
              </div>
          </form>
      </div>
  </div>
  </div>
</body>
</html>
<?php
        }
?>