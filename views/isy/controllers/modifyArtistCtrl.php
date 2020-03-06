<?php

$title = 'Modifier un artiste';
//j'instentie  la classe artist pour la liste et pour modifier le nom de l'artiste
$listArtist = new artist();
$listerArtists = $listArtist->readArtists();
$modifArtist = new artist();
//définition des regex
$regexId = '/^\d+$/';
//je créer mon tableau d'erreur
$formError = array();
if (isset($_GET['artistId'])) {
    if (preg_match($regexId, $_GET['artistId'])) {
        $idArtist = htmlspecialchars($_GET['artistId']);
    }
}
if (isset($_POST['modifyArtist'])) {
    if (!empty($_POST['artistName'])) {
        $modifArtist->artist_name = htmlspecialchars($_POST['artistName']);
    } else {
        $formError['artistName'] = 'Merci de remplir le nom de l\'artiste!!';
    }
    if (isset($_GET['artistId'])) {
        if (preg_match($regexId, $_GET['artistId'])) {
            $modifArtist->artist_id = htmlspecialchars($_GET['artistId']);
        }
    }
    if (count($formError) == 0) {
        $verfiModiyArtist = $modifArtist->modifyArtist();
    }
    if ($verfiModiyArtist == true) {
        header("Location: listsArtist.php");
    }
}

