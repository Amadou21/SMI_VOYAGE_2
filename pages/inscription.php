<!DOCTYPE html>
<?php
  setcookie('login','',1,'/');
  setcookie('motdepasse', '',1,'/');
?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../layout/styles/inscription.css">
    <script src="../layout/scripts/jquery.min.js"></script>
   </head>
<body>
    <span class="bub a"></span>
<!--     <span class="bub b"></span>
 -->    <span class="bub c"></span>
<!--     <span class="bub d"></span>
 -->    <span class="bub e"></span>
<!--     <span class="bub f"></span>
 -->    <span class="bub g"></span>


  <div class="container">
    <div class="title">Inscrivez-vous</div><br>
    <div class="content">
      <form action="traitement_php/inscription_script.php" method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" maxlength="30" placeholder="votre Nom" required autofocus>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" name="prenom" maxlength="30" placeholder="votre Prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" maxlength="60" placeholder="exemple@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Numero de telephone</span>
            <input type="number" name="num" placeholder="votre Numero" maxlength="8" required>
          </div>    
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="password" name="password1" maxlength="60" placeholder="" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer votre mot de passe</span>
            <input type="password" name="password2" maxlength="60" placeholder="**********" required>
          </div>
          <div class="input-box">
            <span class="details">Adresse</span>
            <input type="text" name="add" maxlength="2990" placeholder="votre Addresse" required style="width:214%; height:100%">
          </div>
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
        <div class="button">
          <input type="submit" value="inscription">
        </div>
      </form>
      <p align="center">Vous avez deja un compte? <a href="connexion.php"><b class="inscription_text">Connectez vous</b></p></a>
    </div>
    <?php
      if(isset($_GET['etatmdp'])){
        if($_GET['etatmdp']==1){
    ?>
          <div id="popup" style="position:fixed; width:200px; right:0; top:0; margin:12px; color:red; background-color:rgba(204, 204, 204, 0.575); padding:10px; text-align:center; border-radius:12px;">
            <p>Les deux mot de passe ne correspondent pas ou le mot de passe a moin de 8 caracteres.</p>
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
        elseif($_GET['etatmdp']==2){
    ?>
          <div id="popup" style="position:fixed; width:200px; right:0; top:0; margin:12px; color:red; background-color:rgba(204, 204, 204, 0.575); padding:10px; text-align:center; border-radius:12px;">
            <p>Probleme de connexion. Veuillez verifier votre connexion internet</p>
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
      }
    ?>
  </div>
  <i id='i' class="fas fa-window-close" onclick = "history.go(-1)" style="color:white; position:fixed; right:15px; top:15px; z-index:999999;font-size:35px;"></i>
    <script>
        let btn=document.getElementById('i');
        btn.onclick=function(){
            window.location.replace('../index.php');
            header('Location: '.$_COOKIE['pageurl']);
        }
    </script>

</body>
</html>

