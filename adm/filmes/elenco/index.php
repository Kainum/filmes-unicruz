<?php
    require_once "../../protect_admin.php";

    use controllers\Filmes_Controller;
    use controllers\Atores_Controller;
    use controllers\Papeis_Controller;

    require_once "../../../controllers/filmes_controller.php";
    require_once "../../../controllers/atores_controller.php";
    require_once "../../../controllers/papeis_controller.php";

    $controller = new Filmes_Controller();
    $controller_atores = new Atores_Controller();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $id_filme = $_POST['id'];
        $personagens = $_POST['personagens'];
        $atores = $_POST['atores'];

        $controller_papeis = new Papeis_Controller();

        $filme_papeis = $controller->GetPapeis($id_filme);
        foreach ($filme_papeis as $papel) {
            $controller_papeis->Delete($papel['id']);
        }

        for ($i = 0; $i < count($personagens); $i++) {
            $data = [
                'personagem' => $personagens[$i],
                'id_ator' => $atores[$i],
                'id_filme' => $id_filme,
            ];
            $controller_papeis->Create($data);
        }

        require_once "../../../config.php";
        require_once "../../../util.php";
        redirect("$BASE_URL_ADM/filmes/info.php?id=$id_filme");
    }
    
    $id_filme = intval($_GET['id'] ?? 0);
    
    $filme = $controller->Get($id_filme);
    $filme_papeis = $controller->GetPapeis($id_filme);

    $atores = $controller_atores->GetAll('nome');

    $title = "Elenco do Filme: ". $filme['titulo'];
    $childView = "./form.php";

    include("../../layout.php");
?>