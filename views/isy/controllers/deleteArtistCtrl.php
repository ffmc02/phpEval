<?php

$title = 'Supprimer un artiste';
//j'instentie  la classe artist pour la liste et pour modifier le nom de l'artiste
$listArtist = new artist();
$listerArtists = $listArtist->readArtists();
$deleteArtist = new artist();
//je créer mes regex
$regexId = '/^\d+$/';
//je créer mon tableau d'erreur
$formError = array();
// je vérifie qu'il y est bien un 
if (isset($_GET['artistId'])) {
    if (preg_match($regexId, $_GET['artistId'])) {
        $idArtist = htmlspecialchars($_GET['artistId']);
    }
}
if (isset($_POST['deleteArtist'])) {
    if (isset($_GET['artistId'])) {
        if (preg_match($regexId, $_GET['artistId'])) {
           $deleteArtist->artist_id = htmlspecialchars($_GET['artistId']);
           
        } else {
            $formError['idArtist']='Merci de selection un artiste qui existe';
        }
    }
      if (count($formError) == 0) {
          $verifDeleteArtist=$deleteArtist->deleteAritst();
        
    }
     if ($verifDeleteArtist == true) {
        header("Location: listsArtist.php");
    }
}