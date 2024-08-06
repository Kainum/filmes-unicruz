<?php
    require_once '../protect.php';

    use controllers\Atores_Controller;
    
    require_once '../../controllers/atores_controller.php';

    $title = "Atores";
    $childView = "./views/dashboard.php";

    $controller = new Atores_Controller();
    $list = $controller->GetAll();

    include("../layout.php");
?>