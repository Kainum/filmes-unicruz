<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;

    require_once "../../controllers/tags_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Editar Tag";
        $childView = "./views/form.php";
        $action = "editar";

        $controller = new Tags_Controller();
        $obj = $controller->Get($_GET['id']);
        
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Atualizar();
    }

    function Atualizar () {
        // atualiza no banco
        $controller = new Tags_Controller();
        $controller->Update($_POST);

        // redireciona para o index
        require("../config.php");
        header("Location: $BASE_URL/tags");
        die();
    }
    
?>