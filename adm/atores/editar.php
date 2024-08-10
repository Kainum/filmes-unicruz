<?php
    require_once "../protect_admin.php";

    use controllers\Atores_Controller;

    require_once "../../controllers/atores_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Editar Ator";
        $childView = "./views/form.php";
        $action = "editar";

        $controller = new Atores_Controller();
        $obj = $controller->Get($_GET['id']);
        
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Atualizar();
    }

    function Atualizar () {
        // atualiza no banco
        $controller = new Atores_Controller();
        $controller->Update($_POST);

        // redireciona para o index
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/atores");
    }
    
?>