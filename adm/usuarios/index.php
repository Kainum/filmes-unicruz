<?php
    require_once "../protect_admin.php";

    use controllers\Usuarios_Controller;
    
    require_once "../../_controllers/usuarios_controller.php";

    $title = "Usuários";
    $childView = "./views/dashboard.php";

    $controller = new Usuarios_Controller();
    
    include_once "../../_components/search_bar_config.php";
    include_once "../../_components/paginator_config.php";

    $list = $controller->GetFromPage($page, $limit, $search_term);

    include("../layout.php");
?>