<?php

use controllers\Filmes_Controller;

require_once __DIR__."/../factories/FilmeFactory.php";
require_once __DIR__."/../../_controllers/filmes_controller.php";

class FilmeSeeder {

    static function Seed() {
        $factory = new FilmeFactory();
        $controller = new Filmes_Controller();

        $list = $factory->GetMany(70);

        foreach ($list as $obj) {
            $controller->Create($obj);
        }
    }
}


?>