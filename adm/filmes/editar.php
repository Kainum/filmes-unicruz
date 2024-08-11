<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;

    require_once "../../controllers/filmes_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        require_once "../../validate.php";
        $validate = validate([
            'titulo' => [$_POST['titulo'], [
                ['required', 'Preencha o título.'],
                ['minlen:3', ],
            ]],
            'data_lancamento' => [$_POST['data_lancamento'], [
                ['required', ],
            ]],
        ]);

        if ($validate) {
            $validate['duracao'] = $_POST['duracao'];
            $validate['class_ind'] = $_POST['class_ind'];
            $validate['sinopse'] = $_POST['sinopse'];
            $validate['imagem'] = $_POST['imagem'];
            
            Atualizar($validate);
        }
    }

    function Atualizar ($data) {
        $data['id'] = $_POST['id'];

        // atualiza no banco
        $controller = new Filmes_Controller();
        $controller->Update($data);

        require_once "../../session.php";
        AdicionarMensagem('success', 'Filme <strong>atualizado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/filmes");
    }

    $title = "Editar Filme";
    $childView = "./views/form.php";
    $action = "editar";

    $controller = new Filmes_Controller();

    if ($method == 'GET') {
        $GLOBALS['obj'] = $controller->Get($_GET['id']);
    }
    
    include("../layout.php");
    
?>