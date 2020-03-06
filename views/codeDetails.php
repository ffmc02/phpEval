<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../model/userModel.php';
include_once '../model/groupeusers.php';
include_once '../config.php';
include_once '../controllers/codeDetailsCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>
<a href=""></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Ma structure en MVC</h1>
            </div>  
            <div class="col-sm-12 text-center">
                <img class="img-fluid img-thumbnail"  src="../assets/img/mvc.PNG" alt="ImageMVC" title="ImageMVC"/> 
            </div>
            <div class="col-sm-12 text-center">
                <h2>Upload de fichier </h2>
            </div>
            <div class="col-sm-12 text-center">
                <img  class="img-fluid img-thumbnail" src="../assets/img/uplode.PNG" alt=""/>
            </div>
            <div class="col-sm-12 text-center">
                <h2>Vérification des données côté client</h2>
            </div>
            <div class="col-sm-12 text-center">
                <img class="img-fluid img-thumbnail"  src="../assets/img/initialisation_variable_clients.PNG" alt="initialisation Variable" title="initialisation des variables"/>
            </div>
            <div class="col-sm-12 text-center">
                <img class="img-fluid img-thumbnail" src="../assets/img/verif_form_add.PNG" alt="condition pour vérifier les données coté cliens" title="condition pour vérifier les données coté cliens"/>
            </div>
            <div class="col-sm-12 text-center">
                <img  class="img-fluid img-thumbnail"  src="../assets/img/blocage_evoi_form.PNG" alt="blocage de formulaire" title="blocage formulaire"/>
            </div>
        </div>
    </div>
    <?php
} else {
    require 'include/restrictedZone.php';
}
include 'include/footer.php';
?>