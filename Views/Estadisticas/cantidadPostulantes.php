<?php
$menu_open = 'estadisticas';
$activo = 'cantidadPostulantes';
$titulo = 'Estadística de la cantidad de Cargos solicitados por los Postulantes';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);
?>

<div class="container-fluid my-2">
    <canvas id="tipo" width="600" height="250"></canvas>
</div>

<!-- Requiere el footer o pie de la página -->
<?php pie($menu_open, $data, $data2, $activo) ?>