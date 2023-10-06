<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("../../layout/php_scripts/connexion_bd.php");
if(!isset($_POST['code']) && !isset($_POST['code1']) && !isset($_POST['mdpfinal'])){
    
    try{
        //On verifie si les informations sont dans la base de donnee
        $query=$bdd->prepare('SELECT * FROM user WHERE email=?');
        $query->execute(array(htmlspecialchars($_POST['email'])));
        $Email = htmlspecialchars(($_POST['email']));
        //Si cest le cas
        if($query1=$query->fetch()){
            $code=rand(100000,999999);    
            require '../../layout/php_scripts/PHPMailer/src/Exception.php';
            require '../../layout/php_scripts/PHPMailer/src/PHPMailer.php';
            require '../../layout/php_scripts/PHPMailer/src/SMTP.php';
            $mail= new PHPMailer(true);
            $mail->SMTPDebug=SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->SMTPOptions=Array('ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false,'allow_self_signed'=>true));
            $mail->Username='223event@gmail.com';
            $mail->Password='YB1AM2MD3KS4';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port=587;
            $mail->setFrom('223event@gmail.com','Team 223 Event');
            $mail->addReplyTo('223event@gmail.com','Team 223 Event');
            $mail->WordWrap   = 50;
            $mail->isHTML(true);
            $mail->addAddress($Email,$query1['nom']);
            $mail->Subject='Code de confirmation';
            $mail->Body="<h2>Ceci est votre mot de passe de confimation</h2> </br> <h1> $code </h1>. </br> <h4 style=\"color:red;\">Code valide seulement pendant 2 jours. ne le partagez surtout pas</h4>";
            $mail->Object='Code de confirmation';
            //$mail->AltBody='Essaie 2';
            $mail->AltBody="Ceci est votre mot de passe de confimation\n $code \nCode valide seulement pendant 2 jours. ne le partagez surtout pas";
            if($mail->send()){ 
                $mail->smtpClose();
?>
                <form action="mot_de_passe_oublier_script.php" name="form1" method="post">
                    <input type="hidden" name="code" value="<?php echo($code) ?>">
                    <input type="hidden" name="email" value="<?php echo($Email) ?>">         
                    <button type="submit" name="btn_form1"></button>
                </form>
                <script>
                    document.form1.submit('');
                </script>
<?php
            }
        } 
        else{
            echo(" Dit a l'utilisateur qu'il existe deja et propose le de se connecter. avec un jolie design et tout mec");
            // ce code va le renvoyer vers la page de connexion.php
            header('Location: ../mot_de_passe_oublie.php?etatmdp=1');
        }
    }
    catch(Exception $e){
        header('Location: ../connexion.php?etatmdp=2');
    }
}
elseif (isset($_POST['code'])){
?>
    <form action="mot_de_passe_oublier_script.php" method="post">
        <h1>Veuillez saisir le code envoyer a l'email <?php echo(htmlspecialchars($_POST['email'])) ?> </h1>
        <h3>N'hesitez pas a verifier dans vos spam</h3>
        <input type="text" name="code1" autofocus>
        <input type="hidden" name="code2" value="<?php echo(htmlspecialchars($_POST['code'])) ?>">
        <input type="hidden" name="email" value="<?php echo(htmlspecialchars($_POST['email'])) ?>"> 
        <button type="submit" name="btn_form2">Valider</button>
    </form>
<?php
}
elseif (isset($_POST['code1'])){
    if($_POST['code1']==$_POST['code2']){
?>
        <form action="mot_de_passe_oublier_script.php" method="post">
            <h1>Veuillez saisir votre nouveau mot de passe</h1>
            <input type="text" name="mdpfinal" autofocus>
            <input type="hidden" name="email" value="<?php echo(htmlspecialchars($_POST['email'])) ?>"> 
            <button type="submit" name="btn_form2">Valider</button>
        </form>
<?php
    }
    else{ 
        /*echo ("<h1>Le code que vous avez saisie est erronne. Pour des raisons de securite, nous allons vous rediriger vers la page de connexion. La securite de nos client reste notre plus grande preocupation. Si ce compte vous appartient reelement, veuiller ressayer la procedure</h1>");
        ?>
        <h1><a href="../connexion.php">Veuillez cliquer ici</a></h1>
        <?php*/ ?>
        <form action="mot_de_passe_oublier_script.php" method="post">
            <h1>Code errone. Veuillez saisir le code envoyer a l'email <?php echo($_POST['email']) ?> </h1>
            <h3>N'hesitez pas a verifier dans vos spam</h3>
            <input type="text" name="code1" autofocus>
            <input type="hidden" name="code2" value="<?php echo(htmlspecialchars($_POST['code2'])) ?>">
            <input type="hidden" name="email" value="<?php echo(htmlspecialchars($_POST['email'])) ?>"> 
            <button type="submit" name="btn_form2">Valider</button>
        </form>
<?php
    }
}
elseif (isset($_POST['mdpfinal'])){
    $update = $bdd->prepare("UPDATE user SET `motdepasse`=? WHERE email=?;");
    $update->execute(array(htmlspecialchars($_POST['mdpfinal']), htmlspecialchars($_POST['email'])));
    echo(" modifier avec succes.");
    $select = $bdd->prepare("SELECT * FROM user WHERE email=?;");
    $select->execute(array(htmlspecialchars($_POST['email'])));
    $query=$select->fetch();
    setcookie('login', $query['nom'].' '.$query['prenom'],time()+365*24*3600,'/');
    setcookie('motdepasse', $query['motdepasse'],time()+365*24*3600,'/');
    header('Location: '.$_COOKIE['pageurl']);
}
?>
