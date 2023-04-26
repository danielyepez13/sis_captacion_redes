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
        $this->usuario = new UsuariosModel();
    }

    public function listar()
    {
        $data = $this->model->selectPruebas();
        $this->views->getView($this, "ListarPruebas", $data);
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
        $max_preguntas = intval($_POST['max_preguntas']);
        // $min_puntuacion = $_POST['min_puntuacion'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

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
}
?>