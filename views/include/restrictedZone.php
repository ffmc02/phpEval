
<!--corps de la page -->
<!-- colonne central-->
<div id="columnCenter" class=" col-lg-12 px-0 text-center">
    <div class="titleGreen">
        <h1>pages non accécible</h1>
    </div>
    <div class="titleGreen text-center">
        <p>Vous ne pouvez pas accédez a cette page.</p>
    </div>
    <?php if ($userInterface == true) { ?>
        <p><a href="../../../index.php">1retourné à l'accueil de l'évaluation PHP.</a></p>
        <?php
    }
    if ($userInterface == false) {
        ?>
        <p><a href="../../../index.php">2retourné à l'accueil de l'évaluation PHP.</a></p>
        <?php
    }
    if($interfaceAdministrator== true && $userInterface=='yes'){
        ?>
         <p><a href="../../../index.php">3retourné à l'accueil de l'évaluation PHP.</a></p>
         <?php  }?>
</div>
