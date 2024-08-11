<?php
require_once "Factory.php";

class TagFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('pt_BR');
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

        $obj = [
            'descricao' => $faker->movieGenre(),
        ];

        return $obj;
    }

}

?>