<?php

require_once __DIR__."/AtorSeeder.php";
require_once __DIR__."/FilmeSeeder.php";
require_once __DIR__."/TagSeeder.php";
require_once __DIR__."/UsuarioSeeder.php";

require_once __DIR__."/FilmeTagsSeeder.php";
require_once __DIR__."/PapeisSeeder.php";

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

        FilmeTagsSeeder::Seed();
        PapeisSeeder::Seed();
    }

    static function DB_Reset() {
        $tables = [
            'avaliacoes',
            'filme_tags',
            'papeis',
            'atores',
            'filmes',
            'tags',
            'usuarios',
        ];

        require_once __DIR__."/../connection.php";
        $conn = Connection::GetConnection();

        try {
            foreach ($tables as $table) {
                $sql = "DROP TABLE $table;";
                $query = $conn->prepare($sql);
                $query->execute();
            }

            require_once __DIR__."/../migrations/migration1.php";
            Migrate();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>