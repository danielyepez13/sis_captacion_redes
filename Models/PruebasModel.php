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
        $query = "SELECT p.id_prueba, p.evaluador, p.evaluado, p.max_preguntas, p.puntuacion_final, p.fecha_reg_prue, p.hora_reg_prue, p.fecha_final, p.status_prueba, a.nombre as nombre_evaluador, a.apellido as apellido_evaluador, b.nombre as nombre_evaluado, b.apellido as apellido_evaluado FROM pruebas as p INNER JOIN usuarios as a ON p.evaluador = a.id_usuario INNER JOIN usuarios as b ON p.evaluado = b.id_usuario";
        $resul = $this->listar($query);
        return $resul;
    }

    public function selectPrueba(string $id)
    {
        $query = "SELECT p.id_prueba, p.evaluador, p.evaluado, p.max_preguntas, p.puntuacion_final, p.fecha_reg_prue, p.hora_reg_prue, p.fecha_final, p.status_prueba, a.nombre as nombre_evaluador, a.apellido as apellido_evaluador, b.nombre as nombre_evaluado, b.apellido as apellido_evaluado FROM pruebas as p INNER JOIN usuarios as a ON p.evaluador = a.id_usuario INNER JOIN usuarios as b ON p.evaluado = b.id_usuario WHERE id_prueba = $id";
        $resul = $this->buscar($query);
        return $resul;
    }

    public function selectEvaluados(){
        $query = "SELECT * FROM usuarios WHERE rol = 4";
        $resul = $this->listar($query);
        return $resul;
    }

    public function insertPruebas(int $evaluador, int $evaluado, int $max_preguntas, string $fecha, string $hora)
    {
        $this->evaluador = $evaluador;
        $this->evaluado = $evaluado;
        $this->max_preguntas = $max_preguntas;
        // $this->min_puntuacion = $min_puntuacion;
        $this->fecha = $fecha;
        $this->hora = $hora;

        // Query que carga al usuario que se desea insertar en el registro
        $query = "INSERT INTO pruebas(evaluador, evaluado, max_preguntas, fecha_reg_prue, hora_reg_prue) VALUES ({$this->evaluador},{$this->evaluado}, {$this->max_preguntas}, '{$this->fecha}', '{$this->hora}')";

        // Devuelve verdadero o falso dependiendo si logró realizar la sentencia
        $resul = $this->registrar($query);

        return $resul;
    }
    
}
?>