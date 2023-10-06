<?php
    try{
        require("../../layout/php_scripts/connexion_bd.php");
        $query=$bdd->prepare('SELECT nom, roleu, prenom, id_ut  FROM user WHERE email=? AND motdepasse=?');
        $query->execute(array(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['password'])));
        if($query1=$query->fetch()){
            setcookie('login', $query1['nom'].' '.$query1['prenom'],time()+365*24*3600,'/');
            setcookie('roleu', $query1['roleu'],time()+365*24*3600,'/');
            setcookie('motdepasse', htmlspecialchars($_POST['password']),time()+365*24*3600,'/');
            setcookie('email', htmlspecialchars($_POST['login']),time()+365*24*3600,'/');
            setcookie('id_client', $query1['id_ut'], time()+365*24*3600,'/');
            echo($_COOKIE['login']);
            header('Location: '.$_COOKIE['pageurl']);
            // echo ($_SERVER['REQUEST_URI']);
        } 
        else{
            header('Location: ../connexion.php?etat=1&et=co');
        }
    }
    catch(Exception $e){
        header('Location: ../connexion.php?etat=2&et=co');
    }
?>