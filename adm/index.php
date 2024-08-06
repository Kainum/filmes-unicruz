<?php
    require_once 'protect.php';

    $title = "Dashboard";
    $childView = "./dashboard.php";
    $nome_usuario = $_SESSION['nome'];
    include("./layout.php");
?>