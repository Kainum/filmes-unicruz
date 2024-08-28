<?php include_once "../../_util.php"; ?>
<h2><?= $title ?></h2>

<div class="d-flex mb-3 justify-content-between">
    <?php include_once __DIR__."/../../../_components/search_bar.php" ?>
    <?php include_once __DIR__."/../../../_components/counter.php" ?>
</div>

<table class="table table-bordered">
    <tr>
        <th class="text-end">Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th class="text-center">Admin</th>
        <th class="text-center">Ações</th>
    </tr>
    <?php foreach ($list as $usuario) { ?>
        <tr>
            <td class="text-end"><?= $usuario["id"] ?></td>
            <td><?= $usuario["nome"] ?></td>
            <td><?= $usuario["email"] ?></td>
            <td class="text-center text-<?= $usuario["admin"] ? 'success' : 'danger' ?>"><?= $usuario["admin"] ? 'Sim' : 'Não' ?></td>
            <td class="text-center">
                <a class="link-excluir" data-bs-toggle="modal" data-bs-target="#delete-modal"
                    href="excluir.php?id=<?= $usuario["id"] ?>">apagar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php include_once __DIR__."/../../../_components/paginator.php" ?>
<?php include __DIR__."/../../../_components/message_logger.php" ?>

<?php include __DIR__."/../../../_components/modal_delete.php" ?>