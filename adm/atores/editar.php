<?php
    use controllers\Ator_Controller;

    require_once '../../controllers/atores_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Editar Ator";
        $childView = "./views/form.php";
        $action = "editar";

        $controller = new Ator_Controller();
        $obj = $controller->Get($_GET['id']);
        
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Atualizar();
    }

    function Atualizar () {
        // atualiza no banco
        $controller = new Ator_Controller();
        $controller->Update($_POST);

        // redireciona para o index
        require_once("../config.php");
        header("Location: $BASE_URL/atores");
        die();
    }
    
?>