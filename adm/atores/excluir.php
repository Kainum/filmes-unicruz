<?php
    use controllers\Ator_Controller;
    
    require_once '../../controllers/atores_controller.php';

    $title = "Deletar Ator";

    $controller = new Ator_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require_once("../config.php");
    header("Location: $BASE_URL/atores");
    die();

?>