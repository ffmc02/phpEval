<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../model/artistModel.php';
include_once '../../../config.php';
include_once '../controllers/addArtistCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Ajuter un Artist</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <form method="post" name="addArtist" id="addArtist">
                        <div class="col-sm-12 text-center">
                            <label for="artistName">Nom de l'artiste</label>
                            <input type="text" name="artistName" id="artistName" placeholder="Nom de l'artiste" />
                            <span id="ErrorArtistName" class="text-danger text-center"></span>
                        </div>
                         <div class="col-sm-12 text-center">
                             <input class="btn btn-primary" type="submit" name="add" title="ajouter un artiste" value="Ajouter un artiste" />
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
