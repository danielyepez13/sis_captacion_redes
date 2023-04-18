<?php
// Clase para la conexión a la base de datos
// Se heredan las variables de los datos de la conexión
class Conexion extends Datos_Conexion{
	private $con;

    // Inicializa la conexión de la base de datos, utilizando el constructor de la clase
	function __construct(){
		try{
			$this->con=mysqli_connect($this->host,$this->user,$this->pass,$this->db_name) or die ("Error en la conexion");
			mysqli_set_charset($this->con,"utf8");
		}catch(Exception $ex){
			throw $ex;
		}
	}

    // Elimina según la sentencia SQL
	function eliminar($sql){
		$res=mysqli_query($this->con,$sql);
	  	return $res;
	}

    // Lista la sentencia SQL
	function listar($sql){
	    $res=mysqli_query($this->con,$sql);
	    $data=null;
		// Evita que muestre errores al tener una tabla sin datos
		if($res !== false){
			while($fila=mysqli_fetch_assoc($res)){
				$data[]=$fila;
			}
		}
		return $data;
	}

    // Devuelve el ID generado por una consulta en una tabla con una columna que tenga el atributo AUTO_INCREMENT
	function id_insert($sql){
		$res=mysqli_query($this->con,$sql);
		$id = mysqli_insert_id($this->con);
	  	return $id;
	}

    // Registra la sentencia SQL
	function registrar($sql){
	  mysqli_query($this->con,$sql);
	  if(mysqli_affected_rows($this->con) > 0){
	    return true;
	  }else{
		return false;
	  }
	}

    // Verifica que la sentencia SQL de más de un resultado
	function verificar($sql){
		$res=mysqli_query($this->con,$sql);
		if(mysqli_num_rows($res)>=1){
			return true;
		}else{
			return false;
		}
	}

    // Comprueba la cantidad de registros de la sentencia SQL
	function cantidad($sql){
		$res=mysqli_query($this->con,$sql);
		$cant=mysqli_num_rows($res);
		return $cant;
	}

    // Busca los datos de la sentencia SQL
	function buscar($sql){
		$res=mysqli_query($this->con,$sql);
	    $data=null;
	   	while($fila=mysqli_fetch_assoc($res)){
			$data=$fila;
		}
		return $data;
	}
    
}
