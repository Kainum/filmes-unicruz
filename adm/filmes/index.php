<?php
    require_once '../protect.php';

    use controllers\Filmes_Controller;
    
    require_once '../../controllers/filmes_controller.php';

    $title = "Filmes";
    $childView = "./views/dashboard.php";

    $controller = new Filmes_Controller();
    
    include_once '../paginator_config.php';
    $list = $controller->GetPage($page, $limit);

    include("../layout.php");
?>