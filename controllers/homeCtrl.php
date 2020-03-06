<?php
$userInterface=true;

$title='Accuiel VeltelRecord';
//Liste des cd et appel a la classe discmodel
$listDisc= new discModel();
//appel a la fonction readDisc
$listReadDisc= $listDisc->readDiscs();
