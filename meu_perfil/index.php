<?php
    use controllers\Usuarios_Controller;

    require_once "../_session.php";
    $method = $_SERVER['REQUEST_METHOD'];

    $usuario = UsuarioAtivo();

    if ($method == 'POST') {
        require_once "../_controllers/usuarios_controller.php";
        $controller = new Usuarios_Controller();

        $login = $controller->GetLogin($usuario['email'], md5($_POST['senha_atual']));

        if ($login) {
            require_once "../_validate.php";

            $validate = [
                'nome'  => [$_POST['nome'], [
                    ['required', 'O campo nome é obrigatório.'],
                ]],
            ];

            if (!empty($_POST['nova_senha'])) {
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
                $validate['foto'] =     UploadFoto() ?? $usuario['foto'];
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

        AdicionarMensagem('success', 'Perfil alterado com sucesso.');

        // faz o login automaticamente
        FazerLogin($data['email'], $data['senha']);
    }

    function UploadFoto () {
        $foto = $_FILES['foto'];
        $name = $foto['name'];
        $tmp_name = $foto['tmp_name'];
    
        if (!empty($tmp_name)) {
            require_once "../_config.php";
    
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $newName = uniqid() . '.' . $extension;
    
            move_uploaded_file($tmp_name,"$STORAGE_FOTOS/$newName");
    
            return $newName;
        }
    
        return null;
    }

    $title = "Meu Pefil";
    $childView = "../views/meu_perfil.php";

    include("../layout.php");
?>