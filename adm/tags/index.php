<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;
    
    require_once "../../controllers/tags_controller.php";

    $title = "Tags";
    $childView = "./views/dashboard.php";

    $controller = new Tags_Controller();
    
    include_once "../../_components/search_bar_config.php";
    include_once "../../_components/paginator_config.php";

    $list = $controller->GetFromPage($page, $limit, $search_term);

    include("../layout.php");
?>