<?php
$userInterface=true;

$detail = new discModel();
$modelDetailList = $detail->readDiscs();
//je vérifier que get disc_id existe
if (isset($_GET['disc_id'])) {

    $dicsId = htmlspecialchars($_GET['disc_id']);
}
$deleteDisc = new discModel();
$title = 'Supression d\'un vinyle';
$regexId = '/^\d+$/';
$formError = array();
if (isset($_POST['submit'])) {

    $deleteDisc->disc_id = $dicsId;
    if (isset($_GET['disc_id'])) {
        if (!empty($_GET['disc_id'])) {
            if (preg_match($regexId, $_GET['disc_id'])) {
                $deleteDisc->disc_id = htmlspecialchars($_GET['disc_id']);
            } else {
//            ne rentre pas dans la regex 
                $formError['disc_id'] = 'veuillez choisir un vinyle existant dans la page d\'accueil!!!!!!';
            }
        } else {
            //si get disc_id n'est pas vide 
            $formError['disc_id'] = 'veuillez choisir un vinyle existant dans la page d\'accueil!!!!!!';
        }
    } else {
        //erreur de non existance
        $formError['disc_id'] = 'veuillez choisir un vinyle existant dans la page d\'accueil!!!!!!';
    }var_dump($deleteDisc);
    if (count($formError) == 0) {
        $deleteDiscUser = $deleteDisc->deleteDisc();
        if ($deleteDiscUser == true) {
            var_dump($deleteDiscUser);
            $messageSuccess = 'Votre vinyle est bien Supprimé';
            header("Location: home.php");
        }
    }
} 
    


