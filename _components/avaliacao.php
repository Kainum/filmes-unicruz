<?php require_once __DIR__."/avaliacao_style.php"; ?>
<div class="d-flex border-top border-bottom my-2">
    <div class="w-25 p-3">
        <img class="img_perfil bg-white rounded-circle" src="<?= FotoPerfil($avaliacao['foto']) ?>" alt="">
        <span class="d-block mt-2"><?= $avaliacao['usuario'] ?></span>
    </div>
    <div class="w-75 px-3 py-2">
        <div class="d-flex gap-4 mb-2">
            <span class="d-flex gap-2 align-content-center"><i class="material-symbols-outlined">star</i> <?= $avaliacao['nota'] ?? 'sem avaliações' ?></span>
            <span><?= FormatarData($avaliacao['data_avaliacao']) ?></span>
        </div>
        <p><?= $avaliacao['comentario'] ?></p>
    </div>
</div>