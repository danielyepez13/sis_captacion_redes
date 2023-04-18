<?php
// Se instancia la variable para contener la ubicación del controlador
$controladorFile = "Controller/" . $controlador . ".php";
if (file_exists($controladorFile)) {
    
    // Se requiere el controlador una vez en caso de que exista
    require_once($controladorFile);

    // Se instancia el controlador utilizando la variable
    $controlador = new $controlador();

    // Se busca si existe el método en la clase que se está pasando
    if (method_exists($controlador, $metodo)) {

        // Se instancia el controlador con su respectivo metodo y parametros segun necesite
        $controlador->{$metodo}($parametros);
    }
    
    // De caso contrario sencillamente se requiere el controlador de los errores
    else {
        require_once("Controller/Error.php");
    }
} else {
    require_once("Controller/Error.php");
}

?>