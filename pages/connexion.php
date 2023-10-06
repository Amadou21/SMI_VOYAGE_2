
<!DOCTYPE html>
<?php
    setcookie('login','',1,'/');
    setcookie('motdepasse', '',1,'/');
    setcookie('roleu','',1,'/');
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layout/styles/connexion.css">
    <!-- <link rel="stylesheet" href="../layout/styles/fontawesome-free/css/all.css"> -->
    <script src="../layout/scripts/jquery.min.js"></script>
    <title>Connexion</title>
</head>
<body>
    <div class="main_zone">
        <h1 id="test" class="connexion_text">Connexion</h1>
        <form action="traitement_php/connexion_script.php" method="post" class="connexion_form">
            <div class="connexion_form_zone">
                <label style="text-align:center;" for="login"><h2>Login:</h2></label>
                <input type="text" name="login" id="login" autofocus>
                <label style="text-align:center;" for="password"><h2>Mot de passe:</h2></label>
                <input type="password" name="password" id="password">
                <p align="center"><button type="submit">Connexion</button></p>
                <p align="center"><a href="mot_de_passe_oublie.php"><b class="mdp">Mot de passe oublié ?</b></a></p>
            </div>
        </form>
        <p align="center">Vous n'avez pas encore de compte? <a href="inscription.php"><b class="inscription_text">Inscrivez vous</b></p></a>
    </div>
    <?php
      if(isset($_GET['etatmdp'])){
    ?>
    <div id="popup" style="position:fixed; width:200px; right:0; top:0; margin:12px; color:red; background-color:rgba(204, 204, 204, 0.575); padding:10px; text-align:center; border-radius:12px;">
      <p>Vous etes deja connecter. Inserer vos informations pour vous connecter.</p>
    </div>
    <script>
      $("#popup");
      setTimeout(disparait,7000);
      function disparait(){
        $("#popup").slideToggle(1000);
      }
    </script>
    <?php
      }
    ?>
    <div class="cercle cercle1"></div>
    <div class="cercle cercle2"></div>
    <?php 
    if(!isset($_GET['et'])){$ls='co';}
    $ls=$_GET['et'];
    if($ls=='co'){
    ?>
    <i  onclick = "history.go(-1)" class="fas fa-window-close" style="color:rgba(4, 235, 4, 0.664); position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i>
    <?php 
    }else{
    ?>
    <i  id="i" class="fas fa-window-close" style="color:rgba(4, 235, 4, 0.664); position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i>
    <?php } ?>
    <script>
        let btn=document.getElementById('i');
        btn.onclick=function(){
            window.location.replace('../index.php');
        }
    </script>
    <?php
      if(isset($_GET['etat'])){
    ?>
      <?php
        if($_GET['etat']==1){
      ?>
          <div id="popup" style="width:300px; background:linear-gradient(90deg, rgba(120, 194, 98, 0.527), rgba(128, 255, 249, 0.548)); text-align:center; border-radius:10px; position:fixed; top:0; margin-top:10px;">
            <h2>Mot de passe ou email incorrecte. Veuillez vous reconnecter</h2>
          </div>
          <script>
            setTimeout(disparait,4000);
            function disparait(){
              $("#popup").slideToggle(1000);
            }
          </script>
      <?php
        }
        elseif($_GET['etat']==2){
      ?>
          <div id="popup" style="width:300px; background:linear-gradient(90deg, rgba(120, 194, 98, 0.527), rgba(128, 255, 249, 0.548)); text-align:center; border-radius:10px; position:fixed; top:0; margin-top:10px;">
            <h2>Une erreur est survenue. Veuillez vous reconnecter</h2>
          </div>
          <script>
            setTimeout(disparait,4000);
            function disparait(){
              $("#popup").slideToggle(1000);
            }
          </script>
    <?php
        }
      }
    ?>
    

    
</body>
</html>