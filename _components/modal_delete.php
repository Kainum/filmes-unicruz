<!-- The Modal -->
<div class="modal fade" id="delete-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Aviso!</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">Deseja realmente excluir o registro?</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="btn-confirma" class="btn btn-danger" href="">Excluir</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script>
    const links = document.getElementsByClassName("link-excluir");
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener("click", function(event){
            event.preventDefault();
            document.getElementById("btn-confirma").href = event.target.href;
        });
    }
</script>