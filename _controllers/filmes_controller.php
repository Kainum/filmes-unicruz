<?php
namespace controllers;

use PDOException;

require_once "controller.php";
require_once __DIR__."/../_session.php";

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
            $sql = "SELECT f.*, FORMAT(SUM(a.nota) / COUNT(a.nota), 2) as nota
                    FROM $this->table f
                    LEFT JOIN avaliacoes a ON f.id = a.id_filme
                    WHERE slug = :slug
                    GROUP BY f.id";

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

    function GetAvaliacoes ($id_filme) {
        $list = [];
        try {
            $sql = "SELECT a.comentario, a.nota, a.data_avaliacao, u.nome as usuario, u.foto as foto
                    FROM avaliacoes a
                    INNER JOIN usuarios u ON a.id_usuario = u.id
                    WHERE a.id_filme = :id_filme";

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