 <!-- Modal para editar la información de cada usuario -->
 <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Modificación de datos de la pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Preguntas/modificar" id="modificar_preguntas" method="POST">
                    <input type="hidden" id="id_pregunta_edit" name="id_pregunta_edit">
                    <label for="nombre_regis">Enunciado:</label>
                        <textarea class="form-control mb-2" id="enunciado_edit" name="enunciado_edit"></textarea>
                        <div class="row">
                        	<div class="col-lg-6">
                        		Respuestas
                        	</div>
                        	<div class="col-lg-3">
                        		¿Correctas?
                        	</div>
                        </div>
                        <div class="row mb-3 respuestas">
                        	<div class="col-lg-6 respuesta">
                        		<input type="text" class="form-control" name="respuesta_edit[]" id="respuesta0" value="">
                        	</div>
                        	<div class="col-lg-6 correcta">
                        		<input type="checkbox" name="correcta_edit[]" id="correcta0" value="0">
                        	</div>
                        </div>

                        <!-- Div donde se colocan los inputs a clonar -->
                        <div id="contenedor"></div>

                        <div id="botones" class="mb-3 ">
                        	<div class="row">
                        		<div class="col-lg-6">
                        			<a href="#" class="btn btn-primary add_field_button_edit agregar">Agregar</a>
                        		</div>
                        	</div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="registrar">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>