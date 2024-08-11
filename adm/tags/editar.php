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
            Atualizar($validate);
        }
    }

    function Atualizar ($data) {
        $data['id'] = $_POST['id'];

        // atualiza no banco
        $controller = new Tags_Controller();
        $controller->Update($data);

        require_once "../../session.php";
        AdicionarMensagem('success', 'Tag <strong>atualizado</strong> com sucesso.');

        // redireciona para o index
        require_once "../../config.php";
        require_once "../../util.php";
        redirect("$BASE_URL_ADM/tags");
    }

    $title = "Editar Tag";
    $childView = "./views/form.php";
    $action = "editar";

    $controller = new Tags_Controller();

    if ($method == 'GET') {
        $GLOBALS['obj'] = $controller->Get($_GET['id']);
    }
    
    include("../layout.php");
    
?>