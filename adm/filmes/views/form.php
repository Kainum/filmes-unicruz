<h1><?= $title ?></h1>
<form class="my-3 w-50" action="<?= $action ?>.php" method="post">
    <?php if (isset($obj)) { ?>
        <div class="my-3">
            <label class="form-label" for="id">Id</label>
            <input class="form-control" type="text" name="id" id="id" value="<?= $obj['id'] ?>" readonly>
        </div>
    <?php } ?>
    <div class="my-3">
        <label class="form-label" for="titulo">Título:</label>
        <input class="form-control" type="text" name="titulo" id="titulo" value="<?= $obj['titulo'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="data_lancamento">Data de Lançamento:</label>
        <input class="form-control" type="date" name="data_lancamento" id="data_lancamento" value="<?= $obj['data_lancamento'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="duracao">Duração (minutos):</label>
        <input class="form-control" type="number" name="duracao" id="duracao" value="<?= $obj['duracao'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="class_ind">Classificação Indicativa:</label>
        <select class="form-select" name="class_ind" id="class_ind">
            <option value="0"  <?= ($obj['class_ind'] ?? '') == 0  ? 'selected' : '' ?>>Livre</option>
            <option value="10" <?= ($obj['class_ind'] ?? '') == 10 ? 'selected' : '' ?>>+10</option>
            <option value="12" <?= ($obj['class_ind'] ?? '') == 12 ? 'selected' : '' ?>>+12</option>
            <option value="14" <?= ($obj['class_ind'] ?? '') == 14 ? 'selected' : '' ?>>+14</option>
            <option value="16" <?= ($obj['class_ind'] ?? '') == 16 ? 'selected' : '' ?>>+16</option>
            <option value="18" <?= ($obj['class_ind'] ?? '') == 18 ? 'selected' : '' ?>>+18</option>
        </select>
    </div>
    <div class="my-3">
        <label class="form-label" for="sinopse">Sinopse:</label>
        <textarea class="form-control" name="sinopse" id="sinopse" rows="5"><?= $obj['sinopse'] ?? '' ?></textarea>
    </div>
    <div class="my-3">
        <label class="form-label" for="imagem">URL da imagem:</label>
        <input class="form-control" type="text" name="imagem" id="imagem" value="<?= $obj['imagem'] ?? '' ?>">
    </div>
    
    <button class="btn btn-success" type="submit"><?= isset($obj) ? 'Salvar' : 'Criar' ?></button>
    <a href=<?= "$BASE_URL_ADM/filmes" ?> class="btn btn-secondary">Voltar</a>
</form>