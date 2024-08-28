<?php

use controllers\Usuarios_Controller;

require_once __DIR__."/../factories/UsuarioFactory.php";
require_once __DIR__."/../../_controllers/usuarios_controller.php";

class UsuarioSeeder {

    static function Seed() {
        $factory = new UsuarioFactory();
        $controller = new Usuarios_Controller();

        $admin = [
            'nome'  => "Administrador",
            'email' => "admin@admin.com",
            'senha' => md5('12341234'),
            'foto'  => '',
            'admin' => true,
        ];
        $controller->Create($admin);

        $list = $factory->GetMany(30);

        foreach ($list as $obj) {
            $controller->Create($obj);
        }
    }
}


?>