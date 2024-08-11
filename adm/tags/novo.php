<?php
    require_once "../protect_admin.php";

    use controllers\Tags_Controller;

    require_once "../../controllers/tags_controller.php";

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {

        require_once "../../validate.php";
        $validate = validate([
            'descricao' => [$_POST['descricao'], [
                ['required', 'Preencha a descrição.'],
            ]],
        ]);

        if ($validate) {
            Criar($validate);
        }
    }

    function Criar ($data) {
        // adicionar no banco
        $controller = new Tags_Controller();
        $controller->Create($data);

        require_once "../../session.php";
        AdicionarMensagem('success', 'Tag <strong>criado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/tags");
    }

    $title = "Cadastrar Tag";
    $childView = "./views/form.php";
    $action = "novo";
    include("../layout.php");
    
?>