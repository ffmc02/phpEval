<?php
$userInterface = true;
$interfaceAdministrator = '';
include_once '../model/dataBase.php';
include_once '../model/userModel.php';
include_once '../config.php';
include_once '../controllers/passwordForgetCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
    ?>
    <main><div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div id="columnCenter" class=" col-lg-8 px-0">
                        <div class="titleGreen">
                            <h1>Renouveler votre mot de passe</h1>
                        </div>
                        <p>Pour récupérer votre mot de passe, veuillez remplir le formulaire suivant:<br>
                            Un mail vous sera envoyé avec un lien qui vous permettra de créer un nouveau mot de passe.</p>
                        <div class="titleGreen">
                            <h2></h2>
                        </div>
                        <p class="text-danger"><?= isset($messageNotExiste) ? $messageNotExiste : '' ?></p>
                        <p class="text-danger"><?= isset($messageError) ? $messageError : '' ?></p>
                        <p class="text-success"<?= isset($messagesucces) ? $messagesucces : '' ?></p>
                        <form method="post" name="formpasswordForget">
                            <div>
                                <label>Mon email: </label>
                                <input type="email" name="email" placeholder="Votre Email"/>
                                <span class="text-danger"><?= isset($formError['email']) ? $formError['email'] : '' ?></span>
                                
                            </div>
                            <div>
                                <label>Votre Nom de famille: </label>
                                <input type="text" name="surname"  placeholder="Votre nom de famille"/>
                                <span class="text-danger"><?= isset($formError['surname']) ? $formError['surname'] : '' ?></span>
                            </div>
                            <div>
                                <input type="submit" name="passwordForget" value="Renouveler mon mot de passe." />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php


include 'include/footer.php';
?>
