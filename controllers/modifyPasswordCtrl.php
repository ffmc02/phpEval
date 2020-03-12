<?php

$title = 'Formulaire mot de passe oublier';
$modifyPasswordUsers = new userModel();
$formError = array();
if (isset($_POST['modifyPassword'])) {
    if (!empty($_POST['email'])) {


        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $loginEmailUser = htmlspecialchars($_POST['email']);
            $modifyPasswordUsers->email = $loginEmailUser;
            $verifyUserExistbyEmail = new userModel();
            $verifyUserExistbyEmail->email = htmlspecialchars($_POST['email']);
            $verifyUserExistbyEmail->cle = $_POST['cle'];
            //je verifie que la clé et le mail corresponde bien 

            if ($verifyUserExistbyEmail->verifEmailAndCle()) {
                
            } else {
                $formError['email'] = 'Veuillez remplir le champ mail.';
            }
            if (!empty($_POST['newPassword'])) {
                if ($_POST['newPassword'] == $_POST['confirmPassword']) {
                    $modifyPasswordUsers->password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
                } else {
                    $formError['password'] = 'les mots de passe ne sont pas identiques.';
                }
            } else {
                $formError['password'] = 'Merci de remplir les champs password';
            }

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
            $cle2 = $test1 . $time . $test;
            $modifyPasswordUsers->cle = $cle2;
            $userCle = $_GET['cle'];
            $timestamp = substr($userCle, 40, -50);
            $delai = $timestamp += 7 * 60 * 60;
            if ($delai >= time()) {


                if ($modifyPasswordUsers->modifyPassword()) {
                   header("Location: ../index.php#connexion");
                } else {
                    $formError['echec'] = 'Votre mot de passe n\'est pas changé, veuillez réessayer ou contacter le web master par mail via <a href="contactForm.php">la page contact </a> ou par mail'
                        . 'gaetan.jonard.dev@outlook.fr';
                }
            } else {
                $formError['echec'] = 'Le delais pour refaire votre mots de passe est dépassé merci!';
            }
        }
    } else {
        $formError['email'] = ' Merci de mettre une adresse mail correcte';
    }
}
