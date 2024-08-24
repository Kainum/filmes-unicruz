<div class="row" id="card">
    <h2 class="mb-4">Alterar Perfil</h2>
    <form method="POST" enctype="multipart/form-data" class="col-6 text-secondary">
        <div class="d-flex flex-column gap-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="José da Silva" required
                    value="<?= $_POST['nome'] ?? $usuario['nome'] ?? '' ?>">
                <label for="nome">Nome Completo</label>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="foto">Foto de Perfil</label>
                <input type="file" class="form-control" name="foto" id="foto" accept="image/png, image/jpeg">
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" name="nova_senha" id="nova_senha" placeholder="password" minlength="8">
                <label for="nova_senha">Nova Senha</label>
            </div>

            <div class="form-floating mt-5">
                <input class="form-control" type="password" name="senha_atual" id="senha_atual" placeholder="password" required>
                <label for="senha_atual">Senha Atual</label>
            </div>
        </div>
        <button class="btn btn-primary mt-4 py-2 px-4 rounded-3" type="submit">Alterar</button>
    </form>
    <div class="min-h-100 bg-info col-6">

    </div>
</div>
<?php include __DIR__."/../_components/message_logger.php" ?>