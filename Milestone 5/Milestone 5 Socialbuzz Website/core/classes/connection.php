<?php

// try for connect with class

class Connect {
    protected static $servername = "localhost";
    // protected static $db_name="relkhatib2019";
    protected static $db_name="cen4010_fa21_g06";
    protected static $username = "root";
    protected static $password = "";

    // Server
    // protected static $db_name= "id17949852_cen4010_fa21_g06";
    // protected static $username = "id17949852_teamg6";
    // protected static $password = "<1VjGbh@l(o1cfa|";

    protected static $pdo;
    public function __construct() { }

    public static function connect() {
         $servername =self::$servername;
         $db_name = self::$db_name;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db_name", self::$username, self::$password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
          //   echo "Connected successfully";
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
        
            return $conn;
    }

}


