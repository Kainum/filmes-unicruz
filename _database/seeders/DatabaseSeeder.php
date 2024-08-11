<?php

require_once __DIR__."/AtorSeeder.php";
require_once __DIR__."/FilmeSeeder.php";
require_once __DIR__."/TagSeeder.php";
require_once __DIR__."/UsuarioSeeder.php";

class DatabaseSeeder {

    static function Seed ($reset = false) {
        // resetando as tabelas do banco
        if ($reset) {
            self::DB_Reset();
        }

        // seeding
        AtorSeeder::Seed();
        FilmeSeeder::Seed();
        TagSeeder::Seed();
        UsuarioSeeder::Seed();
    }

    static function DB_Reset() {
        $tables = [
            'atores',
            'filmes',
            'tags',
            'usuarios',
        ];

        require_once __DIR__."/../connection.php";
        $conn = Connection::GetConnection();

        try {
            foreach ($tables as $table) {
                $sql = "TRUNCATE TABLE $table;";
    
                $query = $conn->prepare($sql);
    
                $query->execute();
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>