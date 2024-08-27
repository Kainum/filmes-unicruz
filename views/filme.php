<?php
    require_once __DIR__."/../util.php";
?>
<style>
    .poster {
        width: 375px;
    }
    .poster img {
        width: 100%;
        object-fit: cover;
    }
</style>
<div class="d-flex flex-wrap my-3">
    <div class="poster">
        <img src="<?= $filme['imagem'] ?>" alt="">
    </div>
    <div class="min-h-100 w-50 ps-3">
        <h2><?= $filme['titulo'] ?></h2>
        <p>
            <span class="fw-light"><?= FormatarData($filme['data_lancamento']) ?></span>
            <span class="float-end d-flex gap-2 align-content-center"><i class="material-symbols-outlined">star</i> <?= $filme['nota'] ?? 'sem avaliações' ?></span>
        </p>

        <p class="mt-3"><span class="fw-bold">Sinopse:</span><br>
        <?= $filme['sinopse'] ?>
        </p>
        <hr>

        <p><span class="fw-bold">Elenco:</span><br>
        <?php
        foreach($elenco as $participacao) {
            echo $participacao['ator'] . " (" . $participacao['personagem'] . "), ";
        }
        ?>
        </p>
        <hr>

        <p><span class="fw-bold">Gênero:</span><br>
        <div class="d-flex gap-3 flex-wrap">
            <?php foreach($tags as $tag) { ?>
                <span class="bg-secondary px-3 py-1 rounded-pill text-white"><?= $tag['descricao'] ?></span>
            <?php } ?>
        </div>
        </p>

        <p><span class="fw-bold">Duração:</span><br>
        <?= $filme['duracao'] ?> minutos
        </p>

        <p><span class="fw-bold">Classind: </span><?= FilmeClassInd($filme['class_ind']) ?></p>
    </div>
</div>
<hr class="my-5">
<div>
    <h3>Avaliações</h3>
    <?php
    
    echo '<pre>';
    var_dump($avaliacoes);
    echo '<pre>';
    ?>
</div>