<?php

$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../config.php';
include_once '../controllers/detailCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Détails du vinyle </h1>
                </div>
                <div class="col-sm-12 text-center">
                    <?php
                    foreach ($modelDetailList as $modelDetailListe) {
                        $iddisc = $modelDetailListe->disc_id;
                        if ($iddisc == $dicId) {
                            ?>
                            <div class="row">
                                <div class="detail col-lg-6 col-sm-12 col-md-12 text-center">
                                    <p class="deaills">Titre :</p>
                                    <p class="deaills"> <?= $modelDetailListe->disc_title ?></p>
                                    <p class="deaills">Année : </p>
                                    <p class="deaills"><?= $modelDetailListe->disc_year ?></p>
                                    <p class="deaills">Label : </p>
                                    <p class="deaills"><?= $modelDetailListe->disc_label ?></p>
                                </div>    
                                <div class="col-lg-3 col-sm-12 col-md-12 text-center">
                                <!--<p> <?= $modelDetailListe->disc_id ?></p>-->
                                    <p class="deaills">Genre :</p> 
                                    <p class="deaills"> <?= $modelDetailListe->disc_genre ?></p>
                                    <p class="deaills">Prix : </p>
                                    <p class="deaills"> <?= $modelDetailListe->disc_price ?></p>
                                    <p class="deaills">Artiste :</p>
                                    <p class="deaills"> <?= $modelDetailListe->artist_name ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="detail col-lg-6 col-sm-12 col-md-12 text-center">
                                    <p><img  class="img-fluid img-thumbnail imgIndex" src="../assets/img/<?= $modelDetailListe->disc_picture ?>" title="photo" alt="pictureVinyle"> </p>
                                    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) { ?>
                                        <p><a href="update_form.php?disc_id=<?= $iddisc ?>"><button class="btn btn-primary">Modifier</button></a>
                                            <a href="delete_form.php?disc_id=<?= $iddisc ?>"> <button class="btn btn-primary">Supprimer</button></a>  
                                            <?php
                                        }
                                        ?>
                                            <a href="home.php"><button class="btn btn-primary">Retour</button></a></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php
} else {
    require 'include/restrictedZone.php';
}
include 'include/footer.php';
?>
