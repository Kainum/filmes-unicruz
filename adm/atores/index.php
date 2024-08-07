<?php
    require_once '../protect_admin.php';

    use controllers\Atores_Controller;
    
    require_once '../../controllers/atores_controller.php';

    $title = "Atores";
    $childView = "./views/dashboard.php";

    $controller = new Atores_Controller();

    include_once '../paginator_config.php';
    $list = $controller->GetPage($page, $limit);

    include("../layout.php");
?>