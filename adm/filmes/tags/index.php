<?php
    require_once "../../protect_admin.php";

    use controllers\Filmes_Controller;
    use controllers\Tags_Controller;

    require_once "../../../controllers/filmes_controller.php";
    require_once "../../../controllers/tags_controller.php";

    $controller = new Filmes_Controller();
    $controller_tags = new Tags_Controller();
    
    $id_filme = intval($_GET['id'] ?? 0);
    
    $filme = $controller->Get($id_filme);
    $filme_tags = $controller->GetTags($id_filme);

    $tags = $controller_tags->GetAll('descricao');

    $title = "Tags do Filme: ". $filme['titulo'];
    $childView = "./form.php";

    include("../../layout.php");
?>