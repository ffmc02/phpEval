<?php
$userInterface = true;
$interfaceAdministrator = '';
include_once '../model/dataBase.php';
include_once '../model/userModel.php';
include_once '../config.php';
include_once '../controllers/modifyPasswordCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
    ?>
    <main><div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div id="" class="text-center col-lg-12 px-0">
                        <h1>formulaire de création du nouveau mot de passe </h1>                    
                    <p>Pour recréer votre mot de passe, merci de remplir le formulaire suivant:</p>
                     </div>
                    <div>
                        <p class="text-success"><?= isset($messaageSucess) ? $messaageSucess : '' ?></p>
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                        <p class="text-danger"><?= isset($formError['echec']) ? $formError['echec'] : '' ?></p>
                        <form method="post" name="formModifyPassword">
                            <div>
                                <label> Votre Email</label>
                                <input type="email" name="email" placeholder="votre mail"/>
                                <span class="text-danger"><?= isset($formError['email']) ? $formError['email'] :'' ?></span>
                            </div>
                            <div>
                                <label> Votre nouveau mot de passe</label>
                                <input type="password" name="newPassword" placeholder="Votre nouveau MDP"/>
                                <span class="text-danger"><?= isset($formError['password']) ? $formError['password'] :'' ?></span>
                            </div>
                            <div>
                                <label> Confirmez votre nouveau mot de passe </label>
                                <input type="password" name="confirmPassword"  placeholder="Confirmer votre MDP"/> 
                                <span class="text-danger"><?= isset($formError['password']) ? $formError['password'] :'' ?></span>
                            </div>
                            <div>
                                <input type="hidden" name="cle" value="<?= $_GET['cle'] ?>" /> 
                                <input type="submit" name="modifyPassword" value="Modifier mon mot de passe" />
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
