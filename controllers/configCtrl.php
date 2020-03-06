<?php
include_once 'model/groupeusers.php';
$listGroups = new groupeusers();
$readGroups = $listGroups->groupeType();
foreach ($readGroups AS $access){
    $groupeID= $access->id;
    $admin=$access->groupeType='Administrateur';
    $idAdmin=$admin=$access->
   $formateur=$access->groupeType='formateur';
   if($access->groupeType==$formateur){
       $userAccess=$groupeID;
   }
}
