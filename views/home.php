<style>
    ol {
        list-style-type: none;
    }
</style>
<h1>Destaques</h1>
<ol class="d-flex flex-wrap justify-content-between row-gap-3 p-0">
    <?php foreach($destaques as $filme) { ?>
        <li>
            <?php include __DIR__."/../_components/poster_filme.php"; ?>
        </li>
    <?php } ?>
</ol>