<?php
$userInterface=true;
$title = 'formulaire d\'ajout de vinyle';
//on vas chercher les donnÃ©es de la table artist et de la colonne name artiste grace a la methode readArtist
$listArtist = new artist();
$listerArtists = $listArtist->readArtists();
// on vas chercher la mÃ©thode d'ajout de disc grace a la methode addDisc
$addDisc = new discModel();
//dÃ©fintion des regex
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$regexYears = '/^(\d{4})$/';
$regexPrice = '/^(\d{1,6})[.,](\d{0,2})$/';
$regexId = '/^\d+$/';
// initialisation d'un tableau d'erreur
$formError = array();
//recupÃ©ration des donnÃ©es du formulaire
if (isset($_POST['submit'])) {
    if (!empty($_POST['title'])) {
        if (preg_match($regexTitle, $_POST['title'])) {
            //on mes les donnÃ© du champs title dans la variable qui appel la classe discModel et la mÃ©thode addDisc
            $addDisc->disc_title = htmlspecialchars($_POST['title']);
        } else {
            //erreur ne rentre pas dans la regex 
            $formError['title'] = 'Merci de ne mettre que des caractères alphabétiques!!!!!';
        }
    } else {
        //erreur champs vide title OK 
        $formError['title'] = 'Merci de remplir le titre du vinyle';
    }
    if (!empty($_POST['artist'])) {
        if (preg_match($regexId, $_POST['artist'])) {
            $addDisc->artist_id = htmlspecialchars($_POST['artist']);
        } else {
            //erreur ne rentre pas dans la regex ID OK  
            $formError['artist'] = 'Merci de sélectionner le nom de l\'artiste dans la liste';
        }
    } else {
//        erreur champs vide
        $formError['artist'] = 'Oups vous avez oublié de sélectionner un artiste.';
    }
    if (!empty($_POST['year'])) {
        if (preg_match($regexYears, $_POST['year'])) {
            if ($_POST['year'] >= 1950 && $_POST['year'] <= 2020) {
                $addDisc->disc_year = htmlspecialchars($_POST['year']);
            } else {
                //erreur dans les dates (non compris entre 1960 et 2020 OK
                $formError['year'] = 'Merci de rentrer une date entre 1960 et 2020';
            }
        } else {
            //erruer dans la regex
            $formError['year'] = 'Merci de mettre une date ex: 1960 ';
        }
    } else {
        //errreur de champs vide
        $formError['year'] = 'Merci de remplir le champ YEAR';
    }
    if (!empty($_POST['Genre'])) {
        if (preg_match($regexTitle, $_POST['Genre'])) {
            $addDisc->disc_genre = htmlspecialchars($_POST['Genre']);
        } else {
            //erreur ne rentre pas dans la regex
            $formError['genre'] = 'Merci de ne mettre que des caractères Alphabétiques!! ';
        }
    } else {
        //erreur si vide    
        $formError['genre'] = 'Merci de remplir le champ Genre';
    }
    if (!empty($_POST['Label'])) {
        if (preg_match($regexTitle, $_POST['Label'])) {
            $addDisc->disc_label = htmlspecialchars($_POST['Label']);
        } else {
            // erreur  regex  
            $formError['label'] = 'Merci de ne mettre que des caractères Alphabétiques!! !';
        }
    } else {
        //erreur champs vide 
        $formError['label'] = 'Merci de remplir le champ label!!!!!';
    }
    if (!empty($_POST['price'])) {
        if (preg_match($regexPrice, $_POST['price'])) {
            $addDisc->disc_price = htmlspecialchars($_POST['price']);
        } else {
            //erreur de regex
            $formError['price '] = 'Merci de ne mettre que des prix de cette façon: 1.2, 22 258.23, 2525, 55888, 222222, 225.2 ';
        }
    } else {
        //erreur champs vide  
        $formError['price'] = 'Merci de remplir le champ PRICE';
    }
    if (!empty($_FILES['picture']['name'])) {
        //je vérifie que l'input picture n'est pas vide 
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        //je recupéres l'extencion de mon  fichier 
        $picture = $_FILES['picture']['name'];
        //je met le nom de mon fichier dans une variable
        $folder = '../assets/img/';
        //je définie le chemin pour uplode mon fichier dans une variable
        if (strtolower($ext) != 'jpg' || strtolower($ext) != 'png' || strtolower($ext) != 'jpeg') {
            // je vérifie que l'extinction de mon fichier est autorisé
            $tmp_name = $_FILES['picture']['tmp_name'];
            //je met mon fichier dans un dossier temporaire 
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $folder . $picture)) {
                //je fait la  migration de mon fichier temporraire vers le dossier envoyer 
                //Si la fonction renvoie TRUE, c'est que Ã§a a fonctionnÃ©...
                $addDisc->disc_picture = htmlspecialchars($picture);
            } else {

                //erreur de migration 
                $formError['pictrue'] = 'Une erreur interne s\'est produite, envoyez un mail au web master!';
            }
        } else {
            //erreur d'extenction    
            $formError['pictrue'] = 'Merci de ne mettre que des fichiers de type: jpg, png, jpeg!!!!!';
        }
    } else {
        //erreur champs vide 
        $formError['pictrue'] = 'Merci de télécharger un fichier photo!';
    }
    if (count($formError) == 0) {
        $addDiscsUser = $addDisc->addDisc();
        if ($addDiscsUser == true) {
//            var_dump($addDiscsUser);
            $messageSuccess = 'Votre vinyle est bien enregistré';
                    header("Location: home.php");
        }
    }
//      
}

    

    