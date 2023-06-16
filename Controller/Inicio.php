<?php
    class Inicio extends Controllers{
        public function __construct()
        {
            parent::__construct();
            // Instacia la clase de helper
        	$this->usuario = new UsuariosModel();
        }

        public function inicio()
        {
            $this->views->getView($this, "inicio");
        }

         // Función para recuperar contraseña
	    public function correoRecuperacion()
	    {
	        $url = "http://localhost/Proyecto%20Inventario/Inicio/recuperacion";
	        $paracorreo = $_POST['correo'];
	        $titulo = "Recuperación contraseña | Inventario Inamujer ". date('Y-m-d');
	        $mensaje = " Link para reiniciar la contraseña: $url";
	        $tucorreo = "From: danielyepez62@gmail.com";
	        $msg = "";

            if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
                $msg = 'exito_correo';
                header('Location: ../Inicio?msg='.$msg);
            } else {
                $msg = 'error_correo';
                header('Location: ../Inicio?msg='.$msg);
            }
	        
	    }

	    public function recuperacion(){
	        
	        $this->views->getView($this, "RecuperarContra");
	    }

	    public function recuperar(){
	    	$verificar = $this->usuario->verificarUsuario($_POST['cedula']);
	    	if($verificar){
	    		$recuperar = $this->usuario->contraRecuperar($_POST['contra'], $_POST['cedula']);
	    		$msg = 'contra_cambiada';
                header('Location: ../Inicio?msg='.$msg);
	    	}else{
	    		$msg = 'usuario_no_encontrado';
                header('Location: ../Inicio/recuperacion?msg='.$msg);
	    	}
	    }
}
?>