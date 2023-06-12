<?php
class Pruebas extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ../Inicio");
        }
        parent::__construct();
        // Instacia la clase de helper
        // $this->pregunta = new PreguntasModel();
    }

    public function listar()
    {
        $data = $this->model->selectPruebas();
        $this->views->getView($this, "ListarPruebas", $data);
    }

    public function realizar()
    {
        $data = $this->model->realizarPrueba();
        $this->views->getView($this, "RealizarPruebas", $data);
    }

    // Trae la lista de usuarios comunes
    public function registrar()
    {
        // Instancio una variable vacía para evitar errores posteriores
        $usuario = "";

        $usuario .= "<option value='' selected>Seleccione un usuario</option>";

        // Busco en la base de datos los roles que aparecen
        $resul_usuarios = $this->model->selectEvaluados();

        // Se crea el forach para listar todos los roles
        foreach ($resul_usuarios as $usuarios) {
            $usuario .= "<option value='$usuarios[id_usuario]'>$usuarios[nombre] $usuarios[apellido]</option>";
        }

        $respuesta = array('usuario' => $usuario);
        echo json_encode($respuesta);
        die();
    }

    public function insertar()
    {
        $evaluador = intval($_SESSION['id']);
        $evaluado = intval($_POST['evaluado']);
        // Máximo de preguntas fijo
        $max_preguntas = 10;
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $verificar = $this->model->verificarRegistroPrueba($evaluado);
        // Siempre que el resultado original no sea verdadero se podrá continuar el proceso de registro
        if (!$verificar) {
            $insert = $this->model->insertPruebas($evaluador, $evaluado, $max_preguntas, $fecha, $hora);

            // En caso de que se devuelva True o False como resultado
            if ($insert === true) {
                $data = 'exito_prueba';
                header('Location: ../Pruebas/listar?msg=' . $data);
                die();
            } else {
                $data = 'error_prueba';
                header('Location: ../Pruebas/listar?msg=' . $data);
                die();
            }
        } else {
            $data = 'existe_prueba';
            header('Location: ../Pruebas/listar?msg=' . $data);
            die();
        }
    }

    public function ver()
    {
        $pruebas = $_POST['pruebas'];

        $visualizar = $this->model->selectPrueba($pruebas);

        // Decirle al coordinador/administrador si pasó el usuario
        $puntuacion_minima = ($visualizar['max_preguntas'] * 80) / 100;
        $cant_correctas = $visualizar['cant_resp_correctas'];
        if (round($puntuacion_minima) <= $cant_correctas) {
            $aprobo = 'Aprobó';
        } else {
            $aprobo = 'Reprobó';
        }

        $respuesta = array("evaluador" => $visualizar['nombre_evaluador'] . " " . $visualizar['apellido_evaluador'], "evaluado" => $visualizar['nombre_evaluado'] . " " . $visualizar['apellido_evaluado'], "fecha_reg_prue" => $visualizar['fecha_reg_prue'], "hora_reg_prue" => $visualizar['hora_reg_prue'], "cant_resp_correctas" => $cant_correctas, "aprobo" => $aprobo, "cargo" => $visualizar['nombre_cargo'], "estatus_prueba" => $visualizar['estatus'], "tiempo" => $visualizar['tiempo_respuesta']);
        echo json_encode($respuesta);
        die();
    }

    public function deshabilitar(string $id_prueba)
    {
        $id_prueba = intval($id_prueba);

        $deshabilitar = $this->model->deshabilitarPruebas($id_prueba);
        if ($deshabilitar) {
            $data = 'desha_exito';
        } else {
            $data = 'desha_error';
        }
        header('Location: ../../Pruebas/listar?msg=' . $data);
    }

    public function habilitar(string $id_prueba)
    {
        $id_prueba = intval($id_prueba);

        $habilitar = $this->model->habilitarPruebas($id_prueba);
        if ($habilitar) {
            $data = 'ha_exito';
        } else {
            $data = 'ha_error';
        }
        header('Location: ../../Pruebas/listar?msg=' . $data);
    }

    public function revisar()
    {
        $tab = '';
        $paso = '';
        $correcta = 'No';
        $id_prueba = intval($_POST['revisar']);

        $prueba = $this->model->selectPruebaDelUsuario($id_prueba);
        for ($i = 0; $i < count($prueba); $i++) {
            if ($i == 0) {
                $block = 'style="display:block;"';
            } else {
                $block = 'style="display:none;"';
            }
            $tab .= "
            <div class='cont' $block>
                Pregunta:
                <div class='row'>
                    <div class='col-lg-10 enunciado'>
                        <textarea class='form-control mb-2' name='enunciado' readonly>" . $prueba[$i]['enunciado'] . "</textarea>
                    </div>";

            if ($prueba[$i]['pregunta_correcta'] == 0) {
                $correcta = 'No';
            } else {
                $correcta = 'Si';
            }

            $tab .= "<div class='col-lg-2 correcta'>
                        ¿Correcta? $correcta
                    </div>";

            $tab .= "
                </div>
            </div>
            ";
            $paso .= '<span class="paso"></span>';
        }

        // for($i = 0; $i < count($prueba); $i++){
        // }
        $respuesta = array('tab' => $tab, 'paso' => $paso);
        echo json_encode($respuesta);
    }

    public function revision()
    {
        $respuesta = json_decode($_POST['respuesta']);
        $correcta = json_decode($_POST['correcta']);
        $tiempo = $_POST['tiempo'];
        $fecha = date('Y-m-d');
        $hora = date('h:i:s');

        // Verificar la id de la prueba que está realizando el usuario
        $verificar = $this->model->verificarUsuarioPrueba();

        // Ciclo según la cantidad de respuestas que se dieron
        for ($i = 0; $i < count($respuesta); $i++) {

            // Convierte el array que es cada elemento en un string para que pueda compararse en SQL
            $answer = implode(',', $respuesta[$i]);
            $correct = implode(',', $correcta[$i]);

            // Busco el id de la pregunta según la opción que estoy listando
            $pregunta_opc = $this->model->selectPreguntaPorOpcion($answer);

            // Comparo el id y las respuestas que dio el usuario a ver cuantas acertó
            $pregunta_cor = $this->model->selectPreguntaCorrecta($pregunta_opc[0]['id_pregunta'], $correct);

            // Siempre que haya 1 fila como resultado significa que esta respuesta está correcta
            if ($pregunta_cor > 0) {
                // Verdadero
                $resp_correcta = 1;
            } else {
                // Falso
                $resp_correcta = 0;
            }

            $responder = $this->model->responderPrueba($verificar['id_prueba'], $pregunta_opc[0]['id_pregunta'], $resp_correcta, $fecha, $hora);
        }

        $revision = $this->model->revisionPruebas($verificar['id_prueba'], $tiempo);

        $response = ($revision) ? array('respuesta' => 1) : array('respuesta' => $tiempo);
        echo json_encode($response);
        die();
    }

    public function puntuar(int $id)
    {
        // Cantidad de preguntas correctas
        $cant = $this->model->cantidadPreguntasCorrectasPrueba($id);

        $response = $this->model->respuestaPrueba($id, $cant);

        // En caso de que se devuelva True o False como resultado
        if ($response === true) {
            $data = 'exito_puntuar';
            header('Location: ../../Pruebas/listar?msg=' . $data);
            die();
        } else {
            $data = 'error_puntuar';
            header('Location: ../../Pruebas/listar?msg=' . $data);
            die();
        }
    }
}
