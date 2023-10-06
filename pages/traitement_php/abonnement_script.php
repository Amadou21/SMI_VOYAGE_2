<?php
    require("../../layout/php_scripts/connexion_bd.php");
        try{
            //On verifie si les informations sont dans la base de donnee
            $query=$bdd->prepare('SELECT * FROM abonnee WHERE email=?');
            $query->execute(array($_POST['email_field']));
            $Nom = (htmlspecialchars($_POST['nom_field']));
            $Email = (htmlspecialchars($_POST['email_field']));
            //Si cest le cas
            if($query1=$query->fetch()){
                echo(" Vous êtes deja abonée . avec un jolie design et tout mec");
                // ce code va le renvoyer vers la page de connexion.php
                //header('Location: ../../index.php');
                header('Location: '.$_COOKIE['pageurl'].'#go_to_footer');
            } 
            
            // Si cest pas le cas
            else{
                $Insert = $bdd->prepare("INSERT INTO abonnee(nom, email) VALUES(?,?)");
                $Insert->execute(array($Nom, $Email));
                echo(" Ajouter avec succes.");
                //puis on le dirige vers index.php mais si tu veux fait vers la page que tu veux
                // ce code va le renvoyer vers la page de index.php
                header('Location: '.$_COOKIE['pageurl'].'#go_to_footer');
            }
            echo($_SERVER['REQUEST_URI'].'\n');
            echo($_SERVER['HTTP_HOST'].'\n');
            echo(htmlspecialchars($_POST['text']));

        }
        catch(Exception $e){
            die('Erreur: '.$e->$_POSTMessage());
        }
    
?>