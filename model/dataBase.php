<?php



/**
 * Description of dataBase
 *
 * @author Jonard G
 */
class dataBase {
    
    private static $instance= null;
    public $db = NULL;
    public function __construct() {
        try {
            //ordi formation
            $this->db = new PDO('mysql:host=localhost;dbname=phpevaluation;charset=utf8', 'root', '');
        }
        // Sinon on affiche un message d'erreur
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getIntance() {
        if(is_null(  self::$instance)){
          self::$instance= new dataBase();  
        }
        return   self::$instance;
    }

}
