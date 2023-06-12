<?php
$menu_open = 'estadisticas';
$activo = 'PruebasRealizadas';
$titulo = 'Estadística de cantidad de pruebas Realizadas, Aprobadas y Reprobadas';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);
$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];
$url_completa = "http://" . $host . $url;
?>
<div class="container">
    
    <form action="<?=$url_completa ?>" method="POST">
        <div class="row justify-content-center mb-3">
            <div class="col-3">
                <input type="date" name="fecha_inicio" id="" class="form-control" min="1997-01-01" max="2030-12-31">
            </div>
            <div class="col-3">
                <input type="date" name="fecha_fin" id="" class="form-control" min="1997-01-01" max="2030-12-31">
            </div>
            <div class="col-2">
                <input type="submit" value="Filtrar" class="btn btn-primary">
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-center">
        <a href="../../Estadisticas/realizados/1" class="btn btn-info mr-2">Especialista II</a>
        <a href="../../Estadisticas/realizados/2" class="btn btn-primary mr-2">Especialista III</a>
        <a href="../../Estadisticas/realizados/3" class="btn btn-success">Coordinador</a>
    </div>
</div>
<div class="container-fluid my-2">
    
    <?php
    // var_dump($data2);
        if($config == 0){
            ?>
            <h1 class="display-4 text-center font-weight-bold mt-4">No se cuentan con datos actualmente de este cargo.</h1>
            <?php
        }else{
            ?>
            <canvas id="est_pruebas" width="600" height="250"></canvas>
            <?php
            
        }
    ?>
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