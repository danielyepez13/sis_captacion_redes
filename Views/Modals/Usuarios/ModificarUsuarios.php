 <!-- Modal para editar la información de cada usuario -->
 <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Modificación de datos de Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Usuarios/modificar" id="modificar_usuarios" method="POST">
                        <input type="hidden" id="id_usuario_edit" name="id_usuario_edit">
                        <label for="nombre_edit">Nombre: </label> 
                        <input type="text" id="nombre_edit" name="nombre_edit" class="form-control">
                        <br>
                        <label for="apellido_edit">Apellido: </label>
                        <input type="text" id="apellido_edit" name="apellido_edit" class="form-control">
                        <br>
                        <label for="cedula_edit">Cédula: </label>
                        <input type="text" id="cedula_edit" name="cedula_edit" class="form-control">
                        <br>
                        <label for="contra_edit">Nueva contraseña del Usuario:</label>
                        <input type="password" id="contra_edit" name="contra_edit" class="form-control">
                        <br>
                        <label for="rol_edit">Rol: </label>
                        <select name="rol_edit" id="rol_edit" class="form-control">

                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="modificar">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>