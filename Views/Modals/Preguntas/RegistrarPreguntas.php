    <!-- Modal para crear usuario -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Preguntas/insertar" id="registrar_preguntas" method="post">
                        <label for="nombre_regis">Enunciado:</label>
                        <textarea class="form-control mb-2" id="enunciado" name="enunciado"></textarea>
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
                        		<input type="text" class="form-control" name="respuesta[]" value="">
                        	</div>
                        	<div class="col-lg-6 correcta">
                        		<input type="checkbox" name="correcta[]" value="0">
                        	</div>
                        </div>

                        <!-- Div donde se colocan los inputs a clonar -->
                        <div class="input_fields_wrap"></div>

                        <div id="botones" class="mb-3 ">
                        	<div class="row">
                        		<div class="col-lg-6">
                        			<a href="#" class="btn btn-primary add_field_button">Agregar</a>
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