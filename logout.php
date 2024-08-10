<?php
require_once "config.php";

if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

require_once "util.php";
redirect($BASE_URL);