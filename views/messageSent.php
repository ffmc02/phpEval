<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../config.php';
include_once '../controllers/messageSentCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Voici votre message envoyé</h1>
                </div>
                <div class="col-sm-12 text-center">
                    <h2>Récupération des valeurs de l'input en POST grace à un formulaire</h2>
                    <p>Votre message envoyé est le suivant</p>
                    <p>Votre nom : <?= $surname ?></p>
                    <p>  Votre prénom <?= $firstname ?>,</p>
                    <p>   votre Email <?= $email ?></p>
                    <p>Le Sujet de votre message est : <?= $objet ?> </p>
                    <p>Votre message est: <?= $message ?></p>
                </div>
                <div class="col-sm-12 text-center">
                    <a href="home.php" title="retour"> <button type="button" class="btn btn-primary" >Retour</button></a>
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