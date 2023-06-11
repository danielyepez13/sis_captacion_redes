<?php
class PruebasModel extends Conexion{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectPruebas()
    {
        // Se renombró el segmento donde se busca en usuarios los evaluadores como a y los evaluados como b
        // Se hizo igual con cualquier elemento que proviniera de ellos para que no existieran conflictos al listarlos
        $query = "SELECT p.id_prueba, p.evaluador, p.evaluado, p.max_preguntas, p.cant_resp_correctas, p.fecha_reg_prue, p.hora_reg_prue, p.status_prueba, a.nombre as nombre_evaluador, a.apellido as apellido_evaluador, b.nombre as nombre_evaluado, b.apellido as apellido_evaluado, st.estatus FROM pruebas as p INNER JOIN usuarios as a ON p.evaluador = a.id_usuario INNER JOIN usuarios as b ON p.evaluado = b.id_usuario INNER JOIN status_prueba as st ON p.status_prueba = st.id_est_prue ORDER BY status_prueba ASC, fecha_reg_prue DESC";
        $resul = $this->listar($query);
        return $resul;
    }

    public function selectPrueba(string $id)
    {
        $query = "SELECT p.id_prueba, p.evaluador, p.evaluado, p.max_preguntas, p.cant_resp_correctas, p.fecha_reg_prue, p.hora_reg_prue, p.status_prueba, a.nombre as nombre_evaluador, a.apellido as apellido_evaluador, b.nombre as nombre_evaluado, b.apellido as apellido_evaluado, b.cargo_postulado, st.estatus, c.nombre_cargo FROM pruebas as p INNER JOIN usuarios as a ON p.evaluador = a.id_usuario INNER JOIN usuarios as b ON p.evaluado = b.id_usuario INNER JOIN status_prueba as st ON p.status_prueba = st.id_est_prue INNER JOIN cargo_postulado as c ON b.cargo_postulado = c.id_cargo WHERE id_prueba = $id";
        $resul = $this->buscar($query);
        return $resul;
    }

    public function selectEvaluados(){
        $query = "SELECT * FROM usuarios WHERE rol = 4";
        $resul = $this->listar($query);
        return $resul;
    }

    public function selectPreguntaPorOpcion(string $opcion){
        $query = "SELECT * FROM preguntas WHERE respuestas = '$opcion'";
        $resul = $this->listar($query);
        return $resul;
    }

    public function selectPreguntaCorrecta(int $id, string $correctas){
        $query = "SELECT * FROM preguntas WHERE id_pregunta = $id AND resp_correctas = '$correctas'";
        $resul = $this->cantidad($query);
        return $resul;
    }

    public function selectPruebaDelUsuario(int $id_prueba){
        $query = "SELECT res.id_prueba, res.id_pregunta, res.pregunta_correcta, pre.enunciado FROM responder as res INNER JOIN preguntas as pre ON res.id_pregunta = pre.id_pregunta WHERE res.id_prueba = $id_prueba";
        $resul = $this->listar($query);
        return $resul;
    }

    public function insertPruebas(int $evaluador, int $evaluado, int $max_preguntas, string $fecha, string $hora)
    {

        // Query que carga al usuario que se desea insertar en el registro
        $query = "INSERT INTO pruebas(evaluador, evaluado, max_preguntas, fecha_reg_prue, hora_reg_prue) VALUES ($evaluador, $evaluado, $max_preguntas, '$fecha', '$hora')";

        // Devuelve verdadero o falso dependiendo si logró realizar la sentencia
        $resul = $this->registrar($query);

        return $resul;
    }
    
    public function deshabilitarPruebas(int $id_prueba)
    {
        $query = "UPDATE pruebas SET
                status_prueba=4
                WHERE id_prueba = $id_prueba";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function habilitarPruebas(int $id_prueba)
    {
        $query = "UPDATE pruebas SET
                status_prueba=3
                WHERE id_prueba = $id_prueba";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function revisionPruebas(int $id_prueba)
    {
        $query = "UPDATE pruebas SET
                status_prueba=2
                WHERE id_prueba = $id_prueba";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function realizarPrueba(){
        $max_preguntas = $_GET['max'];
        $query = "SELECT * FROM preguntas";
        $resul = $this->listar($query);

        $preguntadas = array(); // declaramos una variable que usaremos de contenedor para las preguntas ya realizadas
        $preguntas = array();
        
        $items = count($resul) - 1;

        for ($i = 1; $i <= $max_preguntas; $i++) {
            $var = rand(0, $items);
            if (in_array($resul[$var], $preguntadas)) { // Buscamos si la pregunta ya se habia hecho
                $i--; // restamos 1 para reutilizar el indice de la pregunta repetida  
            } 
            else {
                $respuestas = explode(',',$resul[$var]['respuestas']);
                $resul[$var]['respuestas'] = $respuestas;

                $preguntas[] = $resul[$var]; // Mostramos la pregunta
                $preguntadas[] = $resul[$var]; // y la agregamos a las que ya se hicieron        
            }
        }
        // print_r ($preguntas);
        return $preguntas;
    }

    // Busca la prueba que tenga asignada el usuario o postulante en la base de datos
    public function verificarUsuarioPrueba(){
        $usuario = $_SESSION['id'];
        $fecha = date('Y-m-d');
        $query = "SELECT * FROM pruebas WHERE evaluado = $usuario AND status_prueba = 1 AND fecha_reg_prue = '$fecha'";
        $result = $this->buscar($query);
        return $result;
    }

    public function verificarRegistroPrueba (int $evaluado){
        $query = "SELECT * FROM pruebas WHERE evaluado = $evaluado AND (status_prueba = 2 OR status_prueba = 1)";
        $result = $this->verificar($query);
        return $result;
    }

    public function responderPrueba(int $id_prueba, int $id_pregunta, int $pregunta_correcta, string $fecha, string $hora, string $tiempo){
        $query = "INSERT INTO responder (id_prueba, id_pregunta, pregunta_correcta, fecha_resp, hora_resp, tiempo_respuesta) VALUES ($id_prueba,$id_pregunta, $pregunta_correcta,'$fecha','$hora', '$tiempo')";
        $result = $this->registrar($query);
        return $result;
    }

    public function cantidadPreguntasPrueba(int $id){
        $query = "SELECT * FROM responder WHERE id_prueba = $id";
        $resul = $this->cantidad($query);
        return $resul;
    }

    public function cantidadPreguntasCorrectasPrueba(int $id){
        $query = "SELECT * FROM responder WHERE id_prueba = $id AND pregunta_correcta = 1";
        $resul = $this->cantidad($query);
        return $resul;
    }

    public function respuestaPrueba(int $id_prueba, int $cant){
        $query = "UPDATE pruebas SET
                status_prueba=3,
                cant_resp_correctas = $cant
                WHERE id_prueba = $id_prueba";
        $resul = $this->registrar($query);
        return $resul;
    }
}
?>