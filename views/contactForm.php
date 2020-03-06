<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../model/userModel.php';
include_once '../model/groupeusers.php';
include_once '../config.php';
include_once '../controllers/contactFormCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Formulaire de conctat </h1>
                </div>
                <div class="col-sm-12 text-center">
                    <form method="post" name="contactForm" id="contactForm">
                        <div class="col-sm-12 text-center">
                            <label for="surname" >Votre nom de famille: </label>
                            <input type="text" name="surname" id="surname" />
                            <span class="text-center text-danger" id="errorSurname"><?= isset($formError['surname']) ? $formError['surname'] : '' ?></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <label for="firstname" >Votre prénom: </label>
                            <input type="text" name="firstname" id="firstname" />
                            <span class="text-center text-danger" id="errorFirstname" ><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <label for="emailContact" >Votre Mail: </label>
                            <input type="email" name="emailContact" id="emailContact" />
                            <span class="text-center text-danger" id="errorMail"><?= isset($formError['email']) ? $formError['email'] : '' ?></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <label for="subject" >Votre sujet: </label>
                            <input type="text" name="subject" id="subject" />
                            <span class="text-center text-danger" id="errorSubject"><?= isset($formError['subjet']) ? $formError['subjet'] : '' ?></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <label for="messages" >Votre message: </label>
                            <textarea name="message" id="message" class="col-12 row-12"></textarea>
                            <span class="text-center text-danger" id="messageError" ><?= isset($formError['message']) ? $formError['message'] : '' ?></span>
                        </div>
                        <div class="col-sm-12 text-center">
                            <input class="btn btn-primary" type="submit" name="valider" id="valider"  value="envoyer le mail" /> <a href="home.php" class="btn btn-primary">retour</a>
                        </div>
                    </form>
                </div>
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