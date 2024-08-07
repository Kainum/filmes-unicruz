<?php
    require_once '../protect_admin.php';

    use controllers\Atores_Controller;
    
    require_once '../../controllers/atores_controller.php';

    $title = "Deletar Ator";

    $controller = new Atores_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require("../config.php");
    header("Location: $BASE_URL/atores");
    die();

?>