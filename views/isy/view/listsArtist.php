<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/artistModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../config.php';
include_once '../controllers/listerArtistCtlr.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Liste des artistes</h1>
                </div>
                    <div class="col-sm-12 text-center table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
                    <table class="table table-hover table-info">
                        <thead>
                            <tr>
                                <th scope="col">Nom de l'ariste</th>
                                <th scope="col">Modifier</th>
                                <?php if(in_array($_SESSION['access'], $admin)) {?>
                                <th scope="col"> Supprimer</th>
                                 <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($listerArtists as $artistList) {
                                ?>
                                <tr>  
                                    <td><?= $artistList->artist_name ?></td>
                                    <td> <a href="modifyArtist.php?artistId=<?= $artistList->artist_id ?>" title="modification d'un artiste"> <button type="button" class="btn btn-primary" >Modifier le nom de l'artiste</button></a></td>
                                    <?php if(in_array($_SESSION['access'], $admin)) {?>
                                    <td> <a href="deleteArtist.php?artistId=<?= $artistList->artist_id ?>" title="Suprimer un artist "> <button type="button" class="btn btn-primary" >Supprimer l'utilisateur</button></a></td>
                                <?php } ?>
                                </tr>   
                            <?php } ?>

                        </tbody> 
                    </table>
                    <a href="addArtist.php" title="Ajouter un artiste"> <button type="button" class="btn btn-primary" > Ajouter un artiste </button></a>
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
