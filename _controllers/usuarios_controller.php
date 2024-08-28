<?php
namespace controllers;

use PDOException;

require_once "controller.php";
require_once __DIR__."/../_session.php";

class Usuarios_Controller extends Controller {

    protected $table = "usuarios";

    protected $columns = [
        'nome',
        'email',
        'senha',
        'foto',
        'admin',
    ];

    protected $column_to_search = 'nome';
    
    function GetLogin ($email, $senha) {
        $usuario = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE email = :email AND senha = :senha";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':email', $email);
            $query->bindParam(':senha', $senha);

            $query->execute();
            $usuario = $query->fetch();
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }
        
        return $usuario;
    }

    function CountByEmail ($email) {
        $count = 0;
        try {
            $sql = "SELECT COUNT(email) AS qtd FROM $this->table WHERE email = :email";
            $query = $this->conn->prepare($sql);

            $query->bindParam(':email', $email);
    
            $query->execute();
            $count = $query->fetch()["qtd"];
        } catch(PDOException $e) {
            AdicionarMensagem('danger', "Error: " . $e->getMessage());
        }

        return $count;
    }

}

?>