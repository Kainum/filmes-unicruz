<?php
require_once __DIR__."/poster_filme_style.php";
require_once __DIR__."/../config.php";
?>
<div class="poster">
    <img src="<?= $filme['imagem'] ?>" alt="">
    <div class="rounded-bottom px-3 py-2">
        <a class="text-white" href=<?= "$BASE_URL/filme?filme=".$filme['slug'] ?>>
            <p class="text-truncate">
                <?= $filme['titulo'] ?>
            </p>
        </a>
    </div>
</div>