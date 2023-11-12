<style>
.modal-backdrop.fade{
    width:0% !important;
    height:0% !important;
}
</style>
<div class="modal fade" id="deleteMed<?php echo $medico['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">
                    ¿Seguro que quiere eliminar a ?
                </h4>
            </div>
            <div class="modal-body">
                <strong style="text-align: center !important">
                    <?php echo $medico['nombre'];?> <?php echo $medico['apellido'];?>
                </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger"  id="<?php echo $medico['id_user']  ?>" value="btnDelete" name="btnDelete">Eliminar</button>
            </div>
        </div>

    </div>

</div>

