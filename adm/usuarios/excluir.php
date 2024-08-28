<?php
    require_once "../protect_admin.php";

    use controllers\Usuarios_Controller;
    
    require_once "../../_controllers/usuarios_controller.php";

    $title = "Deletar Usuário";

    $controller = new Usuarios_Controller();
    $controller->Delete($_GET['id']);

    require_once "../../_session.php";
    AdicionarMensagem('success', 'Usuário <strong>deletado</strong> com sucesso.');

    // redireciona para o index
    require_once "../../_config.php";
    require_once "../../_util.php";
    redirect("$BASE_URL_ADM/usuarios");

?>