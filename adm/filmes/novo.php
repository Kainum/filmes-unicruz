<?php
    require_once '../protect.php';

    use controllers\Filmes_Controller;

    require_once '../../controllers/filmes_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Cadastrar Filme";
        $childView = "./views/form.php";
        $action = "novo";
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Criar();
    }

    function Criar () {
        // adicionar no banco
        $controller = new Filmes_Controller();
        $controller->Create($_POST);

        // redireciona para o index
        require("../config.php");
        header("Location: $BASE_URL/filmes");
        // die();
    }
    
?>