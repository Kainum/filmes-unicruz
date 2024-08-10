<?php

// require_once __DIR__."/../config.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id']) || !isset($_SESSION['admin']) || !$_SESSION['admin']) {
    http_response_code(403);
    die('Forbidden');
}

?>