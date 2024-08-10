<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;

    require_once "../../controllers/filmes_controller.php";

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
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/filmes");
    }
    
?>