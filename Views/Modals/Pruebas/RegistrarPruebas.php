    <!-- Modal para crear usuario -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Prueba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Pruebas/insertar" id="registrar_pruebas" method="post">
                        <label for="">Evaluado</label>
                        <select name="evaluado" id="evaluado" class='form-control mb-2'>

                        </select>
                        <!-- <label for="">Máximo de preguntas</label> -->
                        <!-- Números enteros -->
                        <!-- <input type="number" name="max_preguntas" id="max_preguntas" value="10" class='form-control mb-2'> -->

                        <!-- <label for="">Mínimo de puntuación para pasar</label> -->
                        <!-- Porcentaje -->
                        <!-- <input type="number" name="min_puntuacion" id="min_puntuacion" value="50">
                        <span class='nota'>El valor numérico se tomará como porcentaje</span> -->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="registrar">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>