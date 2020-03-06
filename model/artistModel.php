<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of artist
 *
 * @author gaeta
 */
class artist {

    public $pdo;
    public $artist_id = 0;
    public $artist_name = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function readArtists() {
        $query = 'SELECT `artist_id`, `artist_name`'
                . ' FROM `artist` '
                . 'ORDER BY `artist_name` ASC  ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function countAriists() {
        $query = 'SELECT count`artist_id` as `countArtist`'
                . 'FROM `artist`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        $queryResult->fetchAll(PDO::FETCH_OBJ);
        return rowcount($queryResult);
    }

    public function addArtist() {
        $query = 'INSERT INTO `artist`(`artist_name` ) VALUES (:artist_name)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':artist_name', $this->artist_name, PDO::PARAM_STR);
        return $queryResult->execute();
    }
    public function modifyArtist(){
        $query='UPDATE `artist` SET `artist_name`=:artist_name  WHERE `artist_id`=:artist_id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':artist_name', $this->artist_name, PDO::PARAM_STR);
        $queryResult->bindValue(':artist_id', $this->artist_id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    public function deleteAritst(){
        $query='DELETE FROM `artist` WHERE `artist_id`=:artist_id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':artist_id', $this->artist_id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
}
