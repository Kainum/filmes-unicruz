<?php

use controllers\Usuarios_Controller;

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {

    require_once "validate.php";
    $validate = validate([
        'nome'  => [$_POST['nome'], [
            ['required', 'O campo nome é obrigatório.'],
        ]],
        'email' => [$_POST['email'], [
            ['email', ],
            ['unique:usuarios', 'O e-mail informado já está cadastrado.'],
        ]],
        'senha' => [$_POST['senha'], [
            ['required', 'Informe uma senha.'],
            ['minlen:8', 'A senha deve possuir ao menos 8 caracteres.'],
        ]],
    ]);

    if ($validate) {
        Cadastrar($validate);
    }
}

function Cadastrar ($data) {
    $data['senha'] = md5($data['senha']);
    $data['foto'] = '';
    $data['admin'] = false;

    require_once "./controllers/usuarios_controller.php";
    $controller = new Usuarios_Controller();

    // cadastra o usuário
    $controller->Create($data);

    // faz o login automaticamente
    require_once "session.php";
    FazerLogin($data['email'], $data['senha']);
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
<body class="min-vh-100 m-0 position-relative">
    <main class="container shadow-lg vh-100">
        <div class="row" id="card">
            <h2 class="mb-4">Fazer Cadastro</h2>
            <form action="cadastro.php" method="POST" enctype="multipart/form-data" class="col-6">
                <div class="d-flex flex-column gap-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="José da Silva" required
                            value="<?= $_POST['nome'] ?? '' ?>">
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required
                            value="<?= $_POST['email'] ?? '' ?>">
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
    <div class="position-fixed bottom-0 end-0 p-3 d-flex flex-column-reverse gap-2">
        <?php foreach($msgs ?? [] as $field => $msg) { ?>
            <div class="toast bg-<?= $msg['tipo'] ?> show">
                <div class="toast-header">
                    <strong class="me-auto">Mensagem</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    <p class="text-white"><?= $msg['msg'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>