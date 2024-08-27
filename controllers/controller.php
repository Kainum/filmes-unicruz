<?php
namespace controllers;

use Connection;
use PDOException;

require_once __DIR__."/../_database/connection.php";
require_once __DIR__."/../session.php";

abstract class Controller {

    protected $table;
    protected $columns;

    protected $column_to_search;

    protected $conn;

    function __construct() {
        $this->conn = Connection::GetConnection();
    }

    function Get($id) {
        $obj = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";

            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $id);

            $query->execute();
            $obj = $query->fetch();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $obj;
    }

    function GetFromPage($page, $limit, $search_term = '', $orderBy = null) {
        $list = [];
        try {
            $where = '';
            if (strlen($search_term) !== 0) {
                $search_term = "%$search_term%";
                $where = "WHERE $this->column_to_search LIKE :search_term";
            }

            $sql = "SELECT * FROM $this->table $where ORDER BY " . ($orderBy ?? 'id') . " LIMIT $limit OFFSET " . $limit * ($page-1);

            $query = $this->conn->prepare($sql);

            if (strlen($search_term) !== 0) $query->bindParam(':search_term', $search_term);
            
            $query->execute();
            
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $list;
    }

    function GetAll($orderBy = null) {
        $list = [];
        try {
            $sql = "SELECT * FROM $this->table ORDER BY " . ($orderBy ?? 'id');
    
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $list;
    }

    function Create($data) {
        try {
            // nome, data_nascimento, nacionalidade, sexo
            $campos = implode(', ', $this->columns);

            // :nome, :data_nascimento, :nacionalidade, :sexo
            $valores = ':' . implode(', :', $this->columns);

            // INSERT INTO atores (nome, data_nascimento, nacionalidade, sexo) VALUES (:nome, :data_nascimento, :nacionalidade, :sexo)
            $sql = "INSERT INTO $this->table ($campos) VALUES ($valores)";

            $query = $this->conn->prepare($sql);

            /*
            $query->bindParam(':nome', $data['nome']);
            $query->bindParam(':data_nascimento', $data['data_nascimento']);
            $query->bindParam(':nacionalidade', $data['nacionalidade']);
            $query->bindParam(':sexo', $data['sexo']);
            */
            foreach ($this->columns as $column) {
                $query->bindParam(":$column", $data[$column]);
            }

            $query->execute();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }
    }

    function Update($data) {
        try {
            $campos_valores = [];
            foreach ($this->columns as $column) {
                array_push($campos_valores, "$column = :$column");
            }

            // nome = :nome, data_nascimento = :data_nascimento, nacionalidade = :nacionalidade, sexo = :sexo
            $set = implode(', ', $campos_valores);

            // UPDATE atores
            // SET nome = :nome, data_nascimento = :data_nascimento, nacionalidade = :nacionalidade, sexo = :sexo
            // WHERE id = :id;
            $sql = "UPDATE $this->table SET $set WHERE id = :id";

            $query = $this->conn->prepare($sql);
            
            foreach ($this->columns as $column) {
                $query->bindParam(":$column", $data[$column]);
            }
            $query->bindParam(':id', $data['id']);

            $query->execute();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }
    }

    function Delete($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
    
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $id);
    
            $query->execute();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }
    }

    function Count($search_term = '') {
        $where = '';
        if (strlen($search_term) !== 0) {
            $search_term = "%$search_term%";
            $where = "WHERE $this->column_to_search LIKE :search_term";
        }
        
        $count = 0;
        try {
            $sql = "SELECT COUNT(*) AS qtd FROM $this->table $where";
    
            $query = $this->conn->prepare($sql);

            if (strlen($search_term) !== 0) $query->bindParam(':search_term', $search_term);
    
            $query->execute();
            $count = $query->fetch()["qtd"];
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $count;
    }
}