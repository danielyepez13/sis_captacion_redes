<!-- Modal para visualizar la información de cada usuario -->
<div class="modal fade" id="verModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verModalLabel">Datos prueba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Datos a mostrar desde la respuesta del JS -->
                    <p id="nombre_evaluador" class="mb-4"></p>
                    <p id="nombre_evaluado" class="mb-4"></p>
                    <p id="cargo"></p>
                    <p id="fecha_reg_prue" class="mb-4"></p>
                    <p id="hora_reg_prue" class="mb-4"></p>
                    <p id="aprobo" class="mb-4"></p>
                    <p id="cant_resp_correctas" class="mb-4"></p>
                    <p id="estatus_pruebas" class="mb-4"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>