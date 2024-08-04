<?php
namespace controllers;

use Connection;
use PDOException;

require_once '../../connection.php';

class Ator_Controller {

    private $table = "atores";
    private $columns = [
        'nome',
        'data_nascimento',
        'nacionalidade',
        'sexo',
    ];

    private $conn;

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
            echo "Error: " . $e->getMessage();
        }

        return $obj;
    }

    function GetAll() {
        $list = [];
        try {
            $sql = "SELECT * FROM $this->table";
    
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $list = $query->fetchAll();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
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
            echo "Error: " . $e->getMessage();
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
                echo $data[$column];
            }
            $query->bindParam(':id', $data['id']);

            echo $data['id'];
            $query->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function Delete($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = :id";
    
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $id);
    
            $query->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>