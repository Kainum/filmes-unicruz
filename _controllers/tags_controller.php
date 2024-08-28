<?php
namespace controllers;

require_once "controller.php";

class Tags_Controller extends Controller {

    protected $table = "tags";

    protected $columns = [
        'descricao',
    ];

    protected $column_to_search = 'descricao';
    
}

?>