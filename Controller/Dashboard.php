<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ../Inicio");
            }
            parent::__construct();
            $this->prueba = new PruebasModel();
        }

        public function dashboard()
        {
            // Si rol es usuario
            if($_SESSION['rol'] ==  4){
                // Comprueba que tenga una prueba asignada en ese momento
                $verificar = $this->prueba->verificarUsuarioPrueba();
                // var_dump($verificar);
                if($verificar){
                    header('location: ../Pruebas/realizar?max='.$verificar['max_preguntas']);
                }else{
                    // De caso contrario lo devuelve al inicio
                    session_destroy();
                    header('location: ../Inicio?msg=sin_prueba');
                }
            }else{
                // Si el rol es cualquier otro que no sea usuario
                $total = $this->model->cantidadPruebasDashboard();
                $cant = $this->model->cantidadPruebasDashboard(true);
                $aprobados = 0;
                for ($i=0; $i < count($cant); $i++) { 
                    // Si la cantidad de respuestas correctas es igual al 80% a la cantidad de preguntas entonces se asume que el postulante aprobó
                    // Nota: la función round redondea el resultado del 80% para que sea posible compararlo con la cantidad de respuestas correctas
                    if((round($cant[$i]['max_preguntas']*80)/100) <= $cant[$i]['cant_resp_correctas']){
                        $aprobados++;
                    }
                }
                // echo $aprobados;
                $this->views->getView($this, "Dashboard", $total, $aprobados);
            }
            
        }
}
