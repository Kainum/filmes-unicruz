<h1><?= $title ?></h1>
<form class="my-3 w-50" action="<?= $action ?>.php" method="post">
    <?php if (isset($obj)) { ?>
        <div class="my-3">
            <label class="form-label" for="id">Id</label>
            <input class="form-control" type="text" name="id" id="id" value="<?= $obj['id'] ?>" readonly>
        </div>
    <?php } ?>
    <div class="my-3">
        <label class="form-label" for="descricao">Descrição:</label>
        <input class="form-control" type="text" name="descricao" id="descricao" required
            value="<?= $obj['descricao'] ?? $_POST['descricao'] ?? '' ?>">
    </div>
    
    <button class="btn btn-success" type="submit"><?= isset($obj) ? 'Salvar' : 'Criar' ?></button>
    <a href=<?= "$BASE_URL_ADM/tags" ?> class="btn btn-secondary">Voltar</a>
</form>
<?php include __DIR__."/../../_components/message_logger.php" ?>