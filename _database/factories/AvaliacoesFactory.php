<?php
require_once "Factory.php";

class AvaliacoesFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('pt_BR');

        $obj = [
            'comentario' => $faker->paragraph(),
            'nota' => $faker->numberBetween(0, 5),
            'data_avaliacao' => $faker->date(),
        ];

        return $obj;
    }

}

?>