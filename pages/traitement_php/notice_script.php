<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../../layout/php_scripts/PHPMailer/src/Exception.php';
    require '../../layout/php_scripts/PHPMailer/src/PHPMailer.php';
    require '../../layout/php_scripts/PHPMailer/src/SMTP.php';
    $message=htmlspecialchars($_POST['msg']);
    include('../../layout/php_scripts/connexion_bd.php');
    $query=$bdd->query('SELECT * FROM abonnee');
    try{
        while($reponse=$query->fetch()){
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
            $mail->addAddress($reponse['email'],$reponse['nom']);
            $mail->Subject="Notification de 223 Event";
            $mail->Body=$message;
            $mail->Object='Notification de 223 Event';
            //$mail->AltBody='Essaie 2';
            //$mail->AltBody="Ceci est votre mot de passe de confimation\n $code \nCode valide seulement pendant 2 jours. ne le partagez surtout pas";
            $mail->send();
            header('Location: ../../tache_routine/notice.php?etat=1&msg='.$message);
        }
    }
    catch(Exception $e){
        header('Location: ../../tache_routine/notice.php?etat=2&msg='.$message);
    }
?>