<h1><?= $title ?></h1>
<div class="d-flex flex-wrap mt-3">
    <table class="table table-bordered w-50">
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <?php foreach($filme as $campo => $valor) { ?>
            <tr>
                <td><?= $campo ?></td>
                <td><?= $valor ?></td>
            </tr>
        <?php } ?>
    </table>
    <div class="min-h-100 w-50 ps-3">
        <h3 class="text-center mb-3">Elenco</h3>
        <table class="table table-bordered">
            <tr>
                <th>Personagem</th>
                <th>Ator</th>
            </tr>
            <?php foreach($elenco as $participacao) { ?>
                <tr>
                    <td><?= $participacao['personagem'] ?></td>
                    <td><?= $participacao['ator'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <hr>
        <h3 class="text-center mb-3">Tags</h3>
        <div class="d-flex gap-3 flex-wrap justify-content-center">
            <?php foreach($tags as $tag) { ?>
                <span class="bg-secondary px-3 py-1 rounded-pill text-white"><?= $tag['descricao'] ?></span>
            <?php } ?>
        </div>
    </div>
</div>
<div class="w-100 mt-3">
    <a href="elenco?id=<?= $_GET['id'] ?? 1 ?>" class="btn btn-primary">Editar Elenco</a>
    <a href="tags?id=<?= $_GET['id'] ?? 1 ?>" class="btn btn-primary">Editar Tags</a>
    <a href=<?= "$BASE_URL_ADM/filmes" ?> class="btn btn-secondary float-end">Voltar</a>
</div>