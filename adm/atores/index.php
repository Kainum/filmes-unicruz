<?php
    use controllers\Ator_Controller;
    
    require_once '../../controllers/atores_controller.php';

    $title = "Atores";
    $childView = "./views/dashboard.php";

    $controller = new Ator_Controller();
    $list = $controller->GetAll();

    include("../layout.php");
?>