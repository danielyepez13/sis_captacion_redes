<?php
$menu_open = 'pruebas';
$activo = 'RealizarPruebas';
$titulo = 'Prueba para postulante';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);
?>
<div class="container-fluid">
    <p class="mx-3 font-clock">
        <span id="minutes" >00</span>:<span id="seconds">00</span> <b style="display: none;">:</b> <span id="tens" style="display: none;">00</span>
    </p>
    <form id="regForm" action="../Pruebas/revision" class="mx-3 my-2" method="POST">
        <input type="hidden" id="cant" value="<?= count($data) ?>">
        <?php
        // Cicla cada pregunta aleatoria
        for ($i = 0; $i < count($data); $i++) {
        ?>
            <div class="tab">
                Pregunta <?= $i + 1 ?>:
                <textarea class="form-control mb-2" id="enunciado" name="enunciado" readonly><?= $data[$i]['enunciado'] ?></textarea>
                <div class="row">
                    <div class="col-lg-6">
                        Respuestas
                    </div>
                    <div class="col-lg-3">
                        ¿Correctas?
                    </div>
                </div>
                <?php
                // Ciclas las opciones de cada enunciado
                for ($j = 0; $j < count($data[$i]['respuestas']); $j++) {
                ?>
                    <div class="row mb-3 respuestas">
                        <div class="col-lg-9 respuesta<?= $i ?>">
                            <input type="text" class="form-control answer" name="respuesta[]" value="<?= $data[$i]['respuestas'][$j] ?>" readonly>
                        </div>
                        <div class="col-lg-3 correcta<?= $i ?>">
                            <input type="checkbox" name="correcta[]" class="question mycheck" value="<?= $j ?>">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
        <div style="overflow:auto;">
            <div style="float:right;">
                <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                <button type="button" id="nextBtn" class="btn btn-primary" onclick="nextPrev(1)">Siguiente</button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div class="text-center mt-3">
            <?php
            for ($i = 0; $i < count($data); $i++) {
            ?>
                <span class="step"></span>
            <?php
            }
            ?>
        </div>

    </form>
</div>

<!-- Requiere el footer o pie de la página -->
<?php pie($menu_open, $activo) ?>