<?php
$menu_open = 'estadisticas';
$activo = 'PruebasRealizadas';
$titulo = 'Estadística de cantidad de pruebas Realizadas, Aprobadas y Reprobadas';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);
?>

<div class="container-fluid my-2">
    <canvas id="estado" width="600" height="250"></canvas>
</div>

<!-- Requiere el footer o pie de la página -->

<?php 
/*
    $pruebas = Nombres dentro de la gráfica de las columnas = $data
    $cant = Cantidad total de pruebas realizadas hasta la actualidad = $config
    $apro_repro = Arreglo con cantidad de personas aprobadas y reprobadas = $data2
*/
pie($menu_open, $data, $data2, $activo, $config) 
?>