<?php
    require_once '../protect.php';

    use controllers\Filmes_Controller;
    
    require_once '../../controllers/filmes_controller.php';

    $title = "Deletar Filme";

    $controller = new Filmes_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require("../config.php");
    header("Location: $BASE_URL/filmes");
    die();

?>