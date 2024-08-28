<?php

use controllers\Papeis_Controller;
use controllers\Filmes_Controller;
use controllers\Atores_Controller;

require_once __DIR__."/../../_controllers/papeis_controller.php";
require_once __DIR__."/../../_controllers/filmes_controller.php";
require_once __DIR__."/../../_controllers/atores_controller.php";

require_once __DIR__."/../factories/PapeisFactory.php";

class PapeisSeeder {

    static function Seed() {
        $factory = new PapeisFactory();
        $controller = new Papeis_Controller();
        $controller_filmes = new Filmes_Controller();
        $controller_atores = new Atores_Controller();

        $qtd_filmes = $controller_filmes->Count();
        $qtd_atores = $controller_atores->Count();

        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= $qtd_filmes; $i++) {

            $random = $faker->numberBetween(1, 5);
            $random = $faker->numberBetween(1, 5);
            $atores = [];

            for ($j = 0; $j < $random; $j++) {
                array_push($atores, $faker->numberBetween(1, $qtd_atores));
            }

            foreach ($atores as $ator) {
                $obj = $factory->Get();
                $obj['id_filme'] = $i;
                $obj['id_ator'] = $ator;

                $controller->Create($obj);
            }
        }

        
    }
}


?>