<?php

use controllers\Atores_Controller;

require_once __DIR__."/../factories/AtorFactory.php";
require_once __DIR__."/../../controllers/atores_controller.php";

class AtorSeeder {

    static function Seed() {
        $factory = new AtorFactory();
        $controller = new Atores_Controller();

        $list = $factory->GetMany(50);

        foreach ($list as $obj) {
            $controller->Create($obj);
        }
    }
}


?>