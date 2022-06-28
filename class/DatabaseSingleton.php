<?php

include "../config/database.php";

class DatabaseSingleton{

    private static $_database = false;
    private static $db = null;

    public static function getDatabase(){
        if(!self::$_database){
            $dbc = new Database();
            self::$db =$dbc->getMysqli();
        }
        return self::$db;
    }

}