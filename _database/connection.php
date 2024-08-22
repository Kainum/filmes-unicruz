<?php

class Connection {
    private const servername = "localhost";
    private const username = "root";
    private const password = "";
    private const dbname = "filmes";

    // Singleton
    private static $conn;

    public static function GetConnection () {
        if ( !is_null(self::$conn) ) {
            return self::$conn;
        } else {
            self::$conn = new PDO("mysql:host=".self::servername.";dbname=".self::dbname, self::username, self::password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // set the resulting array to associative
            self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return self::$conn;
        }
    }
}

?>