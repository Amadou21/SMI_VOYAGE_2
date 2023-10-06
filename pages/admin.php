<?php
  if(!isset($_COOKIE['login'])){ header('Location: ../index.php');
?>
<?php 
}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='client'){header('Location: ../index.php');}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='admin'){
?>
<?php
  require("../includes/url_picker.php");
  include("../layout/php_scripts/connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="en" ng-app="app">
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
    <link rel="stylesheet" href="../layout/styles/admin3.css">
    <link rel="stylesheet" href="../layout/styles/layout2.css">
    
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/jquery.min.js"></script>

    <title>SMI VOYAGE ADMIN</title>
</head>
<body>
<div class="bgded overlay yb_zone_de_base" style="background-image:url('../images/demo/details.jpg');">
<header id="header" class="hoc clear"> 
  <div id="logo" class="one_quarter first test">
    <p style="text-align: center"><a href="../index.php" title="SMI VOYAGE"><img class="logo_du_site" src="../images/demo/SMI_logo.png" alt="" /></a></p>
    <p align="center" style="margin-top:15px;">Reservez en toute serenité</p>
  </div>
  <div class="three_quarter">
    <ul class="nospace clear">     
        <li class="one_third" style="float: right;">
            <div class="block clear"><a href="#editprofil" data-toggle="modal"><i class="fa fa-user"></i></a><a data-toggle="modal" href="#editprofil"><span><strong>Profil</strong></a><a href="connexion.php?et=deco" style="color:white;"><strong>Deconnexion</strong></a> </span></div>
        </li>
    </ul>
</div>
</header>
<div id="menu" class="deuxieme" ng-app="app">
    <div class="form_wrap">
        <div class="input_wrap">
            <ul>
                <li>
                    <label class="radio_wrap">
                        <input type="radio" name="genre" value="Male" class="input_radio" checked>
                        <span id="chambre">Gestion des offres</span>
                    </label>
                </li>
                <li>
                    <label class="radio_wrap">
                        <input type="radio" name="genre" value="Male" class="input_radio">
                        <span id="client">Gestion des Client</span>
                    </label>
                </li>
                <li>				
                    <label class="radio_wrap">
                        <input type="radio" name="genre" value="Femelle" class="input_radio">
                        <span id="reservation">Gestion des Reservation</span>
                    </label>
                </li>
            </ul>
        </div>
</div>
</div>
</div>
<div class="chambre_zone" id="chambre_zone" ng-app="app" ng-controller="mainController">
    <!--------------------------------  offre zone    ---------------------------------------------------->
    <div class="container-xll">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Les offres</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addOffres" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter une offre</span></a>	
                        </div>
                    </div>
                </div>	
                <table class="table table-striped table-hover" >
                <tr>
                    <th style="background-color:#435d7d; color:white;">id de l'offre</th>
                    <th style="background-color:#435d7d; color:white;">Type</th>
                    <th style="background-color:#435d7d; color:white;">Pays de destination</th>
                    <th style="background-color:#435d7d; color:white;">Pays de depart</th>
                    <th style="background-color:#435d7d; color:white;">Place Total</th>
                    <th style="background-color:#435d7d; color:white;">Place restante</th>
                    <th style="background-color:#435d7d; color:white;">Prix(DH)</th>
                    <th style="background-color:#435d7d; color:white;">Action</th>
                </tr>
                <?php 
                $off=$bdd->query("SELECT * FROM offre");
                $i=1;
                while($res=$off->fetch()){
                ?>
                <tr>
                <th><?php echo ($res['id_of']) ?></th>
                <th><?php echo ($res['categorie']) ?></th>
                <th><?php echo ($res['pays_dest']) ?></th>
                <th><?php echo ($res['pays_dep']) ?></th>
                <th><?php echo ($res['nb_place_total']) ?></th>
                <th><?php echo ($res['nb_place']) ?></th>
                <th><?php echo ($res['prix']) ?></th>
                <th><a href='admin_modif_of.php?cat=off&id=<?php echo ($res['id_of']) ?>'><i class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a> 
                    <a href='admin_sup.php?cat=off&id=<?php echo ($res['id_of']) ?>'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></th></tr>
                <?php }?>
                </table>
                <div id="addOffres" class="modal fade">
                <div class="modal-dialog" >
                    <div class="modal-content">
                        <form action="traitement_php/admin_sript.php" class="contact-form" method="POST">
                            <div class="modal-header">						
                                <h4 class="modal-title">Ajoutez une offre</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group" id="ndc">
                                    <label>Titre</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Date de depart</label>
                                    <input type="date" name="date_dep" class="form-control" required>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Date d'arrivé</label>
                                    <input type="date" name="date_arr" class="form-control" required>
                                </div> 
                                <div class="form-group" id="ndc">
                                    <label>Pays de depart</label>
                                    <input type="text" name="pays_dep" class="form-control" required>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Pays de destination</label>
                                    <input type="text" name="pays_arr" class="form-control" required>
                                </div> 
                                <div class="form-group" id="ndc">
                                    <label>Ville de depart</label>
                                    <input type="text" name="ville_dep" class="form-control" required>
                                </div>   
                                <div class="form-group" id="ndc">
                                    <label>Ville de destination</label>
                                    <input type="text" name="ville_arr" class="form-control" required>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Nombre de place</label>
                                    <input type="number" name="nb" class="form-control" required>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Prix</label>
                                    <input type="number" name="prix" class="form-control" required>
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
                                    <textarea name="description" class="form-control" required style="height: 300px; width:100%;"></textarea>
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Lien de l'image</label>
                                    <input type="text" name="image" class="form-control" required></input>
                                </div>
                            <div class="modal-footer">
                                <a href="admin.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                                <input type="submit" class="btn btn-success" value="Add" name="addoffre">
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="client_zone" id="client_zone" style="display: none" ng-controller="clientController">
    <!--------------------------------  client zone    ---------------------------------------------------->
    <div class="container-xll">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Les clients</h2>
                        </div>

                    </div>
                </div>	
                <table class="table table-striped table-hover" >
                <tr>
                    <th style="background-color:#435d7d; color:white;">id du client</th>
                    <th style="background-color:#435d7d; color:white;">Nom</th>
                    <th style="background-color:#435d7d; color:white;">Prenom</th>
                    <th style="background-color:#435d7d; color:white;">Email</th>
                    <th style="background-color:#435d7d; color:white;">Telephone</th>
                    <th style="background-color:#435d7d; color:white;">Action</th>
                </tr>
                <?php 
                $off=$bdd->query("SELECT * FROM user WHERE roleu='client'");
                $i=1;
                while($res=$off->fetch()){
                ?>
                <tr>
                <th><?php echo ($res['id_ut']) ?></th>
                <th><?php echo ($res['nom']) ?></th>
                <th><?php echo ($res['prenom']) ?></th>
                <th><?php echo ($res['email']) ?></th>
                <th><?php echo ($res['tel']) ?></th>
                <th><a href='admin_modif.php?cat=cl&id=<?php echo ($res['id_ut']) ?>'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a> 
                    <a href='admin_sup.php?cat=cl&id=<?php echo ($res['id_ut']) ?>'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></th></tr>
    
                <?php } ?>
                </table>
                <div id="addclient" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form name="newClientForm" id="newClientForm">
                            <div class="modal-header">						
                                <h4 class="modal-title">Ajoutez un client</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group" id="ndc">
                                    <label>Nom du client</label>
                                    <input type="text" id="nom" ng-model="newClient.nom" class="form-control" required name="ndc">
                                </div>
                                <div class="form-group" id="dc">
                                    <label>Addresse</label>
                                    <input type="text" id="add" ng-model="newClient.add" class="form-control" required name="ddc">
                                </div>	
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" id="subcl" class="btn btn-success" value="Add" name="addcl">
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div classe="reservation_zone" id="reservation_zone" style="display: none" ng-controller="reservationsController">
    <!--------------------------------  Reservation zone    ---------------------------------------------------->
    <div class="container-xll" ng-controller="editStudent">
        <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Les Reservation</h2>
                            </div>
                        
                        
                            </div>
                        </div>
                    </div>
                	
            <table class="table table-striped table-hover" >
                <tr>
                    <th style="background-color:#435d7d; color:white;" >Id de la reservation</th>
                    <th style="background-color:#435d7d; color:white;" >Id de l'offre</th>
                    <th style="background-color:#435d7d; color:white;" >Id du client</th>
                    <th style="background-color:#435d7d; color:white;" >Nom du client</th>
                    <th style="background-color:#435d7d; color:white;" >Statut de la reservation</th>
                    <th style="background-color:#435d7d; color:white;" >Action</th>
                </tr>
                <?php 
                $off=$bdd->query("SELECT * FROM reservation");
                $i=1;
                while($res=$off->fetch()){
                ?>
                <tr>
                <th><?php echo ($res['id_res']) ?></th>
                <th><?php echo ($res['id_offre']) ?></th>
                <th><?php echo ($res['id_client']) ?></th>
                <th><?php echo ($res['nom_cl']) ?></th>
                <th><?php echo ($res['validation_res']) ?></th>
                <th><a href='admin_modif_res.php?cat=res&id=<?php echo ($res['id_res']) ?>' ><i class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a> 
                    <a href='admin_sup.php?cat=res&id=<?php echo ($res['id_res']) ?>'><i class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></th></tr>
                
                <?php } ?>
            </table>
            <div id="addreservation" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" id="newReservationForm">
                            <div class="modal-header">						
                                <h4 class="modal-title">Ajoutez Reservation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group" id="ndc">
                                    <label>id de l'offre</label>
                                    <input type="text" id="nom_cl" class="form-control" required name="ndc">
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Addresse du client</label>
                                    <input type="text" id="address" class="form-control" required name="ndc">
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Date du debut du sejou</label>
                                    <input type="date" id="start" class="form-control" required name="ndc">
                                </div>
                                <div class="form-group" id="ndc">
                                    <label>Date de fin de sejour</label>
                                    <input type="date" id="end" class="form-control" required name="ndc">
                                </div>
                                <div class="form-group" id="nc">
                                    <label>Type</label>
                                    <div class="form_wrap">
                                    <div class="input_wrap">
                                        <ul>
                                            <li>
                                                <label class="radio_wrap">
                                                    <input type="radio" id="type" value="single" class="input_radio" checked>
                                                    <span>Single</span>
                                                </label>
                                            </li>
                                            <li>				
                                                <label class="radio_wrap">
                                                    <input type="radio" id="type" value="double" class="input_radio">
                                                    <span>Double</span>
                                                </label>
                                            </li>
                                            <li>				
                                                <label class="radio_wrap">
                                                    <input type="radio" id="type" value="family" class="input_radio">
                                                    <span>Family</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" id="subcl" class="btn btn-success" value="Add" name="add">
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

          <!-- --------------------------------------------Edit profil-------------------------------------------------------->
          <div id="editprofil" class="modal fade" >
     <div class="modal-dialog">
         <div class="modal-content">
             <form>
                 <div class="modal-header">						
                     <h4 class="modal-title">Modifier la reservation</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body" >					
                     <div class="form-group" id="ndc">
                         <label>Nom du client</label>
                         <input type="text" id="nom_cl" class="form-control" required name="ndc" ng-model="reservation.client">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Addresse du client</label>
                         <input type="text" id="address" class="form-control" required name="ndc" ng-model="reservation.client">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Date du debut du sejou</label>
                         <input type="date" id="start" class="form-control" required name="ndc" ng-model="reservation.start">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Date de fin de sejour</label>
                         <input type="date" id="end" class="form-control" required name="ndc" ng-model="reservation.end">
                     </div>
                     <div class="form-group" id="nc">
                         <label>Type</label>
                         <div class="form_wrap">
                         <div class="input_wrap">
                             <ul>
                                 <li>
                                     <label class="radio_wrap">
                                         <input type="radio" id="type" value="single" class="input_radio">
                                         <span>Single</span>
                                     </label>
                                 </li>
                                 <li>				
                                     <label class="radio_wrap">
                                         <input type="radio" id="type" value="double" class="input_radio">
                                         <span>Double</span>
                                     </label>
                                 </li>
                                 <li>				
                                     <label class="radio_wrap">
                                         <input type="radio" id="type" value="family" class="input_radio">
                                         <span>Family</span>
                                     </label>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <input type="submit" class="btn btn-info" value="Save" ng-click="edit(student.$id)">
                 </div>
             </form>
         </div>
     </div>
 </div>
 <div id="deleteoffre" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delete" class="delete-user">
                <div class="modal-header">						
                    <h4 class="modal-title">Supprimer une Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Etes vous sure de vouloir suprimer</p>
                    <p class="text-warning"><small>Cette action est irremediable.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger deleteIconUI" id="deleteIconUI" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</div>     
</body>
<style>

th, td {
  padding: 15px;
  text-align: left;
}
th, td {
  border-bottom: 1px solid #ddd;
}
tr:hover {background-color: coral;}
tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
  background-color: white;
  color: black;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
</style>
<script>
    $('#chambre').on('click', function(){
    $('#chambre_zone').show();
    $('#reservation_zone').hide();
    $('#client_zone').hide();
   
});
$('#reservation').on('click', function(){
    $('#reservation_zone').show();
    $('#chambre_zone').hide();
    $('#client_zone').hide();
});
$('#client').on('click', function(){
    $('#reservation_zone').hide();
    $('#chambre_zone').hide();
    $('#client_zone').show();
});

$(document).ready(function(){
    $("#subcl").click(function(){location.reload(true);});
})



</script>
</html>
<?php 
}
?>