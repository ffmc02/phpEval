<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/discModel.php';
include_once '../../../model/artistModel.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../config.php';
include_once '../controllers/deleteUserCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>  
<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Supression d'un utilisateur</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <?php
                    foreach ($userList AS $readUser) {
                        $userId = $readUser->idUser;
                        if ($userId == $UsersId) {
                            ?>
                    <p>Vous êtes sur le point de  suprimer le profil de <?= $readUser->nom?>, <?= $readUser->prenom?> de la base de données</p>
                    <form method="post" name="deleteUser" id="deleteUser">
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-danger " type="submit" name="deleteUser" value="suprimer le profil" /><a href="usersList.php" title="retour"> <button type="button" class="btn btn-primary" > retrour Liste utilisateur</button></a>
                        </div>
                    </form>
                        <?php }
                    }
                    ?>

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
