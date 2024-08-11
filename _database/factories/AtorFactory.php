<?php
require_once "Factory.php";

class AtorFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create();
        $faker_br = Faker\Factory::create('pt_BR');

        $obj = [
            'nome'              => $faker->firstName() . " " . $faker->lastName(),
            'data_nascimento'   => $faker->date(),
            'nacionalidade'     => $faker_br->country(),
            'foto'              => '',
            'sexo'              => $faker->randomElement(['m','f','o']),
        ];

        return $obj;
    }

}

?>