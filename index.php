<?php
$userInterface = true;
include_once 'model/dataBase.php';
include_once 'model/userModel.php';
include_once 'config.php';
include_once 'controllers/indexCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= isset($title) ? $title : '' ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php" title="accueil">Accueil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Evaluation PHP 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"href="index.php">Accueil</a> 
                                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) { ?>
                                    <a class="dropdown-item"href="views/codeDetails.php">détaills du code</a>  
                                    <a class="dropdown-item" href="views/codeDetails.php">Détails du code</a>
                                    <a class="dropdown-item" href="views/isy/indexadmin.php">Accuiel Administrateur</a>
                                    <?php
                                }
                                if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
                                    ?>                                        
                                    <a class="dropdown-item" href="views/home.php">Accueil site</a>
                                    <a class="dropdown-item" href="views/contactForm.php">Formulaire de contact</a>
                                    <a class="dropdown-item" href="views/add_form.php">Ajouter un vinyle</a>
                                    <a class="dropdown-item" href="views/disconection.php"><p>Vous déconecter</p></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- colonne central-->
                        <div id="columnCenter" class=" col-lg-8 px-0">
                            <div class="col-lg-12 text-center">
                                <h1>Evaluation PHP.</h1>
                                <p class=" text-primary">Bienvenue sur l'évaluation PHP  pour accéder Il faut soit vous connecter soit vous enregistrez </p>
                            </div>
                            <div class="col-lg-12 text-center">
                                <p> Si vous disposez déjà d'un profil vous pouvez aller directement sur <a class="btnExistCompt" href="#connexion">j'ai un compte.</a></p>
                            </div>
                            <div class="registration text-center" id="registration">
                                <div class="titleGreen">  
                                    <h2>Enregistrez-Vous !</h2>
                                </div>
                                <div><p>Pour pouvoir accéder à l'évaluation PHP merci de bien vouloir  vous enregister !
                                    </p></div>
                                <div class="titleGreen">  
                                    <h3>inscription</h3>
                                </div>
                                <div>
                                    <p><?= isset($addUserMessage) ? $addUserMessage : '' ?></p>
                                    <p class="text-danger"><?= isset($formError['register']) ? $formError['register'] : '' ?></p>
                                    <form method="POST" action="#" name="addUser" id="addUser"> 
                                        <div class="col-lg-12 text-center">
                                            <label for="surname">Votre nom:</label>
                                            <input type="text" placeholder="Votre nom" name="surname" id="surname" value=""/>
                                            <span class="text-danger" id="surnameError"></span> 
                                            <p class="text-danger"><?= isset($formError['surname']) ? $formError['surname'] : '' ?></p> 
                                        </div> 
                                        <div class="col-lg-12 text-center">
                                            <label for="firstname">Votre prénom:</label>
                                            <input type="text" placeholder="Votre prénom" name="firstname" id="firstname" value=""/>
                                            <span class="text-danger" id="firstnameError"></span> 
                                            <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p> 
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label for="email">Votre mail:</label>
                                            <input type="text" placeholder="Votre mail" name="email" id="email" value="" />
                                            <span class="text-danger" id="mailError"></span> 
                                            <p class="text-danger"><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label for="password">Votre mot de passe:</label>
                                            <input type="password" placeholder="Votre mot de passe" name="password" id="password" />
                                            <span class="text-danger" id="passwordError"></span> 
                                            <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label for="password2">Confirmation du mot de passe:</label>
                                            <input type="password" placeholder="Confirmation de votre MDP" name="confirmPassword" id="password2" />
                                            <span class="text-danger" id="passwordError2"></span> 
                                            <p class="text-danger"><?= isset($formError['confirmPassword']) ? $formError['confirmPassword'] : '' ?></p>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <input type="submit" name="registration" value="je m'inscris" />
                                        </div>
                                    </form>
                                </div>    
                            </div>
                            <div class="registration text-center col-lg-12" id="connexion">
                                <div class="titleGreen">  
                                    <h2>Connectez-vous !</h2>
                                </div>
                                <div><p>Pour pouvoir accéder à l'évaluation PHP merci de bien vouloir  vous connecter !
                                    </p></div>
                                <div class="titleGreen">  
                                    <h3>connexion</h3>
                                </div>
                                <form method="POST" name="userConnect" id="userConnect"> 
                                    <div class="col-lg-12 text-center">
                                        <label for="mail">Votre mail</label>
                                        <input type="email" name="loginemail" placeholder="Votre mail" id="Email5"/>
                                        <span class="text-danger" id="loginemailError"><?= isset($formError['loginemail']) ? $formError['loginemail'] : '' ?></span>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <label for="loginPassWord">Votre mots de passe</label>
                                        <input type="password" name="loginPassword" placeholder="Votre mot de passe" id="loginPassWord"/>
                                        <span class="text-danger" id="loginPasswordError2"><?= isset($formError['loginPassword']) ? $formError['loginPassword'] : '' ?></span>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" name="connexion" value="Se connecter!"  />
                                    </div>
                                </form>
                                <!--<p><a href="passwordForget">Mot de passe oublié</a></p>-->
                                <p class="text-danger" > <?= isset($connexionError) ? $connexionError : '' ?></p>
                                <p class="text-danger"><?= isset($formError['userExist']) ? $formError['userExist'] : '' ?></p>
                            </div>
                            <div class="btnRegistration text-center">
                                <p class="btn btn-link">Vous n'avez pas de compte alors inscrivez-vous ICI </p>
                            </div>
                            <div class="btnExistCompt text-center">

                                <p class="btn btn-link"> J'ai un compte </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>