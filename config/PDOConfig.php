<?php 

//-------------------//
//  Class PDOConfig  //
//-------------------//

// Configuration for: Connecting to the database //

class PDOConfig
{
    static $DEBUG = 1;
    static $DB_TYPE = 'mysql';
    static $DB_HOST = 'localhost';
    static $DB_NAME = 'db';
    static $DB_USER = 'root';
    static $DB_PASS = 'root';
    static $DB_CHARSET = 'utf8';
    static $DB_OPTION = array(
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    );
     
}

?>