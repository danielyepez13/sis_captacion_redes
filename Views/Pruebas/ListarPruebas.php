<?php
$menu_open = 'pruebas';
$activo = 'ListarPruebas';
$titulo = 'Lista de Pruebas';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);

?>
<div class="container-fluid">
    <!-- <button class="btn btn-primary mb-2" id="crear" data-toggle='modal' data-target='#crearModal'>Crear Usuario</button> -->
    <h3>Test para aleatoridad en preguntas</h3>
    <?php
    $preguntadas = array(); // declaramos una variable que usaremos de contenedor para las preguntas ya realizadas
    $array = array('pregunta1', 'pregunta2', 'pregunta3', 'pregunta4', 'pregunta5', 'pregunta6', 'pregunta7', 'pregunta8', 'pregunta9', 'pregunta10', 'pregunta11', 'pregunta12', 'pregunta13', 'pregunta14', 'pregunta15', 'pregunta16', 'pregunta17', 'pregunta18', 'pregunta19', 'pregunta20');
    $items = count($array) - 1;

    for ($i = 1; $i <= 10; $i++) {
        $var = rand(0, $items);
        if (in_array($array[$var], $preguntadas)) { // Buscamos si la pregunta ya se habia hecho
            $i--; // restamos 1 para reutilizar el indice de la pregunta repetida  
        } else {
            echo $i . ') ' . $array[$var] . '<br>'; // Mostramos la pregunta
            $preguntadas[] .= $array[$var]; // y la agregamos a las que ya se hicieron        
        }
    }
    ?>

</div>

<?php
// Se incluyen los modals que permiten realizar las acciones con el registro
// include_once("Views/Modals/Usuarios/VisualizarUsuarios.php");
// include_once("Views/Modals/Usuarios/ModificarUsuarios.php");
// include_once("Views/Modals/Usuarios/RegistrarUsuarios.php");
?>

<!-- Requiere el footer o pie de la página -->
<?php pie($menu_open) ?>