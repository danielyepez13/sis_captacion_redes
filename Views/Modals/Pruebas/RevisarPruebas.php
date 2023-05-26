<!-- Modal para visualizar la información de cada usuario -->
<div class="modal fade" id="revisarModal" tabindex="-1" role="dialog" aria-labelledby="revisarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="revisarModalLabel">Datos prueba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenedor">
                    <!-- <div class="tab">
                        Pregunta:
                        <div class="row">
                            <div class="col-lg-10 enunciado">
                                <textarea class="form-control mb-2" name="enunciado" readonly></textarea>
                            </div>
                            <div class="col-lg-2 correcta">
                                ¿Correcta? No
                            </div>
                        </div>
                    </div> -->
                </div>


                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="previoBtn" class="btn btn-gray" onclick="sigPrev(-1)" style="display: none;">Anterior</button>
                        <button type="button" id="sigBtn" class="btn btn-primary" onclick="sigPrev(1)">Siguiente</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div class="text-center mt-3 pasos">

                </div>
            </div>
            <div class="modal-footer">
                <div class="confirmar">
                    
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>