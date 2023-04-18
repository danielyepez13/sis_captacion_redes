<?php
// Se instacia el modelo del inicio heredando la conexion
class DashboardModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    // public function cantidadBienesDashboard(string $usuario = ''){
    //     if(!empty($usuario)){
    //         $sql = "SELECT * FROM bienes WHERE asignado = $usuario";
    //     }else{
    //         $sql = 'SELECT * FROM bienes';
    //     }
    //     $res = $this->cantidad($sql);
    //     return $res;
    // }

    // public function cantidadActasDashboard(string $usuario = ''){
    //     if(!empty($usuario)){
    //         $sql = "SELECT * FROM actas WHERE usuario_registro = $usuario";
    //     }else{
    //         $sql = 'SELECT * FROM actas';
    //     }
    //     $res = $this->cantidad($sql);
    //     return $res;
    // }
}
?>