<?php
// Mensajes que se devuelven de las consultas
$texto = '';
$alerta = '';

$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];

if (strrpos($url, '?') === false) {
    $sin_get = "http://" . $host . $url;
} else {
    $url = explode("?", $url);
    $sin_get = "http://" . $host . $url[0];
}


if (empty($msg)) {
    echo '';
} else if ($msg == 'exito_pregunta') {
    $texto = 'Se logró registrar con éxito la pregunta';
    $alerta = 'success';
} else if ($msg == 'exito_prueba') {
    $texto = 'Se logró registrar con éxito la prueba';
    $alerta = 'success';
}   else if ($msg == 'exito_usuario') {
    $texto = 'Se logró registrar con éxito el usuario';
    $alerta = 'success';
} else if ($msg == 'modif_exito') {
    $texto = 'Ya modificó con éxito';
    $alerta = 'success';
} else if ($msg == 'desha_exito') {
    $texto = 'Se deshabilitó con éxito';
    $alerta = 'success';
} else if ($msg == 'ha_exito') {
    $texto = 'Se habilitó con éxito';
    $alerta = 'success';
} else if ($msg == 'exito_puntuar') {
    $texto = 'Se confirmó la prueba correctamente';
    $alerta = 'success';
} else if ($msg == 'existe_prueba') {
    $texto = 'Ya existe una prueba en la que el usuario escogido fue seleccionado';
    $alerta = 'warning';
} else {
    $texto = 'Surgió un error inesperado. Espere unos momentos antes de seguir intentando.';
    $alerta = 'danger';
}


if (!empty($msg) && $msg != 'dashboard') {
    echo "<div class='alert alert-$alerta alert-dismissible fade show mt-3 mx-3' role='alert'>
                $texto
            <a href='$sin_get' class='close'>
                <span aria-hidden='true'>&times;</span>
            </a>
        </div>";
}
