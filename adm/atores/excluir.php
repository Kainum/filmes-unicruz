<?php
    require_once "../protect_admin.php";

    use controllers\Atores_Controller;
    
    require_once "../../controllers/atores_controller.php";

    $title = "Deletar Ator";

    $controller = new Atores_Controller();
    $controller->Delete($_GET['id']);

    // redireciona para o index
    require_once "../../config.php";
    require_once "../../util.php";
    redirect("$BASE_URL_ADM/atores");

?>