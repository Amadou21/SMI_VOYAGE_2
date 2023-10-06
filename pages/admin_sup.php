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
<body>
<?php
$ls=$_GET['id'];
$cat=$_GET['cat'];
if($cat=='off'){$aff='une offre';}
if($cat=='cl'){$aff='un client';}
if($cat=='res'){$aff='une reservation';}
if(isset($_GET['sup'])){
    if($cat=='off'){
        $sup=$bdd->prepare('DELETE FROM offre WHERE id_of=?');
        $sup->execute(array($ls));
    }
    if($cat=='cl'){
        $sup=$bdd->prepare('DELETE FROM user WHERE id_ut=?');
        $sup->execute(array($ls));
    }
    if($cat=='res'){
        $sup=$bdd->prepare('DELETE FROM reservation WHERE id_res=?');
        $sup->execute(array($ls));
    }
    if(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='client'){header('Location: client.php');}elseif(isset($_COOKIE['login']) and ($_COOKIE['roleu'])=='admin'){header('Location: admin.php');}
   
}
?>
<div id="deleteoffre">
    <div class="modal-dialog">
        <div class="modal-content"><!--  -->
            <form methode="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="modal-header">						
                    <h4 class="modal-title">Supprimer <?php echo $aff ?> </h4>
                    <button type="button" onclick="history.go(-1)" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div> 
                <div class="modal-body">					
                    <p>Etes vous sure de vouloir suprimer</p>
                    <p class="text-warning"><small>Cette action est irremediable.</small></p>
                    <input type='text' style="visibility: hidden;" name='cat' value='<?php echo $cat ?>'>
                    <input type='text' style="visibility: hidden;" name='id' value='<?php echo $ls ?>'>
                </div>
                <div class="modal-footer">
                    <a href="admin.php"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                    <input type="submit" class="btn btn-danger deleteIconUI" id="deleteIconUI" value="Delete" name="sup">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
    if(isset($_POST['sup'])){
        if($cat='off'){
            $sup=$bdd->prepare('DELETE FROM offre WHERE id_of=?');
            $sup->execute(array($ls));
        }
        if($cat='cl'){
            $sup=$bdd->prepare('DELETE FROM user WHERE id_ut=?');
            $sup->execute(array($ls));
        }
        if($cat='res'){
     
        }
        header('location: admin.php');
    }
?>