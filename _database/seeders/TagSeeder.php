<?php

use controllers\Tags_Controller;

require_once __DIR__."/../factories/TagFactory.php";
require_once __DIR__."/../../_controllers/tags_controller.php";

class TagSeeder {

    static function Seed() {
        $factory = new TagFactory();
        $controller = new Tags_Controller();

        $list = $factory->GetMany(50);

        $newArray = [];
        foreach($list as $obj) {
            array_push($newArray, $obj['descricao']);
        }

        foreach (array_unique($newArray) as $obj) {
            $controller->Create([
                'descricao' => $obj,
            ]);
        }
    }
}


?>