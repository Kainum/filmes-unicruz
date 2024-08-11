<?php
    require_once "../protect_admin.php";

    use controllers\Atores_Controller;
    
    require_once "../../controllers/atores_controller.php";

    $title = "Atores";
    $childView = "./views/dashboard.php";

    $controller = new Atores_Controller();

    include_once "../../_components/search_bar_config.php";
    include_once "../../_components/paginator_config.php";

    $list = $controller->GetFromPage($page, $limit, $search_term);

    include("../layout.php");
?>