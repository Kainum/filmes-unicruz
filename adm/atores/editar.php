<?php
    require_once "../protect_admin.php";

    use controllers\Atores_Controller;

    require_once "../../_controllers/atores_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        require_once "../../_validate.php";
        $validate = validate([
            'nome' => [$_POST['nome'], [
                ['required', 'Preencha o nome.'],
            ]],
            'data_nascimento' => [$_POST['data_nascimento'], [
                ['required', 'Preencha a data de nascimento.'],
            ]],
            'nacionalidade' => [$_POST['nacionalidade'], [
                ['required', 'Preencha a nacionalidade.'],
            ]],
            'sexo' => [$_POST['sexo'], [
                ['required', 'Preencha o sexo.'],
                ['maxlen:1', ],
            ]],
        ]);

        if ($validate) {
            $validate['foto'] = '';
            Atualizar($validate);
        }
    }

    function Atualizar ($data) {
        $data['id'] = $_POST['id'];
        
        // atualiza no banco
        $controller = new Atores_Controller();
        $controller->Update($data);

        require_once "../../_session.php";
        AdicionarMensagem('success', 'Ator <strong>atualizado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../_config.php";
        require_once "../../_util.php";
        redirect("$BASE_URL_ADM/atores");
    }

    $title = "Editar Ator";
    $childView = "./views/form.php";
    $action = "editar";

    $controller = new Atores_Controller();

    if ($method == 'GET') {
        $GLOBALS['obj'] = $controller->Get($_GET['id']);
    }
    
    include("../layout.php");
    
?>