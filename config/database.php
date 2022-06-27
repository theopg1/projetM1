<?php

class Database{

	public static function getMysqli(){

		$connection = array("host" => "localhost", "port" => "3306", "dbname" => "projetM1", "login" => "projetM1", "password" => "TJzoO5wG!0a9");

		$db = new mysqli($connection['host'], $connection['login'], $connection['password'], $connection["dbname"]);

		mysqli_query($db, "SET NAMES 'utf8'");
		mysqli_query($db, "SET CHARACTER SET utf8");
		mysqli_query($db, "SET SESSION collation_connection = 'utf8_unicode_ci'");
        mysqli_query($db, "SET time_zone = '+01:30'");

		if ($db->connect_error) {
			die("Erreur de configuration de la base de données");
		}

		return $db;
	}
}
