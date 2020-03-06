<?php
$title='liste des utilisateurs';
$listerUser=new userModel();
$userList= $listerUser->userList();
$interfaceAdministrator=true;
$userInterfaces=false;