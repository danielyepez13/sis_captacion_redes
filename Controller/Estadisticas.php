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
        // Instacia la clase de helper
        $this->bien = new BienesModel();
        $this->acta = new ActasModel();
    }

    public function estado()
    {
        $nombres_estados = $this->bien->selectEstados();
        $estados_bienes = $this->model->estadisticaEstadoBien();

        $this->views->getView($this, "EstadoBien", $nombres_estados, "", $estados_bienes);
    }

    public function tipo(){
        $nombres_tipos = $this->acta->selectTipos();
        $actas = $this->model->estadisticaTipoActa();

        $this->views->getView($this, "TipoActa", $nombres_tipos, "", $actas);
    }
}
