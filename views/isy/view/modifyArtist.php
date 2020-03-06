<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../model/artistModel.php';
include_once '../../../config.php';
include_once '../controllers/modifyArtistCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Modifier un Artist</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <?php
                    foreach ($listerArtists AS $ModifyArtist) {
                        $artistId = $ModifyArtist->artist_id;
                        if ($artistId == $idArtist) {
                            ?>
                            <p>Vous souhaitez modifier le nom de l'artiste <?= $ModifyArtist->artist_name ?></p>
                        <?php
                        }
                    }
                    ?>
                    <form method="post" name="modifyArtist" id="modifyArtist">
                        <div class="col-sm-12 text-center">
                            <label for="artistName">Nom de l'artiste</label>
                            <input type="text" name="artistName" id="artistName" placeholder="Nom de l'artiste" value=""/>
                            <span id="ErrorArtistName" class="text-danger text-center"></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-primary" type="submit" name="modifyArtist" title="Modifier un artiste" value="Modfifier un artiste" />
                        </div>
                    </form>
                    <a href="../indexadmin.php" title="retour"> <button type="button" class="btn btn-primary" > retrour </button></a>
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
