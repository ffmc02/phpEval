<?php

$title = 'retirer un utilisateur';
$listerUser = new userModel();
$userList = $listerUser->userList();
$regexId = '/^\d+$/';
// initialisation d'un tableau d'erreur
$deleteUser = new userModel();
$formError = array();
if (isset($_GET['idUser'])) {
    $UsersId = htmlspecialchars($_GET['idUser']);
}

if (isset($_POST['deleteUser'])) {

    if (isset($_GET['idUser'])) {
        if (preg_match($regexId, $_GET['idUser'])) {
            $deleteUser->idUsers = htmlspecialchars($_GET['idUser']);
        } else {
            $formError['idUser'] = 'Merci de selectionner un utilisateur existant';
        }
    }
    if (count($formError) == 0) {
        $deleteUserOK = $deleteUser->deleteUser();
    }
    if ($deleteUserOK == true) {
        header("Location: usersList.php");
    }
}
