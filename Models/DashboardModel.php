<?php
// Se instacia el modelo del inicio heredando la conexion
class DashboardModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    public function cantidadPruebasDashboard(bool $listado = false){
        // variable para saber si se debe listar los resultados o solo devolver la cantidad de registros
        $sql = "SELECT * FROM pruebas WHERE status_prueba = 3";
        if($listado){
            $res = $this->listar($sql);
        }else{
            $res = $this->cantidad($sql);
        }
        return $res;
    }

    // public function cantidadPruebasAproDashboard(){
    //     $sql = "SELECT * FROM pruebas";
    //     $res = $this->cantidad($sql);
    //     return $res;
    // }
}
?>