<?php

$userInterface = true;

$title = 'Accueil site sécurité';
$user = new userModel();
$formError = array();
$error = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
if (isset($_POST['registration'])) {
    //verification du pseudo
    if (!empty($_POST['surname'])) {
        if (preg_match($regexTitle, $_POST['surname'])) {
            $user->surname = htmlspecialchars($_POST['surname']);
        } else {
            $formError['surname'] = 'Veuiller ne mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['surname'] = 'Merci de remplir Votre Nom de Famille!!!';
    }
    if (!empty($_POST['firstname'])) {
        if (preg_match($regexTitle, $_POST['firstname'])) {
            $user->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = 'Veuiller ne mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['firstname'] = 'Merci de remplir Votre prénom';
    }
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $newUser = htmlspecialchars($_POST['email']);
            $user->email = $newUser;
        } else {
            $formError['email'] = ' Merci de mettre une adresse mail correcte';
        }
    } else {
        $formError['email'] = 'Veuillez remplir le champ mail.';
    }
    if (!empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['confirmPassword']) {
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $formError['password'] = 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['password'] = 'Merci de remplir les champs password';
    }
    $user->cle = md5(microtime(TRUE) * 100000);
//    var_dump($user);
    if (count($formError) == 0) {
        $testEmail = new userModel();
        $testEmail->email = htmlspecialchars($_POST['email']);
        $checkEmail = $testEmail->testEmail();
        //verification permetant de ce connecter directement apres l'insription 
        if ($checkEmail->countId < 1) {
            $checkAddUser = $user->addUser();
//            var_dump($checkAddUser);
            if ($checkAddUser == TRUE) {
                $addUserMessage = 'Vous êtes bien enregistré';
                $_POST['connexion'] = '';
                $_POST['loginemail'] = $user->email;
                $_POST['loginPassword'] = $_POST['password'];
            } else {
                $addUserMessage = 'Une erreur est survenue, veuillez contacter le webmaster via ffmc02@outlook.fr. Merci.';
            }
        } else {
            $addUserMessage = 'Un compte existe déjà avec le même Email.';
        }
    }
}
//--------------------------------------------------partie connexion --------------------------------
if (isset($_POST['connexion'])) {
    $users = new userModel();
    $idUser = new userModel();
    $formError = array();
    if (!empty($_POST['loginemail'])) {
        if (filter_var($_POST['loginemail'], FILTER_VALIDATE_EMAIL)) {
            $users->email = htmlspecialchars($_POST['loginemail']);
        } else {
            $formError['loginemail'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['loginemail'] = 'Veuillez remplir mail';
    }
    if (!empty($_POST['loginPassword'])) {

        $loginPassword = $_POST['loginPassword'];
    } else {
        $formError['loginPassword'] = 'Merci de remplir les champs password';
    }

    if (count($formError) == 0) {
        //je conte les messages d'erreurs 

        $verif = $users->connexionUser();
//        var_dump($verif);
//        die();
        if ($verif->count == 1) {
            //je verifier que l'utilisateur existe bien dans la base de donnée grace a son email  
            //
//          je verifie que le password entré par l'utilisateur et le meme que celui renseigner dans la base de donnée
            $password = $verif->password;
            $validPassword = password_verify($loginPassword, $password);
            if ($validPassword) {
                $_SESSION['idUser'] = $verif->idUser;
                $_SESSION['loginMail'] = $verif->loginMail;
                $_SESSION['surname'] = $verif->surname;
                $_SESSION['firstname'] = $verif->firstname;
                $_SESSION['connect'] = 'OK';
                $_SESSION['access'] = $verif->access;
                if (in_array($_SESSION['access'], $authAdmin)) {
                    header("Location: views/isy/indexadmin.php");
                } else {
                    header("Location: views/home.php");
                }
            }
        } else {
            $formError['userExist'] = 'Vous n\'êtes pas inscrit. Merci de vous inscrire.';

         
        }
    } else {
        $verif = 'Une erreur est survenue, veuillez contacter le web master par mail: ffmc02@outlook.fr';
    }
}
        
