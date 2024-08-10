<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;
    
    require_once "../../controllers/filmes_controller.php";

    $title = "Deletar Filme";

    $controller = new Filmes_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require_once "../config.php";
    require_once "../../util.php";
    redirect("$BASE_URL/filmes");

?>