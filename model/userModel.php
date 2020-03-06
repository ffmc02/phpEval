<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userModel
 *
 * @author gaeta
 */
class userModel {

    public $pdo;
    public $firstname = '';
    public $surname = '';
    public $email = '';
    public $password = '';
    public $cle = '';
    public $idUsers = 0;
    public $goupeUsers = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function addUser() {
        $query = 'INSERT INTO `2526u_user` '
                . '(`surname`, `firstname`, `email`, `password`, `cle`) '
                . 'VALUES '
                . '(:surname, :firstname, :email, :password , :cle)';
//on lie chaque marqueur a une valeur
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':surname', $this->surname, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->bindvalue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindvalue(':cle', $this->cle, PDO::PARAM_STR);
//execution de la requette préparer:
        return $queryResult->execute();
//           $queryResult->execute();
        //permet d'afficher la reguette excuter
//        $queryResult->debugDumpParams();
//        die();
    }

    public function connexionUser() {
        $query = 'SELECT `id` AS idUser, COUNT(`id`) AS `count`, `surname` AS `surname`, `firstname` AS `firstname`, `email` AS `loginMail`, `password` AS password, `groupeusers_id` AS `access` FROM `2526u_user` WHERE `email`= :email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
        //permet d'afficher la reguette excuter
//        $queryResult->debugDumpParams();
//        die();
    }

    //    verification de l'existance du mail
    public function testEmail() {
        $query = 'SELECT `id` AS `idUser`, '
                . 'COUNT(id) AS `countId`, '
                . '`surname`, '
                . '`cle` '
                . 'FROM `2526u_user` '
                . 'WHERE '
                . '`email`=:email ';
//on lie chaque marqueur a une valeur
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':email', $this->email, PDO::PARAM_STR);
        //execution de la requette préparer:
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function userList() {
        $query = 'SELECT `2526u_user`.`id` AS `idUser`,'
                . ' `surname` AS `nom`, '
                . '`firstname` AS `prenom`, '
                . '`email`, '
                . '`2526u_groupeusers`.`groupeType` '
                . 'FROM `2526u_user` '
                . 'INNER JOIN `2526u_groupeusers`'
                . 'ON `2526u_user`.`groupeusers_id`=`2526u_groupeusers`.`id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function modifyAccess() {
        $query = 'UPDATE `2526u_user` SET `groupeusers_id`=:goupeUsers WHERE `id`=:idUsers';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $queryResult->bindValue(':goupeUsers', $this->goupeUsers, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function deleteUser() {
        $query = 'DELETE FROM `2526u_user` WHERE `id`=:idUsers';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
