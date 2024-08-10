<?php
namespace controllers;

require_once "controller.php";

class Atores_Controller extends Controller {

    protected $table = "atores";

    protected $columns = [
        'nome',
        'data_nascimento',
        'nacionalidade',
        'sexo',
    ];

    protected $column_to_search = 'nome';
    
}

?>