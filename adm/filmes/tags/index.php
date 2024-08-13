<?php
    require_once "../../protect_admin.php";

    use controllers\Filmes_Controller;
    require_once "../../../controllers/filmes_controller.php";

    $controller = new Filmes_Controller();
    
    $id_filme = intval($_GET['id'] ?? 0);
    
    $filme = $controller->Get($id_filme);
    $list = $controller->GetTags($id_filme);

    $title = "Tags do Filme: ". $filme['titulo'];
    $childView = "./form.php";

    include("../../layout.php");
?>