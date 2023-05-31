<?php
// Se instacia el modelo del inicio heredando la conexion
class EstadisticasModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    // public function estadisticaEstadoBien(){
    //     $sql_bueno = "SELECT * FROM bienes WHERE estado_bien = 1";
    //     $sql_malo = "SELECT * FROM bienes WHERE estado_bien = 2";

    //     $bueno = $this->cantidad($sql_bueno);
    //     $malo = $this->cantidad($sql_malo);

    //     $respuesta = array('bueno' => $bueno, 'malo' => $malo);
    //     return $respuesta;
    // }

    public function estadisticaPruebas(){
        $sql = "SELECT * FROM pruebas WHERE status_prueba = 3";

        $cantidad = $this->cantidad($sql);
        $lista = $this->listar($sql);

        $respuesta = array('cantidad' => $cantidad, 'lista' => $lista);
        return $respuesta;
    }

    public function estadisticaCargos(){
        $cargo = "SELECT * FROM cargo_postulado";
        $dos = "SELECT * FROM usuarios WHERE cargo_postulado = 1 AND rol = 4";
        $tres = "SELECT * FROM usuarios WHERE cargo_postulado = 2 AND rol = 4";
        $coor = "SELECT * FROM usuarios WHERE cargo_postulado = 3 AND rol = 4";

        $cargos = $this->listar($cargo);
        $especialistados = $this->cantidad($dos);
        $especialistatres = $this->cantidad($tres);
        $coordinador = $this->cantidad($coor);

        $respuesta = array('cargos' => $cargos ,'especialistados' => $especialistados, 'especialistatres' => $especialistatres, 'coordinador' => $coordinador);
        return $respuesta;
    }
}
?>