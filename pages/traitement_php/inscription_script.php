<?php
    require("../../layout/php_scripts/connexion_bd.php");
        
            if(!($_POST['password1']==$_POST['password2'])){
                echo(" Dit a l'utilisateur que les mots de passe sont differents. avec un jolie design et tout mec");
                // ce code va le renvoyer vers la page de inscription.php
                header('Location: ../inscription.php?etatmdp=1');
            }else{
            //On verifie si les informations sont dans la base de donnee
            $query=$bdd->prepare('SELECT * FROM user WHERE email=?');
            $query->execute(array($_POST['email']));
            $Nom = (htmlspecialchars($_POST['nom']));
            $Prenom = (htmlspecialchars($_POST['prenom']));
            $Email = (htmlspecialchars($_POST['email']));
            $MotDePasse = (htmlspecialchars($_POST['password1']));
            $Genre = (htmlspecialchars($_POST['genre']));
            $tel= (htmlspecialchars($_POST['genre']));
            $Adresse= (htmlspecialchars($_POST['add']));
            //Si cest le cas
            if($query1=$query->fetch()){
                echo(" Dit a l'utilisateur qu'il existe deja et propose le de se connecter. avec un jolie design et tout mec");
                // ce code va le renvoyer vers la page de connexion.php
                header('Location: ../connexion.php?et=co&etatmdp=1');
            } 
            // Si cest pas le cas
            else{
                $Insert = $bdd->prepare("INSERT INTO user(nom, prenom, addresse, email, tel, motdepasse) VALUES(?,?,?,?,?,?)");
                $Insert->execute(array($Nom, $Prenom, $Adresse, $Email, $tel, $MotDePasse));
                echo(" Ajouter avec succes.");
                setcookie('login', $Nom.' '.$Prenom,time()+365*24*3600, '/');
                setcookie('motdepasse', htmlspecialchars($_POST['password1']),time()+365*24*3600,'/');
                setcookie('email', htmlspecialchars($_POST['email']),time()+365*24*3600,'/');

                $query=$bdd->prepare('SELECT roleu, id_ut  FROM user WHERE email=? AND motdepasse=?');
                $query->execute(array(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password1'])));
                if($query1=$query->fetch()){
                setcookie('id_client', $query1['id_ut'], time()+365*24*3600,'/');
                setcookie('roleu', $query1['roleu'],time()+365*24*3600,'/');
                }
                echo($_COOKIE['login']);
                //puis on le dirige vers index.php 
                // ce code va le renvoyer vers la page de index.php
                header('Location: '.$_COOKIE['pageurl']);
            }

        }
        
?>