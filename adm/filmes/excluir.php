<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;
    
    require_once "../../_controllers/filmes_controller.php";

    $title = "Deletar Filme";

    $controller = new Filmes_Controller();
    $controller->Delete($_GET['id']);

    require_once "../../_session.php";
    AdicionarMensagem('success', 'Filme <strong>deletado</strong> com sucesso.');

    // redireciona para o index
    require_once "../../_config.php";
    require_once "../../_util.php";
    redirect("$BASE_URL_ADM/filmes");

?>