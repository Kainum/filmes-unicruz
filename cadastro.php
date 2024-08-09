<?php

if(isset($_POST['email']) || isset($_POST['senha']) || isset($_POST['nome'])) {
    require_once "connection.php";
    require_once "config.php";

    $conn = Connection::GetConnection();

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else if(strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome completo";
    } else {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        
        $query->execute();
        $quantidade = $query->rowCount();

        if($quantidade > 0) {
            echo "E-mail já cadastrado";
        } else {

            try {
                // cadastra o usuário
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    
                $query = $conn->prepare($sql);
                $query->bindParam(":nome", $nome);
                $query->bindParam(":email", $email);
                $query->bindParam(":senha", $senha);
    
                $query->execute();

                // busca o usuário para fazer login
                $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
                $query = $conn->prepare($sql);
                $query->bindParam(':email', $email);
                $query->bindParam(':senha', $senha);

                $query->execute();
                $usuario = $query->fetch();

                if(!isset($_SESSION)) {
                    session_start();
                }
    
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            header("Location: $BASE_URL");
            die();
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