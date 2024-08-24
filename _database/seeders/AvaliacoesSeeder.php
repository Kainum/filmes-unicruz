<?php

use controllers\Avaliacoes_Controller;
use controllers\Filmes_Controller;
use controllers\Usuarios_Controller;

require_once __DIR__."/../../controllers/avaliacoes_controller.php";
require_once __DIR__."/../../controllers/filmes_controller.php";
require_once __DIR__."/../../controllers/usuarios_controller.php";

require_once __DIR__."/../factories/AvaliacoesFactory.php";

class AvaliacoesSeeder {

    static function Seed() {
        $factory = new AvaliacoesFactory();
        $controller = new Avaliacoes_Controller();
        $controller_filmes = new Filmes_Controller();
        $controller_usuarios = new Usuarios_Controller();

        $qtd_filmes = $controller_filmes->Count();
        $qtd_usuarios = $controller_usuarios->Count();

        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= ($qtd_filmes / 2); $i++) {

            $random = $faker->numberBetween(2, 3);
            $usuarios = [];

            for ($j = 0; $j < $random; $j++) {
                array_push($usuarios, $faker->numberBetween(1, $qtd_usuarios));
            }

            foreach (array_unique($usuarios) as $usuario) {
                $obj = $factory->Get();
                $obj['id_filme'] = $i;
                $obj['id_usuario'] = $usuario;

                $controller->Create($obj);
            }
        }

        
    }
}


?>