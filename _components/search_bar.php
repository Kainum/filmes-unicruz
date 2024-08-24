<?php

$search_term = $_GET["search_term"] ?? '';

?>
<div class="w-50">
    <form method="get" action=<?= $action ?? '' ?>>
        <div class="input-group">
            <input class="form-control" type="search" placeholder="Pesquisar" id="search_term" name="search_term">
            <button class="btn btn-outline-secondary d-flex align-items-center" type="submit">
                <i class="material-symbols-outlined">search</i>
            </button>
        </div>
        <input type="hidden" name="limit" value="<?= $limit ?? '' ?>">
    </form>
</div>