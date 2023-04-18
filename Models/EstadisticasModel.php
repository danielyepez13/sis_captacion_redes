<?php
// Se instacia el modelo del inicio heredando la conexion
class EstadisticasModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    public function estadisticaEstadoBien(){
        $sql_bueno = "SELECT * FROM bienes WHERE estado_bien = 1";
        $sql_malo = "SELECT * FROM bienes WHERE estado_bien = 2";

        $bueno = $this->cantidad($sql_bueno);
        $malo = $this->cantidad($sql_malo);

        $respuesta = array('bueno' => $bueno, 'malo' => $malo);
        return $respuesta;
    }

    public function estadisticaTipoActa(){
        $sql_entrega = "SELECT * FROM actas WHERE tipo_acta = 1";
        $sql_salida = "SELECT * FROM actas WHERE tipo_acta = 2";
        $sql_desincor = "SELECT * FROM actas WHERE tipo_acta = 3";

        $entrega = $this->cantidad($sql_entrega);
        $salida = $this->cantidad($sql_salida);
        $desincor = $this->cantidad($sql_desincor);

        $respuesta = array('entrega' => $entrega, 'salida' => $salida, 'desincor' => $desincor);
        return $respuesta;
    }
}
?>