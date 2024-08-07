<?php include_once "../../util.php"; ?>
<h2><?= $title ?></h2>
<a href="novo.php" class="btn btn-primary my-3">Cadastrar Filme</a>
<table class="table table-bordered">
    <tr>
        <th class="text-end">Id</th>
        <th>Título</th>
        <th>Lançamento</th>
        <th>Duração</th>
        <th class="text-center">C. Indicativa</th>
        <th class="text-center">Ações</th>
    </tr>
    <?php foreach ($list as $filme) { ?>
        <tr>
            <td class="text-end"><?= $filme["id"] ?></td>
            <td><?= $filme["titulo"] ?></td>
            <td><?= FormatarData($filme["data_lancamento"]) ?></td>
            <td><?= $filme["duracao"] ?> min</td>
            <td class="text-center"><?= $filme["class_ind"] ?></td>
            <td class="text-center">
                <a href="editar.php?id=<?= $filme["id"] ?>">editar</a>
                <a href="excluir.php?id=<?= $filme["id"] ?>">apagar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php include_once '../_components/paginator.php' ?>