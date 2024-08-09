<?php

if(isset($_POST['email']) || isset($_POST['senha'])) {
    require_once "connection.php";
    require_once "config.php";

    $conn = Connection::GetConnection();

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $senha);
        
        $query->execute();
        $quantidade = $query->rowCount();

        if($quantidade == 1) {
            
            $usuario = $query->fetch();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: $BASE_URL");
            die();

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
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
    <title>Fazer Login</title>

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
    <main class="d-flex vh-100 align-items-center justify-content-center">
        <div class="shadow-lg" id="card">
            <h2 class="text-center mb-4">Fazer Login</h2>
            <form action="login.php" method="POST" class="d-flex flex-column gap-3">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email">E-mail</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="password" required>
                    <label for="senha">Senha</label>
                </div>
                <div class="d-flex my-1">
                    <button class="btn btn-primary py-2 px-4 rounded-3 mx-auto" type="submit">Entrar</button>
                </div>
                <p class="text-center">
                    <a href="cadastro.php">Criar conta</a>
                </p>
            </form>
        </div>
    </main>
</body>
</html>