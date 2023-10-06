<header id="header" class="hoc clear"> 
  <div id="logo" class="one_quarter first test">
    <p style="text-align: center"><a href="../index.php" title="SMI VOYAGE"><img class="logo_du_site" src="../images/demo/SMI_logo.png" alt="" /></a></p>
    <p align="center" style="margin-top:15px;">Reservez en toute serenité</p>
  </div>
  <div class="three_quarter">
    <ul class="nospace clear">
        <li class="one_third first">
            <div class="block clear"><a href="tel:+212"><i class="fas fa-phone"></i></a> <span><strong> Appelez nous:</strong><a href="tel:+211"> +212 612842357</a></span></div>
        </li>
        <li class="one_third">
            <div class="block clear"><a href="mailto:"><i class="fas fa-envelope"></i></a> <span><strong>Envoyez nous un email:</strong> <a href="mailto:">ad.maiga2107@gmail.com</span></div>
        </li>
      <?php
            if(!isset($_COOKIE['login'])){ 
          ?>
              <li class="one_third">
                <div class="block clear"><a href="#"><i class="fa fa-user"></i></a> <span><strong><a href="connexion.php?et=co" style="color:white;">Connexion</a> </strong><a href="inscription.php"style="color:white;">Inscription</a> </span></div>
              </li>
          <?php
            }
            else{
          ?>
          <?php
            if((($_COOKIE['roleu'])=='client')){
          ?>
              <li class="one_third">
                <div class="block clear"><a href="client.php"><i class="fa fa-user"></i></a> <span><strong> <?php echo $_COOKIE['login']; ?></strong><a href="connexion.php?et=deco" style="color:white;">Deconnexion</a> </span></div>
              </li>
          <?php 
            } 
            else{
          ?>
          <li class="one_third">
              <div class="block clear"><a href="admin.php"><i class="fa fa-user"></i></a> <span><strong> <?php echo $_COOKIE['login']; ?></strong><a href="connexion.php?et=deco" style="color:white;">Deconnexion</a> </span></div>
            </li>
            <?php
            }
          }
            ?>
    </ul>
  </div>
</header>