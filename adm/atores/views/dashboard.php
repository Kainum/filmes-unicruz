<?php include_once "../../util.php"; ?>
<h2><?= $title ?></h2>
<a href="novo.php" class="btn btn-primary my-3">Cadastrar Ator</a>
<table class="table table-bordered">
    <tr>
        <th class="text-end">Id</th>
        <th>Ator</th>
        <th>Data de Nascimento</th>
        <th>Nacionalidade</th>
        <th>Sexo</th>
        <th class="text-center">Ações</th>
    </tr>
    <?php foreach ($list as $ator) { ?>
        <tr>
            <td class="text-end"><?= $ator["id"] ?></td>
            <td><?= $ator["nome"] ?></td>
            <td><?= FormatarData($ator["data_nascimento"]) ?></td>
            <td class="text-capitalize"><?= $ator["nacionalidade"] ?></td>
            <td><?= $ator["sexo"] ?></td>
            <td class="text-center">
                <a href="editar.php?id=<?= $ator["id"] ?>">editar</a>
                <a href="excluir.php?id=<?= $ator["id"] ?>">apagar</a>
            </td>
        </tr>
    <?php } ?>
</table>