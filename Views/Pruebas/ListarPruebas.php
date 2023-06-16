<?php
$menu_open = 'pruebas';
$activo = 'ListarPruebas';
$titulo = 'Lista de Pruebas';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);

?>
<div class="container-fluid">
    <button class="btn btn-primary mb-2" id="crear" data-toggle='modal' data-target='#crearModal'>Crear Prueba</button>

    <table id="example1" class="table table-striped">
        <thead>
            <tr>
                <?php
                if ($data === NULL) {
                    echo "<th>Información</th>";
                } else {
                    echo "
                    <th>N°</th>
                    <th>Registrador</th>
                    <th>Evaluado</th>
                    <th>Estatus de la prueba</th>
                    <th>Fecha registro</th>
                    <th>Hora de registro</th>
                    <th>Acciones</th>
                    ";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            if ($data === NULL) {
                echo "<tr><td>No hay Datos</td></tr>";
            } else {
                foreach ($data as $lista) {
                    echo "<tr>
                        <td>" . $i . "</td> 
                        <td>" . $lista['nombre_evaluador'] ." ". $lista['apellido_evaluador'] ."</td>
                        <td>" . $lista['nombre_evaluado'] . " " . $lista['apellido_evaluado'] . "</td>
                        <td>" . $lista['estatus'] . "</td>
                        <td>" . $lista['fecha_reg_prue'] . "</td>
                        <td>" . $lista['hora_reg_prue'] . "</td>";
                        // Mientras el estatus sea diferente de deshabilitado se verán las demás opciones
                    if ($lista['status_prueba'] != 4) {
                        echo "
                        <td><button value='$lista[id_prueba]' id='ver$i' data-toggle='modal' data-target='#verModal' class='btn btn-primary' title='Visualizar'><i class='fas fa-eye'></i></button>";
                        
                        // Si se encuentra en revisión
                        if($lista['status_prueba'] == 2){
                            echo "<a href='../Pruebas/revisar/$lista[id_prueba]' id='revisar$i' data-toggle='modal' data-target='#revisarModal' class='btn btn-info ml-1' title='Revisar'><i class='fas fa-calendar-check'></i></a>";
                        }
                        
                        // Si se encuentra finalizada la prueba
                        if($lista['status_prueba'] == 3){
                            echo "<a href='../Pruebas/verPDF/$lista[id_prueba]' target='_blank' class='btn btn-secondary ml-1' title='PDF'><i class='fas fa-file'></i></a>";
                        }
                        
                        // Solo el administrador puede deshabilitar
                        if ($_SESSION['rol'] == 1) {
                            echo "<a href='../Pruebas/deshabilitar/$lista[id_prueba]' class='btn btn-danger ml-1' title='Deshabilitar'><i class='fas fa-user-times'></i></a></td></tr>";
                        }

                    } else {
                        // Solo el administrador puede habilitar registros
                        if ($_SESSION['rol'] == 1) {
                            echo "<td><a href='../Pruebas/habilitar/$lista[id_prueba]' class='btn btn-info ml-1' title='Habilitar'><i class='fas fa-user-plus'></i></a></td></tr>";
                        }
                    }

                    $i++;
                }
            }
            // Campo usado en los js para hacer las demás funcionalidades
            $i -= 1;
            echo "<input type='hidden' id='cant_registros' value='$i'>";
            ?>
        </tbody>
    </table>
</div>

<?php
// Se incluyen los modals que permiten realizar las acciones con el registro
include_once("Views/Modals/Pruebas/VisualizarPruebas.php");
include_once("Views/Modals/Pruebas/RevisarPruebas.php");
include_once("Views/Modals/Pruebas/RegistrarPruebas.php");

// Algoritmo para hacer la prueba la asignar usuario
// $preguntadas = array(); // declaramos una variable que usaremos de contenedor para las preguntas ya realizadas
// $array = array('pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9', 'pregunta10', 'pregunta11', 'pregunta12', 'pregunta13', 'pregunta14', 'pregunta15', 'pregunta16', 'pregunta17', 'pregunta18', 'pregunta19', 'pregunta20');
// $items = count($array) - 1;

// for ($i = 1; $i <= 10; $i++) {
//     $var = rand(0, $items);
//     if (in_array($array[$var], $preguntadas)) { // Buscamos si la pregunta ya se habia hecho
//         $i--; // restamos 1 para reutilizar el indice de la pregunta repetida  
//     } else {
//         echo $i . ') ' . $array[$var] . '<br>'; // Mostramos la pregunta
//         $preguntadas[] .= $array[$var]; // y la agregamos a las que ya se hicieron        
//     }
// }
?>

<!-- Requiere el footer o pie de la página -->
<?php pie($menu_open) ?>