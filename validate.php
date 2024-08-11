<?php

$msgs = [];

function validate(array $validations) {
    $result = [];
    foreach ($validations as $field => $validation) {
        $dado = $validation[0];
        $validacoes_do_dado = $validation[1];

        foreach ($validacoes_do_dado as $validate) {
            $msg = $validate[1] ?? null;
            $funcao = $validate[0];

            if (str_contains($funcao, ':')) {
                [$funcao, $params] = explode(':', $funcao);
                $result[$field] = $funcao($dado, $params, $msg, $field);
            } else {
                $result[$field] = $funcao($dado, $msg, $field);
            }

        }
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}

// ======================================================================================

function required($dado, $msg, $field) {
    if ($dado === '') {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "Campo requerido [$field] não preenchido."]);
        return false;
    }

    return htmlspecialchars($dado); // sanitiza string
}

function email($dado, $msg, $field) {
    $emailIsValid = filter_var($dado, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "Não é um e-mail válido: \"$dado\""]);
        return false;
    }

    return htmlspecialchars($dado); // sanitiza string
}

function unique($dado, $param, $msg, $field) {
    $dado = htmlspecialchars($dado);
    $count = 1;
    
    try {
        require_once __DIR__."/connection.php";
        $conn = Connection::GetConnection();

        $sql = "SELECT COUNT($field) as qtd FROM $param WHERE $field = :$field";

        $query = $conn->prepare($sql);
        $query->bindParam(":$field", $dado);

        $query->execute();
        $count = $query->fetch()['qtd'];
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($count > 0) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "O valor $dado informado já existe."]);
        return false;
    }

    return $dado;
}

function minlen($dado, $param, $msg, $field) {
    if (strlen($dado) < $param) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "O campo $field precisa ter pelo menos $param caracteres."]);
        return false;
    }

    return htmlspecialchars($dado); // sanitiza string
}

function maxlen($dado, $param, $msg, $field) {
    if (strlen($dado) > $param) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "O campo $field precisa ter no máximo $param caracteres."]);
        return false;
    }

    return htmlspecialchars($dado); // sanitiza string
}

function minvalue($dado, $param, $msg, $field) {
    if (floatval($dado) < floatval($param)) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "O campo $field precisa ser maior que $param."]);
        return false;
    }

    return filter_var($dado, FILTER_VALIDATE_FLOAT);
}

function maxvalue($dado, $param, $msg, $field) {
    if (floatval($dado) > floatval($param)) {
        array_push($GLOBALS['msgs'], ['tipo' => 'danger', 'msg' => $msg ?? "O campo $field precisa ser menor que $param."]);
        return false;
    }

    return filter_var($dado, FILTER_VALIDATE_FLOAT);
}

?>