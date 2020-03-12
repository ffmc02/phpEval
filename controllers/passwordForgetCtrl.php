<?php

$title = 'Mot de passe oublié';
$verifyUserExist = new userModel();
$formError = array();

$checkMail = new userModel();
$checEmailExist = $checkMail->mailExist();
ini_set('display_errors', 'on');
error_reporting(E_ALL);

if (isset($_POST['passwordForget'])) {
    if (!empty($_POST['surname'])) {
        if (strlen($_POST['surname']) <= 50) {
            $pseudoUser = $verifyUserExist->surname = htmlspecialchars($_POST['surname']);
        } else {
            $formError['surname'] = 'Votre pseudo ne doit pas dépasser 50 caractères.';
        }
    } else {
        $formError['surname'] = 'Merci de remplir le champ nom de famille';
    }
    //verification de l'adresse mail!
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $mailUser = htmlspecialchars($_POST['email']);
            $verifyUserExist->email = $mailUser;
        } else {
            $formError['email'] = ' Merci de mettre une adresse mail correcte';
        }
    } else {
        $formError['email'] = 'Veuillez remplir le champ mail.';
    }
    if (count($formError) == 0) {
        //je teste si le mail existe dans la base de donnée  et le pseudo 
        $verif = $verifyUserExist->testEmail();
        if ($verif->countId == 1) {

            //création d'une chaine de caractére avec timestamp pour maill de validation 
            function generateRandomString($length = 40) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            $test1 = generateRandomString();
            $test = generateRandomString(50);
            $time = time();
            $cle = $test1 . $time . $test;

            $subject = 'Nouveau mot de passe pour l\'évaluation PHP';
            $messageMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>
                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
                <head><meta charset="utf8" />
                <title>Mot de passe oublié</title>
                </head>
     <body>
       <center><p><strong>Bonjour ' . $verif->surname . '</strong></p><center>
           <p> Pour récupérer votre mot de passe il vous suffit de cliquer sur le lien suivant : </p>
     <a href="http://localhost/phpEvaluation/views/modifyPassword.php?cle=' . $cle . '">cliquez ICI</a>
</body>
     </html>';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-859-1';
            $headers[] = 'Reply-To:ffmc02@outook.fr';
            $headers[] = 'From: FFMC02 <ffmc02@outook.fr>';

            if (mail($mailUser, $subject, $messageMail, implode("\r\n", $headers))) {
                $modifyCle = new userModel();
                $modifyCle->cle = $cle;
                $modifyCle->email = $mailUser;
                $cleModify = $modifyCle->modifyCle();
                $messagesucces = 'Un mail vient de vous être envoyé, vous avez juste à cliquer sur le lien , pour pouvoir accéder au formulaire pour enregistrer un nouveau mot de passe';
            } else {
                $messageError = 'Une erreur technique est survenue, veuillez contacter l\'administrateur du site via la page de <a href="../view/contactus.php">contact</a>';
            }
        } else {
            $messageNotExiste = 'Vous n\'avez pas de compte merci de vous inscrire';
        }
    }
}


