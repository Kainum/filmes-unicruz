<?php
    require_once __DIR__."/../_util.php";
    require_once __DIR__."/../_session.php";
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
<hr class="my-4">
<section>
    <?php if (EstaLogado()) { ?> 
        <form class="d-flex" method="post">
            <div class="w-75 text-secondary">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <label class="text-white" for="nota">Nota: </label>
                    <select class="form-select" style="width: 100px;" name="nota" id="nota" required>
                        <option value="0" <?= ($avaliacao_do_usuario['nota'] ?? '') == "0" ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= ($avaliacao_do_usuario['nota'] ?? '') == "1" ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= ($avaliacao_do_usuario['nota'] ?? '') == "2" ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= ($avaliacao_do_usuario['nota'] ?? '') == "3" ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= ($avaliacao_do_usuario['nota'] ?? '') == "4" ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= ($avaliacao_do_usuario['nota'] ?? '') == "5" ? 'selected' : '' ?>>5</option>
                    </select>
                    <button class="btn btn-success ms-auto" type="submit">
                        <?= isset($avaliacao_do_usuario) ? 'Altere sua Avaliação' : 'Deixe sua Avaliação' ?>
                    </button>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="comentario" id="comentario"
                            placeholder="Deixe seu comentário" style="height: 100px"
                            required><?= $avaliacao_do_usuario['comentario'] ?? '' ?></textarea>
                    <label for="comentario">Comentário</label>
                </div>
            </div>
        </form>
    <?php } ?>
    <h3 class="my-3">Avaliações</h3>
    <?php foreach ($avaliacoes as $avaliacao) { 
        require __DIR__."/../_components/avaliacao.php";
    } ?>
</section>