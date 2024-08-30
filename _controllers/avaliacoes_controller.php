<?php
namespace controllers;

use PDOException;

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

    function GetByUsuarioAndFilme($id_filme, $id_usuario) {
        $obj = [];
        try {
            $sql = "SELECT a.*
                    FROM avaliacoes a
                    INNER JOIN usuarios u ON a.id_usuario = u.id
                    WHERE a.id_filme = :id_filme AND a.id_usuario = :id_usuario";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_filme', $id_filme);
            $query->bindParam(':id_usuario', $id_usuario);

            $query->execute();
            $obj = $query->fetch();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $obj;
    }
    
}

?>