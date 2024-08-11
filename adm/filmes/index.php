<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;
    
    require_once "../../controllers/filmes_controller.php";

    $title = "Filmes";
    $childView = "./views/dashboard.php";

    $controller = new Filmes_Controller();
    
    include_once "../../_components/search_bar_config.php";
    include_once "../../_components/paginator_config.php";

    $list = $controller->GetFromPage($page, $limit, $search_term);

    include("../layout.php");
?>