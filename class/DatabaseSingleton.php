<?php

include "../config/database.php";

class DatabaseSingleton{

    private static $_database = false;

    public static function getDatabase(){
        if(!self::$_database){
            $dbc = new Database();
            $database =$dbc->getMysqli();
        }
        return self::$_database;
    }

}