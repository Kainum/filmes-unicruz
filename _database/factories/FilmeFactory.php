<?php
require_once "Factory.php";

class FilmeFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('pt_BR');
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

        $obj = [
            'titulo'            => $faker->movie(),
            'data_lancamento'   => $faker->date(),
            'duracao'           => $faker->numberBetween(70, 130),
            'class_ind'         => $faker->randomElement([0, 10, 12, 14, 16, 18]),
            'sinopse'           => $faker->text(),
            'imagem'            => '',
        ];

        return $obj;
    }

}

?>