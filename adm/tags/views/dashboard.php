<?php include_once "../../util.php"; ?>
<h2><?= $title ?></h2>
<a href="novo.php" class="btn btn-primary my-3">Cadastrar Tag</a>

<div class="d-flex mb-3 justify-content-between">
    <?php include_once "../_components/search_bar.php" ?>
    <?php include_once "../_components/counter.php" ?>
</div>

<table class="table table-bordered">
    <tr>
        <th class="text-end">Id</th>
        <th>Descrição</th>
        <th class="text-center">Ações</th>
    </tr>
    <?php foreach ($list as $tag) { ?>
        <tr>
            <td class="text-end"><?= $tag["id"] ?></td>
            <td><?= $tag["descricao"] ?></td>
            <td class="text-center">
                <a href="editar.php?id=<?= $tag["id"] ?>">editar</a>
                <a href="excluir.php?id=<?= $tag["id"] ?>">apagar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php include_once "../_components/paginator.php" ?>