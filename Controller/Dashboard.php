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
                $this->views->getView($this, "Dashboard");
            }
            
        }
}
