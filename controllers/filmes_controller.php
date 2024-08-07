<?php
namespace controllers;

require_once '../../connection.php';
require_once 'controller.php';

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
    
}

?>