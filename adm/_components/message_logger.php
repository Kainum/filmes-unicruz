<div class="position-fixed z-1 bottom-0 end-0 p-3 d-flex flex-column-reverse gap-2">
    <?php foreach($msgs ?? [] as $field => $msg) { ?>
        <div class="toast bg-<?= $msg['tipo'] ?> show">
            <div class="toast-header">
                <strong class="me-auto">Mensagem</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <p class="text-white"><?= $msg['msg'] ?></p>
            </div>
        </div>
    <?php } ?>
</div>