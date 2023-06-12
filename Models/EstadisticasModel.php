<?php
// Se instacia el modelo de las estadisticas heredando la conexion
class EstadisticasModel extends Conexion{
    public function __construct()
    {
        // Se obtiene el constructor del padre
        parent::__construct();
    }

    public function estadisticaPruebas(int $cargo, string $fecha_inicio, string $fecha_fin){
        $fecha = '';
        if(!empty($fecha_inicio) AND !empty($fecha_fin)){
            // Settea las variables para que las acepte la BD
            $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
            $fecha_fin = date('Y-m-d', strtotime($fecha_fin));
            // Cambia la variable para que busque en la tabla independiente de la sentencia SQL entre fechas
            $fecha = "AND fecha_reg_prue BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }
        
        // Siempre que la prueba tenga status de finalizada
        if($cargo != 0){
            // Se seleccionan dos tablas y se colocan campos concretos que se utilizaran según se necesiten
            $sql = "SELECT p.evaluado, p.max_preguntas, p.cant_resp_correctas, p.status_prueba, u.cargo_postulado FROM pruebas as p INNER JOIN usuarios as u ON p.evaluado = u.id_usuario WHERE p.status_prueba = 3 AND u.cargo_postulado = $cargo $fecha";
        }else{
            // hace una busqueda de todos las filas de la tabla de pruebas donde su status sea 3 o Finalizada
            $sql = "SELECT * FROM pruebas WHERE status_prueba = 3 $fecha";
        }

        // Arroja la cantidad de filas que se han generado en la sentencia
        $cantidad = $this->cantidad($sql);

        // Genera un Array listando todas las filas que se han generado
        $lista = $this->listar($sql);

        // Genera un array con las respuestas
        $respuesta = array('cantidad' => $cantidad, 'lista' => $lista);

        // Retorna el array
        return $respuesta;
    }
}
?>