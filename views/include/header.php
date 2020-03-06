<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= isset($title) ? $title : '' ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php if ($userInterface == true) { ?>
            <link rel="stylesheet" href="../assets/css/style.css">
            <?php
        }
        if ($userInterface == false) {
            ?>
            <link rel="stylesheet" href="../../assets/css/style.css">
            <?php
        }
        if($interfaceAdministrator==true && $userInterface==false){
        ?>
             <link href="../../../assets/css/style.css" rel="stylesheet" type="text/css"/>
            <?php  }?>
    </head>
    <body>
