<?php
namespace controllers;

require_once "controller.php";

class Papeis_Controller extends Controller {

    protected $table = "papeis";

    protected $columns = [
        'personagem',
        'id_filme',
        'id_ator',
    ];
    
}

?>