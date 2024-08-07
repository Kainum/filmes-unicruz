<?php
    require_once '../protect_admin.php';

    use controllers\Tags_Controller;
    
    require_once '../../controllers/tags_controller.php';

    $title = "Deletar Tag";

    $controller = new Tags_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require("../config.php");
    header("Location: $BASE_URL/tags");
    die();

?>