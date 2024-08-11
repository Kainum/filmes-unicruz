<?php
    require_once "../protect_admin.php";

    use controllers\Usuarios_Controller;
    
    require_once "../../controllers/usuarios_controller.php";

    $title = "Deletar Usuário";

    $controller = new Usuarios_Controller();
    $controller->Delete($_GET['id']);

    require_once "../../session.php";
    AdicionarMensagem('success', 'Usuário <strong>deletado</strong> com sucesso.');

    // redireciona para o index
    require_once "../../config.php";
    require_once "../../util.php";
    redirect("$BASE_URL_ADM/usuarios");

?>