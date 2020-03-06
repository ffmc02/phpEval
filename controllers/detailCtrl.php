<?php
$userInterface=true;

$title='détail de l\'album';
$detail=new discModel();
$modelDetailList=$detail->readDiscs();
if(isset($_GET['id'])){
    $dicId= htmlspecialchars($_GET['id']);
}