<?php
    use controllers\Ator_Controller;

    require_once '../../controllers/atores_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Cadastrar Ator";
        $childView = "./views/form.php";
        $action = "novo";
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Criar();
    }

    function Criar () {
        // adicionar no banco
        $controller = new Ator_Controller();
        $controller->Create($_POST);

        // redireciona para o index
        require_once("../config.php");
        header("Location: $BASE_URL/atores");
        die();
    }
    
?>