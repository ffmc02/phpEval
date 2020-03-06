<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../model/userModel.php';
include_once '../model/groupeusers.php';
include_once '../config.php';
include_once '../controllers/homeCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
?>
<?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Bonjour <?= $_SESSION['firstname'] . " " . $_SESSION['surname'] ?></p>
            </div>
            <div class="col-sm-12 col-md-12 text-center">
                <h1>Liste des vinyles disponibles</h1>
            </div>

            <div class="col-sm-12 text-center">
                <div class="row">  

                    <?php
                    foreach ($listReadDisc AS $listerDisc) {
                        ?>

                        <div class="col-lg-3 col text-center"> 

                            <p><img class="img-fluid img-thumbnail imgIndex"  src="../assets/img/<?= $listerDisc->disc_picture ?>"></p>
                        </div> 
                        <div class="col-lg-3 col-md-12 text-center">
                            <p class="deaills"><stong>titre: <?= $listerDisc->disc_title ?></stong></p>
                            <p class="deaills">Année de sortie: <?= $listerDisc->disc_year ?></p>
                            <p class="deaills">Label: <?= $listerDisc->disc_label ?></p>
                            <p class="deaills">Genre: <?= $listerDisc->disc_genre ?></p>
                            <p class="deaills">Artiste: <?= $listerDisc->artist_name ?></p>
                            <a href="details.php?id=<?= $listerDisc->disc_id ?>"><button type="button" class="btn btn-primary">Détails</button></a> 
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>  
        </div>
    </div>
    <?php
} else {
    require 'include/restrictedZone.php';
}
include 'include/footer.php';
?>