<?php
// Se instacia el modelo del inicio heredando la conexion
class EstadisticasModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    public function estadisticaPruebas(int $cargo, string $fecha_inicio = '', string $fecha_fin = ''){
        $fecha = '';
        if(!empty($fecha_inicio) AND !empty($fecha_fin)){
            $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
            $fecha_fin = date('Y-m-d', strtotime($fecha_fin));
            $fecha = "AND fecha_reg_prue BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }
        
        // Siempre que la prueba tenga status de finalizada
        if($cargo != 0){
            $sql = "SELECT p.evaluado, p.max_preguntas, p.cant_resp_correctas, p.status_prueba, u.cargo_postulado FROM pruebas as p INNER JOIN usuarios as u ON p.evaluado = u.id_usuario WHERE p.status_prueba = 3 AND u.cargo_postulado = $cargo $fecha";
        }else{
            $sql = "SELECT * FROM pruebas WHERE status_prueba = 3 $fecha";
        }

        $cantidad = $this->cantidad($sql);
        $lista = $this->listar($sql);

        $respuesta = array('cantidad' => $cantidad, 'lista' => $lista);
        return $respuesta;
    }
}
?>