<?php

use controllers\Filme_Tags_Controller;
use controllers\Filmes_Controller;
use controllers\Tags_Controller;

require_once __DIR__."/../../_controllers/filme_tags_controller.php";
require_once __DIR__."/../../_controllers/filmes_controller.php";
require_once __DIR__."/../../_controllers/tags_controller.php";

class FilmeTagsSeeder {

    static function Seed() {
        $controller = new Filme_Tags_Controller();
        $controller_filmes = new Filmes_Controller();
        $controller_tags = new Tags_Controller();

        $qtd_filmes = $controller_filmes->Count();
        $qtd_tags = $controller_tags->Count();

        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= $qtd_filmes; $i++) {
            $tags = [
                $faker->numberBetween(1, $qtd_tags),
                $faker->numberBetween(1, $qtd_tags),
                $faker->numberBetween(1, $qtd_tags),
            ];
            $tags = array_unique($tags);
            foreach ($tags as $tag) {
                $obj = [
                    'id_filme' => $i,
                    'id_tag' => $tag,
                ];
                $controller->Create($obj);
            }
        }

        
    }
}


?>