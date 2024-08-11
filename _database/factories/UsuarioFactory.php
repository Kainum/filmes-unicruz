<?php
require_once "Factory.php";

class UsuarioFactory extends Factory {

    function Get() {
        require_once 'vendor/autoload.php';
        $faker = Faker\Factory::create('pt_BR');

        $obj = [
            'nome'  => $faker->firstName() . " " . $faker->lastName(),
            'email' => $faker->email(),
            'senha' => $faker->md5(),
            'foto'  => '',
            'admin' => false,
        ];

        return $obj;
    }

}

?>