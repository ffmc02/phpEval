<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../config.php';
include_once '../controllers/delete_formCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK'&& in_array($_SESSION['access'], $authAdmin)) {
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Supprimer le vinyle </h1>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <?php
                            foreach ($modelDetailList as $modelDetailListe) {
                                $iddisc = $modelDetailListe->disc_id;
                                if ($iddisc == $dicsId) {
                                    ?>
                                    <p> Etes-vous sûr de vouloir supprimer le vinyle <?= $modelDetailListe->disc_title ?>?</p>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                                    <p class="deaills"> <?= $modelDetailListe->disc_title ?></p>
                                    <p class="deaills">Année : </p>
                                    <p class="deaills"><?= $modelDetailListe->disc_year ?></p>
                                    <p class="deaills">Label : </p>
                                    <p class="deaills"><?= $modelDetailListe->disc_label ?></p>
                                </div>    
                                <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                                <!--<p> <?= $modelDetailListe->disc_id ?></p>-->
                                    <p class="deaills">Genre :</p> 
                                    <p class="deaills"> <?= $modelDetailListe->disc_genre ?></p>
                                    <p class="deaills">Prix : </p>
                                    <p class="deaills"> <?= $modelDetailListe->disc_price ?></p>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                                    <p class="deaills">Artiste :</p>
                                    <p class="deaills"> <?= $modelDetailListe->artist_name ?></p>
                                    <p><img class="img-fluid img-thumbnail imgIndex" src="../assets/img/<?= $modelDetailListe->disc_picture ?>" title="photo" alt="pictureVinyle"> </p>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                                    <form method="post" name="deleteDiscForm">
                                        <input type="hidden" value="<?= $modelDetailListe->disc_id ?>" name="id">
                                        <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) { ?>
                                        <input class="btn btn-danger " type="submit" value="Suprimer" name="submit"><a href="home.php" title="retour"><button type="button" class="btn btn-primary" >Retour</button></a>
                                    <p class="text-danger">Si vous supprimeez ce vinyle cette acttion est définitif</p> 
                                        <?php } else {
                                            ?>
                                            <a href="home.php" title="retour"><button type="button" class="btn btn-primary" >Retour</button></a>
                                        <?php }
                                        ?>
                                    </form>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
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
