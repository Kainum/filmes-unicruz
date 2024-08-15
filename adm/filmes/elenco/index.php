<?php
    require_once "../../protect_admin.php";

    use controllers\Filmes_Controller;
    use controllers\Atores_Controller;

    require_once "../../../controllers/filmes_controller.php";
    require_once "../../../controllers/atores_controller.php";

    $controller = new Filmes_Controller();
    $controller_atores = new Atores_Controller();
    
    $id_filme = intval($_GET['id'] ?? 0);
    
    $filme = $controller->Get($id_filme);
    $filme_papeis = $controller->GetPapeis($id_filme);

    $atores = $controller_atores->GetAll('nome');

    $title = "Elenco do Filme: ". $filme['titulo'];
    $childView = "./form.php";

    include("../../layout.php");
?>