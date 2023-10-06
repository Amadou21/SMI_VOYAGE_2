<?php
    try{
        $bd_url="localhost";
        $bd_name="pfe";
        $bd_login="root";
        $bd_pass="";
        $bdd=new PDO('mysql:host='.$bd_url.';dbname='.$bd_name,$bd_login,$bd_pass);
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }

?> 
