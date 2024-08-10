<?php

require_once __DIR__."/../config.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    require_once __DIR__."/../util.php";
    redirect("$BASE_URL/login.php");
}

?>