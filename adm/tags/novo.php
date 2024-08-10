<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;

    require_once "../../controllers/tags_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        $title = "Cadastrar Tag";
        $childView = "./views/form.php";
        $action = "novo";
        include("../layout.php");
    }
    else if ($method == 'POST') {
        Criar();
    }

    function Criar () {
        // adicionar no banco
        $controller = new Tags_Controller();
        $controller->Create($_POST);

        // redireciona para o index
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/tags");
    }
    
?>