 <!-- Modal para editar la información de cada usuario -->
 <div class="modal fade" id="recupModal" tabindex="-1" role="dialog" aria-labelledby="recupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recupModalLabel">Modificación de datos de Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Inicio/correoRecuperacion" id="correorecuperacion" method="POST">
                        <label for="correo">Correo electrónico: </label> 
                        <input type="text" id="correo" name="correo" value="" class="form-control">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="recuperar">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>