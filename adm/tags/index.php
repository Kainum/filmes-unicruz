<?php
    require_once '../protect.php';

    use controllers\Tags_Controller;
    
    require_once '../../controllers/tags_controller.php';

    $title = "Tags";
    $childView = "./views/dashboard.php";

    $controller = new Tags_Controller();
    
    include_once '../paginator_config.php';
    $list = $controller->GetPage($page, $limit);

    include("../layout.php");
?>