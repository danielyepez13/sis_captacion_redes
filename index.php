<?php

require_once("Helpers/Helper.php");

// Establece la zona para hora y fecha por defecto
date_default_timezone_set('America/Caracas');

// Se obtiene la variable de la ruta
$url = isset($_GET['url']) ? $_GET['url'] : "Inicio";

// Separa la url que se obtenga en una matriz mediante los "/"
$arrUrl = explode("/", $url);

// El primero será quien contenga el controlador
$controlador = $arrUrl[0];

// Instancia la variable método para que el archivo Carga.php pueda hacer seguir su ejecución
$metodo = "Inicio";

// Los parámetros se instancian, más sin embargo se mantienen vacíos por defecto
$parametros = "";

// Se pregunta si la URL contiene el método que utilizará el controlador
// En otras palabras, si se llama a un controlador diferente de Inicio
if (isset($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $metodo = $arrUrl[1];
    }
}

// En este caso se pregunta algo similar, pero con los parametros o variables que se pasen por la URL
if (isset($arrUrl[2])) {
    if ($arrUrl[2] != "") {
    	// Separa los parametros que se pasen por la URL a través de un bucle
        for ($i=2; $i < count($arrUrl); $i++) { 
            $parametros .= $arrUrl[$i]. ',';
        }
        $parametros = trim($parametros, ',');
    }
}

// Carga automáticamente las clases que apoyan a enlazar modelos, controladores y vistas
require_once ("Helpers/Autoload.php");
require_once ("Controller/Carga.php");