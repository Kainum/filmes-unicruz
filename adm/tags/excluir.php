<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;
    
    require_once "../../controllers/tags_controller.php";

    $title = "Deletar Tag";

    $controller = new Tags_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require_once "../config.php";
    require_once "../../util.php";
    redirect("$BASE_URL/tags");

?>