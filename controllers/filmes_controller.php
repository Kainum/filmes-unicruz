<?php
namespace controllers;

require_once "controller.php";

class Filmes_Controller extends Controller {

    protected $table = "filmes";

    protected $columns = [
        'titulo',
        'data_lancamento',
        'duracao',
        'class_ind',
        'sinopse',
        'imagem',
    ];

    protected $column_to_search = 'titulo';
    
}

?>