<header>
    <?php if ($userInterface == true) { ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="" title="accueil">Exercice PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                       </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Evaluation PHP
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../index.php">Accueil</a> 
                            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) { ?>
                                <a class="dropdown-item" href="home.php">Accueil site</a>  
                                <a class="dropdown-item" href="add_form.php">Ajouter un vinyle</a>
                                <a class="dropdown-item" href="contactForm.php">Formulaire de contact</a>
                                <a class="dropdown-item" href="disconection.php"><p>Vous déconecter</p></a>
                                <?php
                            }
                            if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
                                ?>
                                <a class="dropdown-item" href="codeDetails.php">Détails du code</a>
                                <a class="dropdown-item" href="isy/indexadmin.php">Accuiel Administrateur</a> 
                                <a class="dropdown-item" href="disconection.php"><p>Vous déconecter</p></a>
                                <a class="dropdown-item" href="isy/view/listsArtist.php">Liste des artistes</a>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
    }
    if ($userInterface == false && $interfaceAdministrator == '') {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="" title="accueil">Evaluation PHP</a>
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
                            <a class="dropdown-item" href="../../index.php">Accueil</a> 
                            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) { ?>
                                <a class="dropdown-item" href="../home.php">Accueil site</a>  
                                <a class="dropdown-item" href="../add_form.php">Ajouter un vinyle</a>
                                <a class="dropdown-item" href="../contactForm.php">Formulaire de contact</a>
                                <a class="dropdown-item" href="../disconection.php"><p>Vous déconecter</p></a>
                                <?php
                            }
                            if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
                                ?>
                                <a class="dropdown-item" href="indexadmin.php">Accuiel Administrateur</a>
                                <a class="dropdown-item" href="../codeDetails.php">Détails du code</a>
                                <a class="dropdown-item" href="view/listsArtist.php">Liste des artistes</a>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
    }
    if ($interfaceAdministrator == true && $userInterface == false) {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="" title="accueil">Exercice PHP</a>
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
                            <a class="dropdown-item" href="../../../index.php">Accueil</a> 
                            <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $toto)) {
                                ?>
                                <a class="dropdown-item" href="../../home.php">Accueil site</a>  
                                <a class="dropdown-item" href="../../add_form.php">Ajouter un vinyle</a>
                                <a class="dropdown-item" href="../../contactForm.php">Formulaire de contact</a>
                                <a class="dropdown-item" href="../../disconection.php">Vous déconecter</a>
                                <?php
                            }
                            if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
                                ?>
                                <a class="dropdown-item" href="../indexadmin.php">Accuiel Administrateur</a>
                                <a class="dropdown-item" href="../../codeDetails.php">Détails du code</a>
                                <a class="dropdown-item" href="listsArtist.php">Liste des artistes</a>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    <?php }
    ?>
</header>
<main>