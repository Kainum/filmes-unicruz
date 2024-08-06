<?php
    require_once '../protect.php';

    use controllers\Tags_Controller;
    
    require_once '../../controllers/tags_controller.php';

    $title = "Tags";
    $childView = "./views/dashboard.php";

    $controller = new Tags_Controller();
    $list = $controller->GetAll();

    include("../layout.php");
?>