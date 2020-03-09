<?php
$userInterface=true;
$interfaceAdministrator='';
include_once '../model/dataBase.php';
include_once '../model/discModel.php';
include_once '../model/artistModel.php';
include_once '../model/userModel.php';
include_once '../model/groupeusers.php';
include_once '../config.php';
include_once '../controllers/add_formCtrl.php';
include_once 'include/header.php';
include_once 'include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>
    <main>
        <a href=""></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Ajouter un vinyle </h1>
                </div>
                <div class="col-sm-12 col-md-12 text-center">
                    <span class="text-primary" id="succesForm"></span>
                    <form method="post" name="add_disc"  id="formAddDisc" enctype="multipart/form-data">
                        <div class="form-group col-lg-8 col-md-12 text-left">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left"  id="title"  placeholder="Enter Title" name="title">
                            <span class="text-danger" id="titre"><?= isset($formError['title']) ? $formError['title'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8 col-md-12 text-left">
                            <label for="Artist">Artist <span class="text-danger">*</span> </label>
                            <select class="form-control" id="Artist" name="artist">
                                <option value="0" selected hidden>choisissez</option>
                                <?php foreach ($listerArtists as $artist) { ?>
                                    <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-danger" id="artist"><?= isset($formError['artist']) ? $formError['artist'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8 col-md-12 text-left">
                            <label for="year">Year <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="year" placeholder="Enter Year" name="year">
                            <span class="text-danger" id="Year"><?= isset($formError['year']) ? $formError['year'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8 col-md-12  text-left">
                            <label for="genre">Genre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="genre" placeholder="Enter Genre (Rock, Pop, Prog ...)" name="Genre">
                            <span class="text-danger" id="Genre"><?= isset($formError['genre']) ? $formError['genre'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8  col-md-12 text-left">
                            <label for="label">Label <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="label" placeholder="Enter Label (EMI, Warner, PolyGram, Univers saie ...)" name="Label">
                            <span class="text-danger" id="Label"><?= isset($formError['label']) ? $formError['label'] : '' ?></span> 
                        </div> 
                        <div class="form-group col-lg-8  col-md-12 text-left">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-left" id="price" placeholder="Price " name="price">
                            <span class="text-danger" id="Price"><?= isset($formError['price']) ? $formError['price'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8 col-md-12 text-left">
                            <label for="picture">Picture <span class="text-danger">*</span></label>
                            <input type="file" class="form-control-file" id="picture" name="picture" aria-describedby="fileHelp" accept=".png,.jpeg,.jpg" />
                            <span class="text-danger" id="Picture"><?= isset($formError['pictrue']) ? $formError['pictrue'] : '' ?></span> 
                        </div>
                        <div class="form-group col-lg-8 col-md-12 text-left">
                            <input class="btn btn-primary" type="submit" id="submit" value="Ajouter" name="submit" /> <a href="../index.php" title="retour"> <button type="button" class="btn btn-primary" >Retour</button></a>
                        </div>
                    </form>
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