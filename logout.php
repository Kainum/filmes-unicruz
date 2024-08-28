<?php
require_once "_config.php";

require_once "_session.php";
FazerLogout();

require_once "_util.php";
redirect($BASE_URL);