<?php
class Preguntas extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ../Inicio");
        }
        parent::__construct();
    }

    public function listar()
    {
        $data = $this->model->selectPreguntas();
        $this->views->getView($this, "ListarPreguntas", $data);
    }

    public function insertar()
    {
        $enunciado = $_POST['enunciado'];
        $respuesta = implode(",",$_POST['respuesta']);
        $correcta = implode(",",$_POST['correcta']);
        $usuario = $_SESSION['id'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $insert = $this->model->insertPreguntas($enunciado, $respuesta, $correcta, $usuario, $fecha, $hora);

        // En caso de que se devuelva True o False como resultado
        if ($insert === true) {
            $data = 'exito_pregunta';
            header('Location: ../Preguntas/listar?msg=' . $data);
            die();
        } else {
            $data = 'error_pregunta';
            header('Location: ../Preguntas/listar?msg=' . $data);
            die();
        }
    }

    public function ver()
    {
        $pregunta = $_POST['pregunta'];

        $visualizar = $this->model->selectPregunta($pregunta);
        if ($visualizar['status_pregunta'] == 1) {
            $estatus = 'Activo';
        } else {
            $estatus = 'Deshabilitado';
        }

        $resp_correctas = [];
        $respuestas = explode(",",$visualizar['respuestas']);
        $correctas = explode(",",$visualizar['resp_correctas']);

        $j = 0;
        for ($i=0; $i < count($correctas); $i++) { 
            $resp_correctas[$j] = $respuestas[$correctas[$i]];
            $j++;
        }

        $resp_correctas = implode(", ",$resp_correctas);

        $respuesta = array("usuario" => $visualizar['nombre'] . " " . $visualizar['apellido'], "enunciado" => $visualizar['enunciado'], "respuestas" => $visualizar['respuestas'], "correctas" => $resp_correctas, "fecha_pregunta" => $visualizar['fecha_preg'], "hora_pregunta" => $visualizar['hora_preg'] ,"estatus_pregunta" => $estatus);
        echo json_encode($respuesta);
        // die();
    }

    public function editar(){
        $pregunta = intval($_POST['editar']);
        // Busco la pregunta específica
        $data = $this->model->selectPregunta($pregunta);

        $respuestas = explode(",",$data['respuestas']);
        $correctas = explode(",",$data['resp_correctas']);

        $count_resp = count($respuestas);

        $respuesta = array('enunciado' => $data['enunciado'], 'respuestas' => $respuestas, 'correctas' => $correctas ,'count_resp' => $count_resp, 'id_pregunta' => $data['id_pregunta']);
        echo json_encode($respuesta);
        die();
    }

    public function modificar()
    {
        $enunciado = $_POST['enunciado_edit'];
        $respuesta = implode(",",$_POST['respuesta_edit']);
        $correcta = implode(",",$_POST['correcta_edit']);
        $id_pregunta = $_POST['id_pregunta_edit'];

        $modificar = $this->model->modificarPreguntas($id_pregunta, $enunciado, $respuesta, $correcta);
        if ($modificar) {
            $data = 'modif_exito';
            header('Location: ../Preguntas/listar?msg=' . $data);
            die();
        } else {
            $data = 'modif_error';
            header('Location: ../Preguntas/listar?msg=' . $data);
            die();
        }
        // var_dump($modificar);
    }

    public function deshabilitar(string $id_pregunta)
    {
        $this->id_pregunta = intval($id_pregunta);

        $deshabilitar = $this->model->deshabilitarPreguntas($this->id_pregunta);
        if ($deshabilitar) {
            $data = 'desha_exito';
        } else {
            $data = 'desha_error';
        }
        header('Location: ../../Preguntas/listar?msg=' . $data);
    }

    public function habilitar(string $id_pregunta)
    {
        $this->id_pregunta = intval($id_pregunta);

        $habilitar = $this->model->habilitarPreguntas($this->id_pregunta);
        if ($habilitar) {
            $data = 'ha_exito';
        } else {
            $data = 'ha_error';
        }
        header('Location: ../../Preguntas/listar?msg=' . $data);
    }
}
?>