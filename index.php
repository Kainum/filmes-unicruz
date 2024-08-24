<?php
    $title = "Filmes e Séries";
    $childView = "./views/home.php";

    require "./_components/search_bar_config.php";

    use controllers\Filmes_Controller;
    require_once "./controllers/filmes_controller.php";
    $controller = new Filmes_Controller();

    $destaques = $controller->GetDestaques();

    include("./layout.php");
?>