<?php
namespace controllers;

require_once '../../connection.php';
require_once 'controller.php';

class Tags_Controller extends Controller {

    protected $table = "tags";

    protected $columns = [
        'descricao',
    ];
    
}

?>