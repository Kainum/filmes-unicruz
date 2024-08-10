<?php

use controllers\Usuarios_Controller;

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else if(strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome completo";
    } else {
        Cadastrar();
    }
}

function Cadastrar () {
    require_once "config.php";
    require_once "./controllers/usuarios_controller.php";

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $controller = new Usuarios_Controller();
    $quantidade = $controller->CountByEmail($email);

    if($quantidade > 0) {
        echo "E-mail já cadastrado";
    } else {
        try {
            $data = [
                'email' => $email,
                'senha' => $senha,
                'foto'  => '',
                'admin' => false,
            ];

            // cadastra o usuário
            $controller->Create($data);

            // faz o login automaticamente
            require_once "session.php";
            FazerLogin($email, $senha);

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Cadastro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #card {
            padding: 5rem;
        }
    </style>
</head>
<body class="min-vh-100 m-0">
    <main class="container shadow-lg vh-100">
        <div class="row" id="card">
            <h2 class="mb-4">Fazer Cadastro</h2>
            <form action="cadastro.php" method="POST" enctype="multipart/form-data" class="col-6">
                <div class="d-flex flex-column gap-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="José da Silva" required>
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" type="password" name="senha" id="senha" placeholder="password" required minlength="8">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="input-group">
                        <label class="input-group-text" for="foto">Foto de Perfil</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/png, image/jpeg">
                    </div>
                </div>
                <button class="btn btn-primary mt-4 py-2 px-4 rounded-3" type="submit">Cadastrar</button>
                <div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>