<h1><?= $title ?></h1>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?= $id_filme ?>">
    <div class="d-flex flex-column w-50 mt-5 gap-3" id="input_fields_wrap">
        <?php foreach ($filme_tags as $filme_tag) {
            include __DIR__."/../../../_components/select_picker_tags_filme.php";
        }
        $filme_tag = [];
        ?>
    </div>
    <div class="mt-3 w-50">
        <button class="btn btn-outline-secondary w-100" id="add_select_btn">Adicionar Tag</button>
    </div>
    <button class="btn btn-info mt-3" type="submit">Salvar</button>
</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<?php
ob_start();
require __DIR__."/../../../_components/select_picker_tags_filme.php";
$code = ob_get_clean();
$code = str_replace(["\r", "\n"], '', $code);
?>

<script>
    $(document).ready(function(){
        var seletor = `<?= $code ?>`;
        var wrapper = $("#input_fields_wrap");
        var add_button = $("#add_select_btn");

        $(add_button).click(function(){
            event.preventDefault();
            $(wrapper).append(seletor);
            $('.selectpicker').last().selectpicker('refresh');
        });
        $(wrapper).on("click",".remove_field", function(){
            event.preventDefault();
            $(this).parent('div').remove();
        });
    });
</script>