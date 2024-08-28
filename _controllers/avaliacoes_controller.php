<?php
namespace controllers;

require_once "controller.php";

class Avaliacoes_Controller extends Controller {

    protected $table = "avaliacoes";

    protected $columns = [
        'comentario',
        'nota',
        'data_avaliacao',
        'id_filme',
        'id_usuario',
    ];
    
}

?>