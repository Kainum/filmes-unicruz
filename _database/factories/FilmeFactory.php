<?php
require_once "Factory.php";

class FilmeFactory extends Factory {

    const imagens = [
        'https://midias.imagemfilmes.com.br/capas/fede9d6c-d7e3-41f6-a505-7d2ff4b3a555_m.jpg',
        'https://midias.imagemfilmes.com.br/capas/97d33119-b36d-459f-b042-9a9730ec4fa0_m.jpg',
        'https://midias.imagemfilmes.com.br/capas/400c4412-d60b-4bef-ad8c-9aa31fa683c6_m.jpg',
        'https://midias.imagemfilmes.com.br/capas/8532e166-3791-49a8-bd3e-0e8db67a7296_m.jpg',
        'https://midias.imagemfilmes.com.br/capas/c95cf1f8-668b-4a14-9457-4518448105c9_m.jpg',
        'https://midias.imagemfilmes.com.br/capas/a1f17ce0-8d51-4302-a8b9-80d0c246ca8d_m.jpg',
    ];

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
            'imagem'            => $faker->randomElement(self::imagens),
        ];

        $obj['slug'] = $this->Slug($obj['titulo']) . '-' . $faker->randomNumber(4, true);

        return $obj;
    }

    function Slug ($string) {
        $string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

}

?>