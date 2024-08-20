<div class="d-flex border-top border-bottom shadow-sm gap-3 px-3 pt-1 rounded">
    <div class="w-50">
        <label class="form-label" for="personagem">Personagem:</label>
        <input class="form-control" name="personagens[]" id="personagem" type="text" minlength="3" required value="<?= $filme_papel['personagem'] ?? '' ?>">
    </div>
    <div class="w-50">
        <label class="form-label" for="ator">Ator:</label>
        <select class="selectpicker form-control w-100 mb-3" data-live-search="true" data-size="7" name="atores[]" id="selector">
            <?php foreach ($atores as $ator) { ?>
                <option value="<?= $ator['id'] ?>" <?= ($filme_papel['id_ator'] ?? 0) == $ator['id'] ? 'selected' : '' ?>><?= $ator['nome'] ?></option>
            <?php } ?>
        </select>
    </div>
    <button class="btn btn-secondary mt-auto mb-3 remove_field">X</button>
</div>