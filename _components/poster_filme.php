<?php
require_once __DIR__."/poster_filme_style.php";
require_once __DIR__."/../config.php";
?>
<div class="poster">
    <img src="<?= $filme['imagem'] ?>" alt="">
    <div class="rounded-bottom px-3 pt-2 pb-1">
        <span><i class="material-symbols-outlined">star</i> <?= $filme['nota'] ?? 5 ?></span>
        <a class="text-white" href=<?= "$BASE_URL/filme?filme=".$filme['slug'] ?>>
            <p class="text-truncate">
                <?= $filme['titulo'] ?>
            </p>
        </a>
    </div>
</div>