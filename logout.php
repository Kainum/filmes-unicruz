<?php
require_once 'config.php';

if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: $BASE_URL");