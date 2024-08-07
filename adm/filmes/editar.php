<?php
    require_once '../protect.php';

    use controllers\Filmes_Controller;

    require_once '../../controllers/filmes_controller.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Editar Filme";
        $childView = "./views/form.php";
        $action = "editar";

        $controller = new Filmes_Controller();
        $obj = $controller->Get($_GET['id']);
        
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Atualizar();
    }

    function Atualizar () {
        // atualiza no banco
        $controller = new Filmes_Controller();
        $controller->Update($_POST);

        // redireciona para o index
        require("../config.php");
        header("Location: $BASE_URL/filmes");
        die();
    }
    
?>