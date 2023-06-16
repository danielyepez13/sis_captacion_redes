<?php
require('Assets/plugins/fpdf/fpdf.php');
header("Content-Type: text/html; charset=utf-8");

function eliminar_acentos($cadena){
    //Reemplazamos la A y a
    $cadena = str_replace(
    array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
    array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
    $cadena
    );

    //Reemplazamos la E y e
    $cadena = str_replace(
    array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
    array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
    $cadena );

    //Reemplazamos la I y i
    $cadena = str_replace(
    array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
    array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
    $cadena );

    //Reemplazamos la O y o
    $cadena = str_replace(
    array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
    array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
    $cadena );

    //Reemplazamos la U y u
    $cadena = str_replace(
    array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
    array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
    $cadena );

    //Reemplazamos la N, n, C y c
    $cadena = str_replace(
    array('Ñ', 'ñ', 'Ç', 'ç'),
    array('N', 'n', 'C', 'c'),
    $cadena
    );
    
    return $cadena;
}
$cedula = $data['cedula'];

$palabra = 'Mi primera página pdf con FPDF';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(200,20, 'Datos de la prueba de ' . eliminar_acentos($data['evaluado']), 0 ,1, 'C');
$pdf->Cell(50,10, 'Registrador: ' . eliminar_acentos($data['evaluador']), 0, 1);
$pdf->Cell(50,10, 'Postulante: ' . eliminar_acentos($data['evaluado']), 0, 1);
$pdf->Cell(50,10, 'Cedula de postulante: ' . $cedula, 0, 1);
$pdf->Cell(50,10, 'Cargo al que se ha postulado: ' . $data['cargo'], 0, 1);
$pdf->Cell(50,10, 'Tiempo que ha tardado en responder la prueba: ' . $data['tiempo'], 0, 1);
$pdf->Cell(50,10, 'El usuario: ' . eliminar_acentos($data['aprobo']), 0, 1);
$pdf->Cell(50,10, 'Fecha en que se ha realizado la prueba: ' . $data['fecha_reg_prue'] . " " . $data['hora_reg_prue'], 0, 1);
$pdf->Output('I', "Datos de prueba ($cedula)");
?>