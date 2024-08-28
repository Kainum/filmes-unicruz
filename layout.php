<?php
    require_once __DIR__."/_config.php";
    require_once __DIR__."/_session.php";

?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-bottom: 15rem;
        }
        header, footer {
            background-color: #121212;
        }
    </style>
</head>
<body class="position-relative min-vh-100 m-0 bg-black text-white">
    <header>
        <nav class="container d-flex gap-4 py-2">
            <a class="text-white fs-4 align-content-center" href=<?= "$BASE_URL/" ?>>HOME</a>
            <?php
                $action = $BASE_URL;
                include __DIR__."/_components/search_bar.php";
            ?>
            <?php if (!EstaLogado()) { ?>
                <div class="ms-auto align-content-center">
                    <span>
                        Faça <a class="text-white" href=<?= "$BASE_URL/login.php" ?>>Login</a> ou 
                        <a class="text-white" href=<?= "$BASE_URL/cadastro.php" ?>>Cadastre-se</a>
                    </span>
                </div>
            <?php } else { ?>
                <div class="ms-auto d-flex gap-3 align-items-center">
                    <a class="text-white" href=<?= "$BASE_URL/meu_perfil" ?>>Meu Perfil</a>
                    <span>Fazer <a class="text-white" href=<?= "$BASE_URL/logout.php" ?>>Logout</a></span>
                </div>
            <?php } ?>
        </nav>
    </header>
    <main>
        <div class="container pt-3">
            <?php include($childView); ?>
        </div>
    </main>
    <footer class="position-absolute bottom-0 start-0 end-0 pb-4 pt-5 text-center">
        <p class="text-white">
            © <?= date("Y") ?> <a class="text-white" href="https://home.unicruz.edu.br/">Universidade de Cruz Alta</a> - UNICRUZ Campus
            <br>Rodovia Municipal Jacob Della Méa, km 5.6 - Parada Benito
            <br>Cruz Alta - Rio Grande do Sul - CEP 98005-972
            <br>55 3321-1500
        </p>
    </footer>
</body>
</html>