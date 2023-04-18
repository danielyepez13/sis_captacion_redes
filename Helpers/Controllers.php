<?php
// Instacia la clase controladores
class Controllers{
    public function __construct()
    {
        // Instacia la clase de vistas
        $this->views = new Views();

        // Se carga la función para los modelos
        $this->loadModel();
    }
    
    // Método para cargar los modelos
    public function loadModel()
    {
        // Se obtiene la clase para los modelos usando la clase del controlador
        $model = get_class($this)."Model";

        // Se busca el modelo como un archivo
        $routClass = "Models/".$model.".php";

        // Se comprueba que exista la ruta del archivo
        if (file_exists($routClass)) {

            // Se requiere el modelo
            require_once($routClass);

            // Se instancia la clase del modelo
            $this->model = new $model();
        }
    }
}
?>