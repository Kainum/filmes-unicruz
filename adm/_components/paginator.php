<?php
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
?>
<div class="d-flex flex-column gap-2">
    <nav class="d-flex gap-1 justify-content-center">
        <a class="btn btn-outline-secondary" href=<?= "$url?page=1&limit=$limit" ?>>&#x226A;</a>
        <a class="btn btn-outline-secondary" href=<?= "$url?page=". $page-1 ."&limit=$limit" ?>>&#x3c;</a>

        <?php for ($i = max($page-2, 1); $i <= min($page+2, $last_page); $i++) { ?>
            <a  class="btn <?= $i == $page ? 'btn-primary' : 'btn-outline-secondary' ?>"
                href=<?= "$url?page=$i&limit=$limit" ?>>
                <?= $i ?>
            </a>
        <?php } ?>

        <a class="btn btn-outline-secondary" href=<?= "$url?page=". $page+1 ."&limit=$limit" ?>>&#x3e;</a>
        <a class="btn btn-outline-secondary" href=<?= "$url?page=$last_page&limit=$limit" ?>>&#x226B;</a>
    </nav>
    <nav class="d-flex gap-2 justify-content-center">
        Nº de itens por página
        <a class="" href=<?= "$url?page=$page&limit=5" ?>>05</a>
        <a class="" href=<?= "$url?page=$page&limit=10" ?>>10</a>
        <a class="" href=<?= "$url?page=$page&limit=15" ?>>15</a>
    </nav>
</div>