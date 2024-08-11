<?php
    $primeiro_registro = min($count, ($page-1)*$limit + 1);
    $ultimo_registro   = min($count, $limit*$page);
?>
<div class="d-flex align-items-end">
    <span class="fw-bold">
        <?= "Exibindo $primeiro_registro até $ultimo_registro de $count registros." ?>
    </span>
</div>