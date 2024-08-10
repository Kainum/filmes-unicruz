<?php

use controllers\Usuarios_Controller;

function FazerLogin($email, $senha) {
    require_once __DIR__."/controllers/usuarios_controller.php";
    $controller = new Usuarios_Controller();

    $usuario = $controller->GetLogin($email, $senha);

    if ($usuario) {
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['admin'] = $usuario['admin'];

        require __DIR__."/config.php";
        require __DIR__."/util.php";
        redirect($BASE_URL);
    } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
    }
}

?>