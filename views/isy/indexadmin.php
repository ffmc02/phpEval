<?php
$userInterface=false;
$interfaceAdministrator='';
include_once '../../model/dataBase.php';
include_once '../../model/discModel.php';
include_once '../../model/artistModel.php';
include_once '../../model/userModel.php';
include_once '../../config.php';
include_once 'controllers/indexAdminCtrl.php';
include_once '../include/header.php';
include_once '../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Interface Administrateur.</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <a href="view/usersList.php" title="retour"> <button  id="buttonUser"type="button" class="btn btn-primary" >Liste utilisateur</button></a>
                    <a href="../home.php" title="Liste des Vynile"> <button  id="buttonUser"type="button" class="btn btn-danger" >Liste des vyniles </button></a>
                    <a href="../add_form.php" title="ajouter un vilyle"> <button  id="buttonUser"type="button" class="btn btn-warning" >Ajouter un vyniles </button></a>
                    <a href="../codeDetails.php" title="présentation d'une partie du code"> <button  id="buttonUser"type="button" class="btn btn-success bg-gradient-success" >Details du code </button></a>
                    <a href="../contactForm.php" title="Formulaire de contacte"> <button  id="buttonUser"type="button" class="btn btn-white bg-dark text-white" >Fomulaire de contact </button></a>
                    <a href="view/addArtist.php" title="Ajouté un artiste"> <button  id="buttonUser"type="button" class="btn btn-warning" >Ajouter un artiste</button></a>
                    <a href="view/listsArtist.php" title="liste des artiste"> <button  id="buttonUser"type="button" class="btn btn-danger" >Liste des artistes</button></a>
                </div>

            </div>
        </div>
    </main>
    <?php
} else {
    require '../include/restrictedZone.php';
}
include '../include/footer.php';
?>
