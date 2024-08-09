<?php
    $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
?>
<div class="d-flex flex-column gap-2">
    <nav class="d-flex gap-1 justify-content-center">

        <a class="btn btn-outline-secondary" href=<?= "$url?page=1&search_term=$search_term&limit=$limit" ?>>&#x226A;</a>
        <a class="btn btn-outline-secondary" href=<?= "$url?page=". max(1, $page-1) ."&search_term=$search_term&limit=$limit" ?>>&#x3c;</a>

        <?php for ($i = max($page-2, 1); $i <= min($page+2, $last_page); $i++) { ?>
            <a  class="btn <?= $i == $page ? 'btn-primary' : 'btn-outline-secondary' ?>"
                href=<?= "$url?page=$i&search_term=$search_term&limit=$limit" ?>>
                <?= $i ?>
            </a>
        <?php } ?>

        <a class="btn btn-outline-secondary" href=<?= "$url?page=". min($last_page, $page+1) ."&search_term=$search_term&limit=$limit" ?>>&#x3e;</a>
        <a class="btn btn-outline-secondary" href=<?= "$url?page=$last_page&search_term=$search_term&limit=$limit" ?>>&#x226B;</a>
    </nav>
    <nav class="d-flex gap-2 justify-content-center">
        Nº de itens por página
        <?php $params = "page=$page&search_term=$search_term&limit"; ?>
        <a href=<?= "$url?$params=5" ?>>05</a>
        <a href=<?= "$url?$params=10" ?>>10</a>
        <a href=<?= "$url?$params=15" ?>>15</a>
    </nav>
</div>