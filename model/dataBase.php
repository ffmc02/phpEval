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
            //Local
            $this->db = new PDO('mysql:host=localhost;dbname=phpevaluation;charset=utf8', 'root', '');
            // devamorce
//            $this->db = new PDO('mysql:host=localhost;dbname=gaetan02;charset=utf8', 'gaetan02', '05071988G@e');
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
