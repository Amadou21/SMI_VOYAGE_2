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
    <title>Modifier Reservation</title>
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
if(isset($_POST['add'])){
$Nom = (htmlspecialchars($_POST['nom']));$Nom=strtoupper($Nom);
$Prenom = (htmlspecialchars($_POST['prenom']));$Prenom=strtoupper($Prenom);
$Email = (htmlspecialchars($_POST['email']));
$Passeport = (htmlspecialchars($_POST['passport']));$Passeport=strtoupper($Passeport);
$Genre = (htmlspecialchars($_POST['genre']));
$Tel = (htmlspecialchars($_POST['num']));
$mod=($_POST['mode']);
$off=$bdd->prepare("UPDATE reservation SET nom_cl=?, prenom_cl=?, email_cl=?, tel_cl=?, passeport_cl=?, validation_res=? WHERE id_res=?") ;
$off->execute(array($Nom, $Prenom, $Email, $Tel, $Passeport, $mod, $ls));header('Location: admin.php');}

?>
  <div id="addReservation">
      <?php 
        $aff=$bdd->prepare("SELECT * FROM reservation WHERE id_res=?");
        $aff->execute(array($ls));
        while($res=$aff->fetch()){
      ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="newReservationForm">
                    <div class="modal-header">						
                        <h4 class="modal-title">Modifier Reservation</h4>
                        <button type="button" onclick="history.go(-1)" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group" id="ndc">
                            <label>Nom</label>
                            <input type="text" id="nom_cl" class="form-control" required name="nom" value="<?php echo ($res['nom_cl']) ?>">
                        </div>
                        <div class="form-group" id="ndc">
                            <label>Prenom</label>
                            <input type="text" id="address" class="form-control" required name="prenom" value="<?php echo ($res['prenom_cl']) ?>">
                        </div>
                        <div class="form-group" id="ndc">
                            <label>Email</label>
                            <input type="email" id="start" class="form-control" required name="email" value="<?php echo ($res['email_cl']) ?>">
                        </div>
                        <div class="form-group" id="ndc">
                            <label>Telephone</label>
                            <input type="number" id="end" class="form-control" required name="num" value="<?php echo ($res['tel_cl']) ?>">
                        </div>
                        <div class="form-group" id="ndc">
                             <label>Numero Passeport</label>
                             <input type="text" id="end" class="form-control" required name="passport" value="<?php echo ($res['passeport_cl']) ?>">
                         </div>
                         <div class="form_wrap">
                    <div class="input_wrap">
					<label  class="titre" >Genre</label>
					<ul>
						<li>
							<label class="radio_wrap">
								<input type="radio" name="genre" value="Male" class="input_radio">
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
        <div class="form_wrap">
        <div class="input_wrap">
	      <label  class="titre" >Mode de payement</label>
	        <ul>
    	    <li>
    	    	<label class="radio_wrap">
    	    		<input type="radio" name="mode" value="Validé" class="input_radio">
    	    		<span>Payé</span>
    	    	</label>
    	    </li>
    	    <li>				
    	    	<label class="radio_wrap">
    	    		<input type="radio" name="mode" value="Non validé" class="input_radio" checked>
    	    		<span>Non payé</span>
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
</body>
</html>
<?php
        }
?>