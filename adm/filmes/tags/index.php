<?php
    require_once "../../protect_admin.php";

    use controllers\Filme_Tags_Controller;
    use controllers\Filmes_Controller;
    use controllers\Tags_Controller;

    require_once "../../../_controllers/filmes_controller.php";
    require_once "../../../_controllers/tags_controller.php";
    require_once "../../../_controllers/filme_tags_controller.php";

    $controller = new Filmes_Controller();
    $controller_tags = new Tags_Controller();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $id_filme = $_POST['id'];
        $tags = $_POST['tags'];

        $controller_ft = new Filme_Tags_Controller();

        $filme_tags = $controller->GetTags($id_filme);
        foreach ($filme_tags as $ft) {
            $controller_ft->Delete($ft['id']);
        }

        for ($i = 0; $i < count($tags); $i++) {
            $data = [
                'id_tag' => $tags[$i],
                'id_filme' => $id_filme,
            ];
            $controller_ft->Create($data);
        }

        require_once "../../../_config.php";
        require_once "../../../_util.php";
        redirect("$BASE_URL_ADM/filmes/info.php?id=$id_filme");

        die();
    }
    
    $id_filme = intval($_GET['id'] ?? 0);
    
    $filme = $controller->Get($id_filme);
    $filme_tags = $controller->GetTags($id_filme);

    $tags = $controller_tags->GetAll('descricao');

    $title = "Tags do Filme: ". $filme['titulo'];
    $childView = "./form.php";

    include("../../layout.php");
?>