<?php

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
    switch ($s) {
        case 'm':
            return 'Masculino';
        case 'f':
            return 'Feminino';
        case 'o':
            return 'Outro';
        default:
            return '';
    }
}

?>