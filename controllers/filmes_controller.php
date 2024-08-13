<?php
namespace controllers;

use PDOException;

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


    function GetTags ($id_filme) {
        $list = [];
        try {
            $sql = "SELECT t.id, t.descricao
                    FROM filme_tags ft
                    INNER JOIN tags t ON ft.id_tag = t.id
                    WHERE ft.id_filme = :id_filme";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_filme', $id_filme);

            $query->execute();
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $list;
    }

    function GetPapeis ($id_filme) {
        $list = [];
        try {
            $sql = "SELECT a.id, a.nome as ator, p.personagem
                    FROM papeis p
                    INNER JOIN atores a ON p.id_ator = a.id
                    WHERE p.id_filme = :id_filme";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_filme', $id_filme);

            $query->execute();
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $list;
    }
    
}

?>