<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../config.php';
include_once '../controllers/userListCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>pageVierge</h1>
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
