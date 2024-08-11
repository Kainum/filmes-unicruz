<?php include_once "../../util.php"; ?>
<h2><?= $title ?></h2>
<a href="novo.php" class="btn btn-primary my-3">Cadastrar Filme</a>

<div class="d-flex mb-3 justify-content-between">
    <?php include_once __DIR__."/../../../_components/search_bar.php" ?>
    <?php include_once __DIR__."/../../../_components/counter.php" ?>
</div>

<table class="table table-bordered">
    <tr>
        <th class="text-end">Id</th>
        <th>Título</th>
        <th>Lançamento</th>
        <th>Duração</th>
        <th class="text-center">C. Indicativa</th>
        <th class="text-center">Elenco</th>
        <th class="text-center">Ações</th>
    </tr>
    <?php foreach ($list as $filme) { ?>
        <tr>
            <td class="text-end"><?= $filme["id"] ?></td>
            <td><?= $filme["titulo"] ?></td>
            <td><?= FormatarData($filme["data_lancamento"]) ?></td>
            <td><?= $filme["duracao"] ?> min</td>
            <td class="text-center"><?= FilmeClassInd($filme["class_ind"]) ?></td>
            <td class="text-center">
                <a href="<?= "$BASE_URL_ADM/elenco" ?>?filme_id=<?= $filme["id"] ?>">editar elenco</a>
            </td>
            <td class="text-center">
                <a href="editar.php?id=<?= $filme["id"] ?>">editar</a>
                <a class="link-excluir" data-bs-toggle="modal" data-bs-target="#delete-modal"
                    href="excluir.php?id=<?= $filme["id"] ?>">apagar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php include_once __DIR__."/../../../_components/paginator.php" ?>
<?php include __DIR__."/../../../_components/message_logger.php" ?>

<?php include __DIR__."/../../../_components/modal_delete.php" ?>