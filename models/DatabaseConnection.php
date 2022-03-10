<?php
namespace models;
final class DatabaseConnection {
    
    private static $instance = null;
    private static $connection;
    private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "pointmanagement";
    
    public static function getInstance() {
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnection();
        }
        
        return self::$instance;
    }
    
    private function __construct() {
        self::$connection = mysqli_connect($this->_host, $this->_username, 
        $this->_password, $this->_database);
        
    }
    
    private function __clone() {}

    
    public static function getConnection() {
        return self::$connection;
    }
    

}
?>