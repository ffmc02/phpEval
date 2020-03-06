<?php
$interfaceAdministrator = true;
$userInterface = false;
include_once '../../../model/dataBase.php';
include_once '../../../model/discModel.php';
include_once '../../../model/artistModel.php';
include_once '../../../model/userModel.php';
include_once '../../../model/groupeusers.php';
include_once '../../../config.php';
include_once '../controllers/userListCtrl.php';
include_once '../../include/header.php';
include_once '../../include/navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $authAdmin)) {
    ?>   
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Liste des utilisateurs</h1>
                </div>
                <div class="col-sm-12 text-center table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
                    <table class="table table-hover table-info">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Droit</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($userList as $listUsers) {
                                ?>
                                <tr>  
                                    <td><?= $listUsers->nom ?></td>
                                    <td><?= $listUsers->prenom ?></td>
                                    <td><?= $listUsers->email ?></td>
                                    <td><?= $listUsers->groupeType ?></td>
                                    <td> <a href="modifyOfTheRightOfAccess.php?idUser=<?= $listUsers->idUser ?>" title="modification du droit d'accées"> <button type="button" class="btn btn-primary" >Modifier le droit d'accées</button></a></td>
                                    <td> <a href="deleteUser.php?idUser=<?= $listUsers->idUser ?>" title="Suprimer l'utilisateur "> <button type="button" class="btn btn-primary" >Supprimer l'utilisateur</button></a></td>
                                </tr>   
                            <?php } ?>

                        </tbody> 
                    </table>
                    <a href="../indexadmin.php" title="retour"> <button type="button" class="btn btn-primary" > retrour </button></a>
                </div>
            </div>
        </div>
    </main>
    <?php
} else {
    require '../../include/restrictedZone.php';
}
include '../../include/footer.php';
?>
