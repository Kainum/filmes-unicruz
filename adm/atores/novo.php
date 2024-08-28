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
            Criar($validate);
        }
    }

    function Criar ($data) {
        // adicionar no banco
        $controller = new Atores_Controller();
        $controller->Create($data);

        require_once "../../_session.php";
        AdicionarMensagem('success', 'Ator <strong>criado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../_config.php";
        require_once "../../_util.php";
        redirect("$BASE_URL_ADM/atores");
    }

    $title = "Cadastrar Ator";
    $childView = "./views/form.php";
    $action = "novo";
    include("../layout.php");
    
?>