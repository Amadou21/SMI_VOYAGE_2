<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../layout/styles/connexion.css">
        <script src="../layout/scripts/jquery.min.js"></script>
	    <title>Mot de passe oubli&eacute</title>
    </head>

    <body>
        <div class="main_zone">
            <h1 class="connexion_text">Mot de passe oublie</h1>
            <form action="traitement_php/mot_de_passe_oublier_script.php" method="post" class="connexion_form">
                <div class="connexion_form_zone">
                    <center><p face="arial">Saisissez l'adresse e-mail de votre comptre</p></center>
                    <input type="email" placeholder="Adresse mail" name="email" required>
                    <p align="center"><button type="submit">Envoyer</button></p>
                </div>
            </form>
        </div>
        <div class="cercle cercle1"></div>
        <div class="cercle cercle2"></div>
        <?php
            if(isset($_GET['etatmdp'])){
        ?>
        <div id="popup" style="position:fixed; width:200px; right:0; top:0; margin:12px; color:red; background-color:rgba(204, 204, 204, 0.575); padding:10px; text-align:center; border-radius:12px;">
            <p>Veuillez saisir un email correcte.</p>
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
    </body>
</html>