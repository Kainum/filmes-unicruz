<h1><?= $title ?></h1>
<form class="my-3 w-50" action="<?= $action ?>.php" method="post">
    <?php if (isset($obj)) { ?>
        <div class="my-3">
            <label class="form-label" for="id">Id</label>
            <input class="form-control" type="text" name="id" id="id" value="<?= $obj['id'] ?>" readonly>
        </div>
    <?php } ?>
    <div class="my-3">
        <label class="form-label" for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" id="nome" value="<?= $obj['nome'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="data_nascimento">Data de Nascimento:</label>
        <input class="form-control" type="date" name="data_nascimento" id="data_nascimento" value="<?= $obj['data_nascimento'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="nacionalidade">Nacionalidade:</label>
        <input class="form-control" type="text" name="nacionalidade" id="nacionalidade" value="<?= $obj['nacionalidade'] ?? '' ?>">
    </div>
    <div class="my-3">
        <label class="form-label" for="sexo">Sexo:</label><br>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sexo" id="sexo1" value="m" required <?= ($obj['sexo'] ?? '') == 'm' ? 'checked' : '' ?>>
            <label class="form-check-label" for="sexo1">M</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sexo" id="sexo2" value="f" required <?= ($obj['sexo'] ?? '') == 'f' ? 'checked' : '' ?>>
            <label class="form-check-label" for="sexo2">F</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" name="sexo" id="sexo3" value="o" required <?= ($obj['sexo'] ?? '') == 'o' ? 'checked' : '' ?>>
            <label class="form-check-label" for="sexo3">outro</label>
        </div>
    </div>
    <button class="btn btn-success" type="submit"><?= isset($obj) ? 'Salvar' : 'Criar' ?></button>
    <a href=<?= "$BASE_URL_ADM/atores" ?> class="btn btn-secondary">Voltar</a>
</form>