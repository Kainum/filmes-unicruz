<?php
    use controllers\Filmes_Controller;
    use controllers\Avaliacoes_Controller;
    require_once "../_controllers/filmes_controller.php";
    require_once "../_controllers/avaliacoes_controller.php";

    $controller = new Filmes_Controller();

    $slug = $_GET['filme'] ?? '';

    $filme = $controller->GetBySlug($slug);

    $controller_avaliacoes = new Avaliacoes_Controller();

    $avaliacao_do_usuario = null;
    require_once "../_session.php";
    if (EstaLogado()) {
        $id_usuario = $_SESSION['id'];
        $avaliacao_do_usuario = $controller_avaliacoes->GetByUsuarioAndFilme($filme['id'], $id_usuario);
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method == 'POST') {
            $data = [
                'comentario'        => $_POST['comentario'],
                'nota'              => $_POST['nota'],
                'data_avaliacao'    => date("Y-m-d"),
                'id_filme'          => $filme['id'],
                'id_usuario'        => $id_usuario,
                'id'                => $avaliacao_do_usuario['id'] ?? null,
            ];

            if ($avaliacao_do_usuario) {
                $controller_avaliacoes->Update($data);
            } else {
                $controller_avaliacoes->Create($data);
            }
            $avaliacao_do_usuario = $data;
        }
    }

    $tags = $controller->GetTags($filme['id']);
    $elenco = $controller->GetPapeis($filme['id']);
    $avaliacoes = $controller->GetAvaliacoes($filme['id']);

    $title = "Filme: " . $filme['titulo'];
    $childView = "../views/filme.php";

    include("../layout.php");
?>