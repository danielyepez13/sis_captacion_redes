<?php
// La función busca el nombre de la clase en la carpeta de Helper
function autoload($clase){
    if(file_exists("Helpers/$clase.php")){
        require_once "Helpers/$clase.php";
    }else {
        // Sino se encuentra en helper lo busca en model
    	require_once "Models/$clase.php";
    }
}

// Carga automaticamente las clases heredadas según el objeto que se instancie, 
// buscando el nombre del archivo por como se llama la clase
// Ejemplo: class Bienes extends Controllers llama a Controllers.php | Y si, el nombre debe ser literal.
spl_autoload_register("autoload");
?>