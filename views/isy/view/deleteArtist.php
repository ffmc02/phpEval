<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../model/artistModel.php';
include_once '../../../config.php';
include_once '../controllers/deleteArtistCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Suprimer un artiste</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <?php
                    foreach ($listerArtists AS $ModifyArtist) {
                        $artistId = $ModifyArtist->artist_id;
                        if ($artistId == $idArtist) {
                            ?>
                            <p>Vous souhaitez Suprimer le nom de l'artiste <?= $ModifyArtist->artist_name ?></p>
                            <p class="text-danger text-center">Attention cette suppréssion est irréversible une fois validé</p>
                        <?php
                        }
                    }
                    ?>
                    <form method="post" name="deleteArtist" id="modifyArtist">
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-danger" type="submit" name="deleteArtist" title="Suprimer  un artiste" value="Supprimer un artiste" /><a href="../indexadmin.php" title="retour"> <button type="button" class="btn btn-primary" > retrour </button></a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </main>
    <?php
} else {
    require '../../include/restrictedZone.php';
}
include '../../include/footer.php';
?>
