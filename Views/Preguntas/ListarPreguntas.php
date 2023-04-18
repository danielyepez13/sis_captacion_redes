    <?php
    $menu_open = 'preguntas';
    $activo = 'ListarPreguntas';
    $titulo = 'Lista de preguntas';
    $msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
    // Requiere el encabezado
    encabezado($menu_open, $activo, $msg, $titulo);

    ?>
    <div class="container-fluid">
        <button class="btn btn-primary mb-2" id="crear" data-toggle='modal' data-target='#crearModal'>Crear Pregunta</button>

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
                        <td>" . $lista['nombre'] . " " . $lista['apellido'] . "</td>
                        <td>" . $lista['fecha_preg'] . "</td>
                        <td>" . $lista['hora_preg'] . "</td>";
                        if ($lista['status_pregunta'] == 1) {
                            echo "
                        <td><button value='$lista[id_pregunta]' id='ver$i' data-toggle='modal' data-target='#verModal' class='btn btn-primary' title='Visualizar'><i class='fas fa-eye'></i></button>
                        <button value='$lista[id_pregunta]' id='editar$i' data-toggle='modal' data-target='#editarModal' class='btn btn-success' title='Modificar'><i class='fas fa-pen'></i></button>";
                            if($_SESSION['rol'] == 1){
                                echo "<a href='../Preguntas/deshabilitar/$lista[id_pregunta]' class='btn btn-danger ml-1' title='Deshabilitar'><i class='fas fa-user-times'></i></a></td></tr>";
                            }
                        } else {
                            if($_SESSION['rol'] == 1){
                                echo "<td><a href='../Preguntas/habilitar/$lista[id_pregunta]' class='btn btn-info ml-1' title='Habilitar'><i class='fas fa-user-plus'></i></a></td></tr>";
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
    include_once("Views/Modals/Preguntas/VisualizarPreguntas.php");
    include_once("Views/Modals/Preguntas/ModificarPreguntas.php");
    include_once("Views/Modals/Preguntas/RegistrarPreguntas.php");
    ?>

    <!-- Requiere el footer o pie de la página -->
    <?php pie($menu_open) ?>