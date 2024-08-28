<?php
    require_once "../protect_admin.php";

    use controllers\Atores_Controller;
    
    require_once "../../_controllers/atores_controller.php";

    $title = "Deletar Ator";

    $controller = new Atores_Controller();
    $controller->Delete($_GET['id']);

    require_once "../../_session.php";
    AdicionarMensagem('success', 'Ator <strong>deletado</strong> com sucesso.');

    // redireciona para o index
    require_once "../../_config.php";
    require_once "../../_util.php";
    redirect("$BASE_URL_ADM/atores");

?>