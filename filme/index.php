<?php
    use controllers\Filmes_Controller;
    require_once "../_controllers/filmes_controller.php";

    $controller = new Filmes_Controller();

    $slug = $_GET['filme'] ?? '';

    $filme = $controller->GetBySlug($slug);
    $tags = $controller->GetTags($filme['id']);
    $elenco = $controller->GetPapeis($filme['id']);
    $avaliacoes = $controller->GetAvaliacoes($filme['id']);

    $title = "Filme: " . $filme['titulo'];
    $childView = "../views/filme.php";

    include("../layout.php");
?>