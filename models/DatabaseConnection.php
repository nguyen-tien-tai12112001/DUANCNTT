<?php
namespace models;
final class DatabaseConnection {
    
    private static $instance = null;
    private static $connection;
    
    public static function getInstance() {
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnection();
        }
        
        return self::$instance;
    }
    
    private function __construct() {}
    
    private function __clone() {}
    
    
    // private function __wakeup() {}
    // final public function __clone()
    // {
    //     throw new Exception('Feature disabled.');
    // }

    // /**
    //  * Disable the wakeup of this class.
    //  * 
    //  * @return void
    //  */
    // final public function __wakeup()
    // {
    //     throw new Exception('Feature disabled.');
    // }
    
     
    public static function connect($host, $dbName, $user, $password){
        // self::$connection = new \PDO("mysql:dbname=$dbName;host=$host", $user, $password);
        self::$connection = mysqli_connect('localhost', 'root', '', 'pointmanagement');
        // 'localhost', 'pointmanagement', 'root', ''

        // $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);

        
    
       return self::$connection;
    }
    
    public static function getConnection() {
        return self::$connection;
    }
    

}
?>