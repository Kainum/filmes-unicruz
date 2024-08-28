<?php
    $title = "Filmes e Séries";
    $childView = "./views/home.php";

    require "./_components/search_bar_config.php";

    use controllers\Filmes_Controller;
    require_once "./_controllers/filmes_controller.php";
    $controller = new Filmes_Controller();

    if (isset($_GET["search_term"])) {
        $h1 = 'Resultados da Pesquisa:';
        $lista_filmes = $controller->GetFromPage(1, 500, $_GET["search_term"], 'titulo');
    } else {
        $h1 = 'Destaques:';
        $lista_filmes = $controller->GetDestaques();
    }

    include("./layout.php");
?>