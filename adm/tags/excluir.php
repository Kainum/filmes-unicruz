<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;
    
    require_once "../../_controllers/tags_controller.php";

    $title = "Deletar Tag";

    $controller = new Tags_Controller();
    $controller->Delete($_GET['id']);

    require_once "../../_session.php";
    AdicionarMensagem('success', 'Tag <strong>deletado</strong> com sucesso.');

    // redireciona para o index
    require_once "../../_config.php";
    require_once "../../_util.php";
    redirect("$BASE_URL_ADM/tags");

?>