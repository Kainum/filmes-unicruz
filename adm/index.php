<?php
    require_once 'protect_admin.php';

    $title = "Dashboard";
    $childView = "./dashboard.php";
    $nome_usuario = $_SESSION['nome'];
    include("./layout.php");
?>