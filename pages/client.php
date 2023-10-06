<?php
  if(!isset($_COOKIE['login'])){ header('Location: ../index.php');
?>
<?php 
}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='admin'){header('Location: ../index.php');}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='client'){
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
    <link rel="stylesheet" href="../layout/styles/admin.css">
    <link rel="stylesheet" href="../layout/styles/layout2.css">
    <link rel="stylesheet" href="layout/styles/Younouss.css" type="text/css">
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/"></script>
    <script src="../layout/scripts/jquery.min.js"></script>
    
    <title>ESPACE CLIENT</title>
</head>
<body>
<div class=" overlay yb_zone_de_base" style="background-image:url('../images/demo/client.jpg');">
<header id="header" class="hoc clear"> 
  <div id="logo" class="one_quarter first test">
    <p style="text-align: center"><a href="../index.php" title="SMI VOYAGE"><img class="logo_du_site" src="../images/demo/SMI_logo.png" alt="" /></a></p>
    <p align="center" style="margin-top:15px;">Reservez en toute serenité</p>
  </div>
  <div class="three_quarter">
    <ul class="nospace clear">
        <li class="one_third first">
            <div class="block clear"><a href="tel:+212"><i class="fas fa-phone"></i></a> <span><strong> Appelez nous:</strong><a href="tel:+223"> +212 612842357</a></span></div>
        </li>
        <li class="one_third">
            <div class="block clear"><a href="mailto:"><i class="fas fa-envelope"></i></a> <span><strong>Envoyez nous un email:</strong> <a href="mailto:">amadoumaiga1111@gmail.com</span></div>
        </li>
        <li class="one_third">
            <div class="block clear"><a href="#editprofil" data-toggle="modal"><i class="fa fa-user"></i></a><a data-toggle="modal" href="#editprofil"><span><strong>Profil</strong></a><a href="connexion.php?et=deco" style="color:white;"><strong>Deconnexion</strong></a> </span></div>
        </li>
    </ul>
</div>
</header>
  
</div>
<div classe="reservation_zone" id="reservation_zone">
    <!--------------------------------  Reservation zone    ---------------------------------------------------->
    <div class="container-xll">
        <div class="">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Les Reservation</h2>
                            </div>

                        </div>
                    </div>
                	
            <table class="table table-striped table-hover" >
                <tr>
                    <th style="background-color:#435d7d; color:white;">Id de la reservation</th>
                    <th style="background-color:#435d7d; color:white;">Id de l'offre</th>
                    <th style="background-color:#435d7d; color:white;">Ville de depart</th>
                    <th style="background-color:#435d7d; color:white;">Ville de destination</th>
                    <th style="background-color:#435d7d; color:white;">Titre du voyage</th>
                    <th style="background-color:#435d7d; color:white;">Prix</th>
                    <th style="background-color:#435d7d; color:white;">Statue</th>
                    <th style="background-color:#435d7d; color:white;">Action</th>
                </tr>
                <?php 
                $off=$bdd->prepare("SELECT * FROM reservation JOIN offre where id_client=? AND id_offre=id_of");
                $off->execute(array($_COOKIE['id_client']));
                while($res=$off->fetch()){
                ?>
                <tr>
                <th><?php echo ($res['id_res']) ?></th>
                <th><?php echo ($res['id_offre']) ?></th>
                <th><?php echo ($res['ville_dep']) ?></th>
                <th><?php echo ($res['ville_dest']) ?></th>
                <th><?php echo ($res['titre']) ?></th>
                <th><?php echo ($res['prix']) ?></th>
                <th><?php echo ($res['validation_res']) ?></th>
                <th><a href='client_modif_res.php?cat=res&id=<?php echo ($res['id_res']) ?>' ><i class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a> 
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
                                    <label>Nom du client</label>
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
                                <div class="form_wrap">
                                    <div class="input_wrap">
                                        <label  class="titre" >Genre</label>
                                        <ul>
                                            <li>
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Male" class="input_radio" checked>
                                                    <span>Male</span>
                                                </label>
                                            </li>
                                            <li>				
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Femelle" class="input_radio">
                                                    <span>Femelle</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Autre" class="input_radio">
                                                    <span>Autre</span>
                                                </label>
                                            </li>
                                        </ul>
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
                <div id="editEmployeeModal" class="modal fade" ng-controller="editStudent">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Modification d'une offre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>


                                <div class="modal-body" ng-controller="editStudent">					
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
                                    <div class="form_wrap">
                                    <div class="input_wrap">
                                        <label  class="titre" >Genre</label>
                                        <ul>
                                            <li>
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Male" class="input_radio" checked>
                                                    <span>Male</span>
                                                </label>
                                            </li>
                                            <li>				
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Femelle" class="input_radio">
                                                    <span>Femelle</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="radio_wrap">
                                                    <input type="radio" name="genre" value="Autre" class="input_radio">
                                                    <span>Autre</span>
                                                </label>
                                            </li>
                                        </ul>
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
                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
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
        </div>
    </div>
</div>
</div>
           <!-- --------------------------------------------Edit profil-------------------------------------------------------->
          <div id="editprofil" class="modal fade" >
            <div class="modal-dialog">
         <div class="modal-content">
         <?php 
           $aff=$bdd->prepare("SELECT * FROM user WHERE id_ut=?");
           $aff->execute(array($_COOKIE['id_client']));
           while($res=$aff->fetch()){
         ?>
             <form method="POST" action="traitement_PHP/client_script.php">
                 <div class="modal-header">                     
                     <h4 class="modal-title">Modifier votre profil</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body" >                  
                     <div class="form-group" id="ndc">
                         <label>Votre nom</label>
                         <input type="text" id="nom_cl" class="form-control" required name="nom" value="<?php echo ($res['nom']) ?>">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Votre prenom</label>
                         <input type="text" id="nom_cl" class="form-control" required name="prenom" value="<?php echo ($res['prenom']) ?>">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Votre addresse</label>
                         <input type="text" id="address" class="form-control" required name="addresse" value="<?php echo ($res['addresse']) ?>">
                     </div>
                     <div class="form-group" id="ndc">
                         <label>Votre numero de telephone</label>
                         <input type="tel" id="tel" class="form-control" required name="tel" value="<?php echo ($res['tel']) ?>">
                     </div>
                 <div class="modal-footer">
                     <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <input type="submit" class="btn btn-info" value="Modifier" name="modifier" >
                 </div>
             </form>
             <?php
                    }
            ?>
         </div>
     </div>
 </div>
<script>

</script>
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
<script>s      
    $('#reservation_zone').show();

$(document).ready(function(){
    $("#subcl").click(function(){location.reload(true);});
})
</script>
<script src="../layout/scripts/"></script>
<script src="../layout/scripts/"></script>
<script src="../layout/scripts/jquery.min.js"></script>
</html>

<?php 
}
?>