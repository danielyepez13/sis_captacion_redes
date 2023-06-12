    <!-- Modal para crear usuario -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Usuarios/insertar" id="registrar_usuarios" method="post">
                        <label for="nombre_regis">Ingrese el nombre del usuario:</label>
                        <input class="form-control mb-2" type="text" id="nombre_regis" name="nombre_regis" onkeypress="return letras(event)">
                        <br>
                        <label for="apellido_regis">Ingrese el apellido del usuario:</label>
                        <input class="form-control mb-2" type="text" id="apellido_regis" name="apellido_regis" onkeypress="return letras(event)">
                        <br>
                        <label for="cedula_regis">Ingrese la cédula del usuario:</label>
                        <input class="form-control mb-2" type="text" id="cedula_regis" name="cedula_regis">
                        <br>
                        <label for="contrasena_regis">Ingrese la contraseña del usuario:</label>
                        <input class="form-control mb-2" type="password" id="contrasena_regis" name="contrasena_regis">
                        <br>
                        <label for="rol_regis">Ingrese el rol del usuario</label>
                        <select class="form-control mb-2" name="rol_regis" id="rol_regis">

                        </select>

                        <div id="cargar_cargo"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="registrar">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>