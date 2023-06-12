<?php
class Estadisticas extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ../Inicio");
        }
        parent::__construct();
    }

    public function realizados(int $cargo)
    {
        // Comprueba que las variables no estén vacías
        $fecha_inicio = !empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '' ;
        $fecha_fin = !empty($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '' ;

        // Hace un arreglo fijo de los diferentes estados que se cargarán en la gráfica
        $pruebas = ['Realizados', 'Aprobados', 'Reprobados'];

        $cantidad = $this->model->estadisticaPruebas($cargo, $fecha_inicio, $fecha_fin);
        $lista = $cantidad['lista'];
        $cant = $cantidad['cantidad'];
        $aprobados = 0;
        $reprobados = 0;
        for ($i = 0; $i < count($lista); $i++) {
            // Si la cantidad de respuestas correctas es igual al 80% a la cantidad de preguntas entonces se asume que el postulante aprobó
            // Nota: la función round redondea el resultado del 80% para que sea posible compararlo con la cantidad de respuestas correctas
            if ((round($lista[$i]['max_preguntas'] * 80) / 100) <= $lista[$i]['cant_resp_correctas']) {
                $aprobados++;
            }else{
                $reprobados++;
            }
        }
        $apro_repro = [$aprobados, $reprobados];
        /*
            $pruebas = Nombres dentro de la gráfica de las columnas
            $cant = Cantidad total de pruebas realizadas hasta la actualidad
            $apro_repro = Arreglo con cantidad de personas aprobadas y reprobadas
        */
        $this->views->getView($this, "pruebasRealizadas", $pruebas, $cant, $apro_repro);
    }
}
