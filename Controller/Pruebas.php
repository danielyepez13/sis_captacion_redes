<?php
    class Pruebas extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ../Inicio");
            }
            parent::__construct();
             // Instacia la clase de helper
        	$this->usuario = new UsuariosModel();
        }

        public function listar()
        {
            $this->views->getView($this, "ListarPruebas");
        }
}
?>