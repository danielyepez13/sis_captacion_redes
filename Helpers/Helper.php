<?php

function encabezado($menu_open, $activo, $alerta, $titulo)
{
    $vistaE = "Views/Include/Header.php";
    require_once($vistaE);
}
function pie($pagina, $data = '', $data2 = '', $estadistica = '', $data3 = '')
{
    $vistaP = "Views/Include/Footer.php";
    require_once($vistaP);
}

function alertas($msg){
    $vistaAl = "Views/Include/Alerts.php";
    require_once($vistaAl);
}