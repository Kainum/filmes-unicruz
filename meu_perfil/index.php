<?php
    use controllers\Usuarios_Controller;

    require_once "../session.php";
    $method = $_SERVER['REQUEST_METHOD'];

    $usuario = UsuarioAtivo();

    if ($method == 'POST') {
        require_once "../controllers/usuarios_controller.php";
        $controller = new Usuarios_Controller();

        $login = $controller->GetLogin($usuario['email'], md5($_POST['senha_atual']));

        if ($login) {
            require_once "../validate.php";

            $validate = [
                'nome'  => [$_POST['nome'], [
                    ['required', 'O campo nome é obrigatório.'],
                ]],
            ];

            if (strlen($_POST['nova_senha']) > 0) {
                $validate['senha'] = [$_POST['nova_senha'], [
                    ['required', 'Informe uma senha.'],
                    ['minlen:8', 'A senha deve possuir ao menos 8 caracteres.'],
                ]];
            }

            $validate = validate($validate);

            if ($validate) {
                $validate['id'] =       $usuario['id'];
                $validate['email'] =    $usuario['email'];
                $validate['senha'] =    isset($validate['senha']) ? md5($validate['senha']) : $usuario['senha'];
                $validate['foto'] =     '';
                $validate['admin'] =    $usuario['admin'];
                Atualizar($validate);
            }
        } else {
            if (!isset($GLOBALS['msgs'])){
                $GLOBALS['msgs'] = [];
            }
            AdicionarMensagem('danger', 'Senha atual incorreta.');
        }

    }

    function Atualizar ($data) {
        // cadastra o usuário
        $GLOBALS['controller']->Update($data);

        // faz o login automaticamente
        FazerLogin($data['email'], $data['senha']);
    }

    $title = "Meu Pefil";
    $childView = "../views/meu_perfil.php";

    include("../layout.php");
?>