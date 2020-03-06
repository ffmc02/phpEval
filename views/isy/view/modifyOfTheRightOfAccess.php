<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/discModel.php';
include_once '../../../model/artistModel.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../config.php';
include_once '../controllers/modifyOfTheRightOfAccessCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>  
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Modifier le droit d'accées </h1>
                </div>
                <?php
                foreach ($userLister AS $list) {
                    $id = $list->idUser;
                    if ($UsersId == $id) {
                        ?>
                        <div class="col-sm-12 col-lg-12 text-center">
                            <p>Voulez vous modifier le droit d'accées de <?= $list->nom ?></p>
                            <p>Il a actullement le droit de <?= $list->groupeType ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="col-sm-12 text-center">
                    <form method="post" name="modifyAccess" id="modifyAccess">
                        <div class="col-sm-12 col-lg-12 text-center">
                            <label for="access"></label>
                            <select class="form-control text-center" id="groupsUser" name="groupsUser">

                                <option value="0" selected hidden>Sélectionner l'option</option>
                                <?php foreach ($readGroups AS $groups) { ?>
                                    <option value="<?= $groups->id ?>"><?= $groups->groupeType ?></option>
                                    <?php
                                }
                                ?> 
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center">
                            <input class="btn btn-warning " type="submit" name="Modify" id="accessModify" value="Modifier l'accées" /> <a href="usersList.php" title="retour"> <button type="button" class="btn btn-primary" > retrout Liste utilisateur</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 text-center">
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
