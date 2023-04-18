<!-- Modal para visualizar la información de cada usuario -->
<div class="modal fade" id="verModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verModalLabel">Datos pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Datos a mostrar desde la respuesta del JS -->
                    <p id="enunciado" class="mb-4"></p>
                    <p id="respuestas" class="mb-4"></p>
                    <p id="correctas" class="mb-4"></p>
                    <p id="usuario" class="mb-4"></p>
                    <p id="fecha_pregunta" class="mb-4"></p>
                    <p id="hora_pregunta" class="mb-4"></p>
                    <p id="estatus_pregunta" class="mb-4"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>