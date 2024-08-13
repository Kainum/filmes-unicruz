<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;
    require_once "../../controllers/filmes_controller.php";

    $controller = new Filmes_Controller();

    $id_filme = intval($_GET['id'] ?? 0);

    $filme = $controller->Get($id_filme);
    $tags = $controller->GetTags($id_filme);
    $elenco = $controller->GetPapeis($id_filme);

    $title = "Filme: " . $filme['titulo'];
    $childView = "./views/info_card.php";

    include("../layout.php");
?>