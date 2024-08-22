<?php
namespace controllers;

use PDOException;

require_once "controller.php";
require_once __DIR__."/../session.php";

class Filmes_Controller extends Controller {

    protected $table = "filmes";

    protected $columns = [
        'titulo',
        'data_lancamento',
        'duracao',
        'class_ind',
        'sinopse',
        'imagem',
        'slug',
    ];

    protected $column_to_search = 'titulo';

    function GetBySlug($slug) {
        $obj = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE slug = :slug";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':slug', $slug);

            $query->execute();
            $obj = $query->fetch();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $obj;
    }

    function GetDestaques() {
        $list = [];
        try {
            $sql = "SELECT * FROM $this->table ORDER BY data_lancamento DESC LIMIT 10";
    
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $list;
    }


    function GetTags ($id_filme) {
        $list = [];
        try {
            $sql = "SELECT ft.id as id, t.id as id_tag, t.descricao
                    FROM filme_tags ft
                    INNER JOIN tags t ON ft.id_tag = t.id
                    WHERE ft.id_filme = :id_filme";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_filme', $id_filme);

            $query->execute();
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $list;
    }

    function GetPapeis ($id_filme) {
        $list = [];
        try {
            $sql = "SELECT p.id as id, a.id as id_ator, a.nome as ator, p.personagem
                    FROM papeis p
                    INNER JOIN atores a ON p.id_ator = a.id
                    WHERE p.id_filme = :id_filme";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_filme', $id_filme);

            $query->execute();
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $list;
    }
    
}

?>