<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ../Inicio");
            }
            parent::__construct();
        }

        public function dashboard()
        {
            // if($_SESSION['rol'] == 4){
            //     $cant_bienes = $this->model->cantidadBienesDashboard($_SESSION['id']);
            //     $cant_actas = $this->model->cantidadActasDashboard($_SESSION['id']);
            // }else{
            //     $cant_bienes = $this->model->cantidadBienesDashboard();
            //     $cant_actas = $this->model->cantidadActasDashboard();
            // }
            $this->views->getView($this, "Dashboard");
        }
}
