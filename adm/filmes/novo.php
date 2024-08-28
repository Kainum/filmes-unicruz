<?php
    require_once "../protect_admin.php";

    use controllers\Filmes_Controller;

    require_once "../../_controllers/filmes_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {

        require_once "../../_validate.php";
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
            
            Criar($validate);
        }
    }

    function Criar ($data) {
        // adicionar no banco
        $controller = new Filmes_Controller();
        $controller->Create($data);

        require_once "../../_session.php";
        AdicionarMensagem('success', 'Filme <strong>criado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../_config.php";
        require_once "../../_util.php";
        redirect("$BASE_URL_ADM/filmes");
    }

    $title = "Cadastrar Filme";
    $childView = "./views/form.php";
    $action = "novo";
    include("../layout.php");
    
?>