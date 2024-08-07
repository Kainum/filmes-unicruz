<?php

$MIN_LIMIT = 5;
$MAX_LIMIT = 50;
$DEFAULT_LIMIT = 10;

$page = intval($_GET["page"] ?? 1);
$limit = intval($_GET["limit"] ?? $DEFAULT_LIMIT);

$count = $controller->Count();
$last_page = ceil($count / $limit);

$page = max(1, $page);
$page = min($last_page, $page);

$limit = max($MIN_LIMIT, $limit);
$limit = min($MAX_LIMIT, $limit);

?>