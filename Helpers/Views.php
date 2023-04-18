<?php
class Views{
    // Función para obtener la vista
    public function getView($controller, $view, $data="", $config="", $data2="")
    {
        // Nombre de la clase del controlador
        $controller = get_class($controller);

        // Si controlador es inicio, lo enviará al login o la vista del inicio
        //if ($controller == "Inicio" && $view = '.php') {
        //    $view = "Views/inicio.php";
        //}else{
            // Buscará una carpeta con el nombre del controlador
            $view = "Views/" . $controller . "/" . $view . ".php";
        //}
        // Independientemente del resultado, va a requerir la vista
        require_once($view);
    }
}

?>