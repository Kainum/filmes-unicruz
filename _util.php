<?php

function FotoPerfil ($fileName) {
    require __DIR__."/_config.php";
    if (!empty($fileName)) {
        return "$STORAGE_FOTOS_URL/$fileName";
    } else {
        return "$STORAGE_URL/no_profile_picture.png";
    }
}

function HoraAtual () {
    date_default_timezone_set("America/Sao_Paulo");
    return date('H:i');
}

function FormatarData($data) {
    if ($data == "0000-00-00") return '';

    $nova_data = date_create($data);
    return date_format($nova_data, "d/m/Y");
}

function AtorSexo($s) {
    $dictionary = [
        'm' => 'Masculino',
        'f' => 'Feminino',
        'o' => 'Outro',
    ];
    return $dictionary[strtolower($s)] ?? '';
}

function FilmeClassInd($ci) {
    switch ($ci) {
        case 0:
            return 'Livre';
        case 10 || 12 || 14 || 16 || 18:
            return "+$ci";
        default:
            return '';
    }
}

function redirect ($url) {
    header("Location: $url");
    die();
}

?>