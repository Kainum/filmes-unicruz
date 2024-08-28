<?php
namespace controllers;
namespace controllers;

require_once "controller.php";

class Filme_Tags_Controller extends Controller {

    protected $table = "filme_tags";

    protected $columns = [
        'id_filme',
        'id_tag',
    ];
    
}

?>