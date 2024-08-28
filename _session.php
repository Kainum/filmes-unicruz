<?php

use controllers\Usuarios_Controller;

function FazerLogin($email, $senha) {
    require_once __DIR__."/_controllers/usuarios_controller.php";
    $controller = new Usuarios_Controller();

    $usuario = $controller->GetLogin($email, $senha);

    if ($usuario) {
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['admin'] = $usuario['admin'];

        require __DIR__."/_config.php";
        require __DIR__."/_util.php";
        redirect($BASE_URL);
    } else {
        if (!isset($GLOBALS['msgs'])){
            $GLOBALS['msgs'] = [];
        }
        AdicionarMensagem('danger', 'E-mail ou senha incorretos.');
    }
}

function FazerLogout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    session_destroy();
}

function EstaLogado() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    return isset($_SESSION['id']);
}

function UsuarioAtivo() {
    require_once __DIR__."/_controllers/usuarios_controller.php";
    $controller = new Usuarios_Controller();

    if(!isset($_SESSION)) {
        session_start();
    }

    $usuario = $controller->Get($_SESSION['id']);
    return $usuario;
}

function GetMsgs() {
    if(!isset($_SESSION)) {
        session_start();
    }

    return $_SESSION['msgs'] ?? [];
}

function AdicionarMensagem($tipo, $msg) {
    if(!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['msgs'])){
        $_SESSION['msgs'] = [];
    }

    array_push($_SESSION['msgs'], ['tipo' => $tipo, 'msg' => $msg]);
}

function LimparMensagens() {
    if(!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['msgs'] = [];
}

?>