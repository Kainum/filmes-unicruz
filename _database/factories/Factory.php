<?php

abstract class Factory {

    function Get () {
        return [];
    }

    function GetMany($qtd) {

        $list = [];
        for ($i = 0; $i < $qtd; $i++) {
            array_push($list, $this->Get());
        }

        return $list;
    }

}

?>