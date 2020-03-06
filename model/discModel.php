<?php

class discModel {

    public $pdo;
    public $disc_id=0;
    public $disc_title = '';
    public $disc_year = 0;
    public $disc_label = '';
    public $disc_genre = '';
    public $disc_picture = '';
    public $disc_price = 0;
    public $artist_id = 0;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function readDiscs() {
        $query = 'SELECT `disc`.`disc_id`, '
                . '`disc`.`disc_title`, '
                . '`disc`.`disc_year`, '
                . '`disc`.`disc_label`, '
                . '`disc`.`disc_genre`, '
                . '`disc`. disc_picture, '
                . '`disc`.`disc_price`, '
                . '`artist`.`artist_name` '
                . 'FROM `disc` '
                . 'INNER JOIN `artist` '
                . 'ON `artist`.`artist_id`=`disc`.`artist_id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function addDisc() {
        $query = 'INSERT INTO `disc` '
                . '(`disc_title`, `disc_year`, `disc_picture`, `disc_label`,  `disc_genre`, `disc_price`,  `artist_id`) '
                . 'value (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre,  :disc_price, :artist_id)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':artist_id', $this->artist_id, PDO::PARAM_INT);
        $queryResult->bindValue(':disc_title', $this->disc_title, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_year', $this->disc_year, PDO::PARAM_INT);
        $queryResult->bindValue(':disc_label', $this->disc_label, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_genre', $this->disc_genre, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_picture', $this->disc_picture, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_price', $this->disc_price, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function modifyDiscs() {
        $query = 'UPDATE `disc` '
                . 'SET `disc_title`=:disc_title, '
                . '`disc_year`=:disc_year, '
                . '`disc_picture`=:disc_picture, '
                . '`disc_label`=:disc_label, '
                . '`disc_genre`=:disc_genre, '
                . '`disc_price`=:disc_price, '
                . '`artist_id`=:artist_id'
                . ' WHERE `disc_id`=:disc_id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':disc_id', $this->disc_id, PDO::PARAM_INT);
        $queryResult->bindValue(':artist_id', $this->artist_id, PDO::PARAM_INT);
        $queryResult->bindValue(':disc_title', $this->disc_title, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_year', $this->disc_year, PDO::PARAM_INT);
        $queryResult->bindValue(':disc_label', $this->disc_label, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_genre', $this->disc_genre, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_picture', $this->disc_picture, PDO::PARAM_STR);
        $queryResult->bindValue(':disc_price', $this->disc_price, PDO::PARAM_INT);
        return $queryResult->execute();
//        $queryResult->execute();
//        ////permet d'afficher la reguette excuter
//        $queryResult->debugDumpParams();
//        die();
    }
    public function deleteDisc(){
        $query='DELETE FROM `disc` WHERE `disc_id`=:disc_id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':disc_id', $this->disc_id, PDO::PARAM_INT);
//        $queryResult->execute();
         return $queryResult->execute();
//          $queryResult->debugDumpParams();
//        die();
    }

}
