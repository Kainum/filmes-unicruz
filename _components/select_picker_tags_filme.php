<div class="d-flex gap-3">
    <select class="selectpicker form-control w-100 mb-3" data-live-search="true" data-size="7" name="tags[]" id="selector">
        <?php foreach ($tags as $tag) { ?>
            <option value="<?= $tag['id'] ?>" <?= ($filme_tag['id'] ?? 0) == $tag['id'] ? 'selected' : '' ?>><?= $tag['descricao'] ?></option>
        <?php } ?>
    </select>
    <button class="btn btn-secondary mt-auto mb-3 remove_field">X</button>
</div>