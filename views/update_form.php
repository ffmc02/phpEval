<?php
$userInterface = true;
$interfaceAdministrator = '';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../config.php';
include_once '../controllers/update_formCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Modifier  un vinyle </h1>
                </div>
                <div class="col-sm-12 text-center">
                    <span class="text-primary" id="succesForm"></span>
                    <?php
                    foreach ($modelDetailList as $modelDetailListe) {
                        $iddisc = $modelDetailListe->disc_id;
                        if ($iddisc == $dicId) {
                            ?>
                            <form method="post" name="add_disc"  id="formModifyDisc" enctype="multipart/form-data">
                                <div class="form-group col-lg-8 text-left">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-left"  id="title"  placeholder="<?= $modelDetailListe->disc_title ?>" name="title">
                                    <span class="text-danger" id="titre"><?= isset($formError['title']) ? $formError['title'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <label for="Artist">Artist <span class="text-danger">*</span> </label>
                                    <select class="form-control" id="Artist" name="artist">
                                        <option value="0" selected hidden><?= $modelDetailListe->artist_name ?></option>
                                        <?php foreach ($listerArtists as $artist) { ?>
                                            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger" id="artist"><?= isset($formError['artist']) ? $formError['artist'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <label for="year">Year <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-left" id="year" placeholder="<?= $modelDetailListe->disc_year ?>" name="year">
                                    <span class="text-danger" id="Year"><?= isset($formError['year']) ? $formError['year'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <label for="genre">Genre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-left" id="genre" placeholder=" <?= $modelDetailListe->disc_genre ?>" name="Genre">
                                    <span class="text-danger" id="Genre"><?= isset($formError['genre']) ? $formError['genre'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <label for="label">Label <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-left" id="label" placeholder="<?= $modelDetailListe->disc_label ?>" name="Label">
                                    <span class="text-danger" id="Label"><?= isset($formError['label']) ? $formError['label'] : '' ?></span> 
                                </div> 
                                <div class="form-group col-lg-8 text-left">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control text-left" id="price" placeholder="<?= $modelDetailListe->disc_price ?>" name="price">
                                    <span class="text-danger" id="Price"><?= isset($formError['price']) ? $formError['price'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <label for="picture">Picture <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" id="picture" name="picture" aria-describedby="fileHelp" accept=".png,.jpeg,.jpg" />
                                    <p><img  class="img-fluid img-thumbnail imgIndex" src="../assets/img/<?= $modelDetailListe->disc_picture ?>"> </p>
                                    <span class="text-danger" id="Picture"><?= isset($formError['pictrue']) ? $formError['pictrue'] : '' ?></span> 
                                </div>
                                <div class="form-group col-lg-8 text-left">
                                    <input class="btn btn-primary" type="submit" id="submit" value="Modifier" name="submit" /> <a href="home.php" title="retour"> <button type="button" class="btn btn-primary" >Retour</button></a>
                                </div>
                            </form>
                            <?php
                        }
                    }
                    ?>
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