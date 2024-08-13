<?php
require_once "Factory.php";

class PapeisFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('pt_BR');
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Character($faker));

        $obj = [
            'personagem' => $faker->character(),
        ];

        return $obj;
    }

}

?>