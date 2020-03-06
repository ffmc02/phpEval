<?php

$title = 'modification du droit d\'accées';
//j'instencie la classe userModel
$listerUser = new userModel();
$userLister = $listerUser->userList();
$listGroups = new groupeusers();
$readGroups = $listGroups->groupeType();
$regexId = '/^\d+$/';
// initialisation d'un tableau d'erreur
$formError = array();
$modifyAccessUser = new userModel();
//recupÃ©ration des donnÃ©es du formulaire
if (isset($_GET['idUser'])) {
    $UsersId = htmlspecialchars($_GET['idUser']);
}
if (isset($_POST['Modify'])) {
    if (!empty($_GET['idUser'])) {
        if (preg_match($regexId, $_GET['idUser'])) {
            $modifyAccessUser->idUsers = htmlspecialchars($_GET['idUser']);
        }
    }
    if (!empty($_POST['groupsUser'])) {
        if (preg_match($regexId, $_POST['groupsUser'])) {
            $modifyAccessUser->goupeUsers= htmlspecialchars($_POST['groupsUser']);
        }
    } else {
        $formError['groupUser'] = 'Vous avez oublié de selectionner le nouveau droit d\'accées';
    }
    if (count($formError) == 0) {
        $modifyGroups=$modifyAccessUser->modifyAccess();
    }
   
    if($modifyGroups==true){
         header("Location: usersList.php");
    }
}

