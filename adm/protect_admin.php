<?php

require_once '../config.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: $BASE_URL/login.php");
    die();
}

?>