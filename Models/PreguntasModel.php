<?php
class PreguntasModel extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectPreguntas()
    {
        $query = "SELECT * FROM preguntas INNER JOIN usuarios WHERE preguntas.usu_regis_preg = usuarios.id_usuario";
        $resul = $this->listar($query);
        return $resul;
    }

    public function selectPregunta(string $id)
    {
        $query = "SELECT * FROM preguntas INNER JOIN usuarios ON preguntas.usu_regis_preg = usuarios.id_usuario WHERE id_pregunta = $id";
        $resul = $this->buscar($query);
        return $resul;
    }

    public function insertPreguntas(string $enunciado, string $respuestas, string $correctas, int $usuario_reg, string $fecha, string $hora)
    {

        // Query que carga al usuario que se desea insertar en el registro
        $query = "INSERT INTO preguntas(enunciado, respuestas, resp_correctas, usu_regis_preg, fecha_preg, hora_preg) VALUES ('$enunciado','$respuestas', '$correctas', $usuario_reg, '$fecha', '$hora')";

        // Devuelve verdadero o falso dependiendo si logró realizar la sentencia
        $resul = $this->registrar($query);

        return $resul;
    }

    public function modificarPreguntas(string $id_pregunta, string $enunciado, string $respuestas, string $correctas)
    {
        $id_pregunta = intval($id_pregunta);

        $query = "UPDATE preguntas SET enunciado = '$enunciado',
               respuestas = '$respuestas',
               resp_correctas = '$correctas'
               WHERE id_pregunta = $id_pregunta";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function deshabilitarPreguntas(int $id_pregunta)
    {
        $query = "UPDATE preguntas SET
                status_pregunta=0
                WHERE id_pregunta = $id_pregunta";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function habilitarPreguntas(int $id_pregunta)
    {
        $query = "UPDATE preguntas SET
                status_pregunta=1
                WHERE id_pregunta = $id_pregunta";
        $resul = $this->registrar($query);
        return $resul;
    }

}
?>