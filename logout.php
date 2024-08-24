<?php
require_once "config.php";

require_once "session.php";
FazerLogout();

require_once "util.php";
redirect($BASE_URL);