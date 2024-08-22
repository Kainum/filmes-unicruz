<?php
    $title = "Filmes e Séries";
    $childView = "./views/home.php";
    // $nome_usuario = $_SESSION['nome'];

    require "./_components/search_bar_config.php";

    use controllers\Filmes_Controller;
    require_once "./controllers/filmes_controller.php";
    $controller = new Filmes_Controller();

    $destaques = $controller->GetDestaques();
    // echo '<pre>';
    // var_dump($filmes);
    // echo '</pre>';
    // die();

    include("./layout.php");
?>