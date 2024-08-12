<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;
    
    require_once "../../controllers/filmes_controller.php";

    $filme_controller = new Filmes_Controller();
    $filme = $filme_controller->Get($_GET['id'] ?? 1);

    $title = "Filme: " . $filme['titulo'];
    $childView = "./views/info_card.php";

    include("../layout.php");
?>