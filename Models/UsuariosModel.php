<?php
class UsuariosModel extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectRoles()
    {
        $sql = "SELECT * FROM rol";
        $res = $this->listar($sql);
        return $res;
    }

    public function selectCargos(){
        $sql = "SELECT * FROM cargo_postulado";
        $res = $this->listar($sql);
        return $res;
    }

    public function selectUsuarios()
    {
        
        $sql = "SELECT * FROM usuarios ORDER BY fecha_registro DESC, hora_registro DESC";
        $res = $this->listar($sql);
        return $res;
    }

    public function selectUsuario(string $identificador, string $contrasena = '')
    {
        if (!empty($contrasena)) {
            $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.cedula, u.contrasena, u.rol, u.fecha_registro, u.hora_registro, u.estatus_usuario, r.id_rol, r.nombre_rol FROM usuarios as u INNER JOIN rol as r ON u.rol = r.id_rol WHERE cedula = '$identificador' AND contrasena = '$contrasena'";
        } else {
            // Permite versatilidad para realizar las listas de usuario en otras vistas, sin crear otra función
            $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.cedula, u.contrasena, u.rol, u.cargo_postulado,u.fecha_registro, u.hora_registro, u.estatus_usuario, r.id_rol, r.nombre_rol, c.nombre_cargo FROM usuarios as u INNER JOIN rol as r ON u.rol = r.id_rol INNER JOIN cargo_postulado as c ON u.cargo_postulado = c.id_cargo WHERE id_usuario = '$identificador'";
        }
        $res = $this->buscar($sql);
        return $res;
    }

    // Permite verificar si el usuario ingresado se encuentra en la base de datos
    public function verificarUsuario(string $cedula){
        // Sentencia que verifica si el usuario ya se ha registrado
        $sql = "SELECT * FROM usuarios WHERE cedula = '{$cedula}'";

        // Devuelve true o false si encuentra o no resultados que coincidan.
        $verificar = $this->verificar($sql);
        return $verificar;
    }

    public function insertUsuarios(string $nombre, string $apellido, string $cedula, string $contrasena, string $rol, string $fecha, string $hora, string $cargo)
    {
        $rol = intval($rol);
        $cargo = !empty($cargo) ? $cargo : '';

        // Sentencia que verifica si el usuario ya se ha registrado
        $sql = "SELECT * FROM usuarios WHERE cedula = '{$cedula}'";

        // Devuelve true o false si encuentra o no resultados que coincidan.
        $verificar = $this->cantidad($sql);
        if ($verificar < 1) {
            if(!empty($cargo)){
                $query = "INSERT INTO usuarios(nombre, apellido, cedula, contrasena, rol, cargo_postulado, fecha_registro, hora_registro) VALUES ('$nombre','$apellido', '$cedula', '$contrasena', $rol, $cargo,'$fecha', '$hora')";
            }else{
                $query = "INSERT INTO usuarios(nombre, apellido, cedula, contrasena, rol, fecha_registro, hora_registro) VALUES ('$nombre','$apellido', '$cedula', '$contrasena', $rol, '$fecha', '$hora')";
            }
            // Query que carga al usuario que se desea insertar en el registro

            // Devuelve verdadero o falso dependiendo si logró realizar la sentencia
            $resul = $this->registrar($query);
        } else {
            $resul = "existe";
        }
        return $resul;
    }
    public function modificarUsuarios(string $id_usuario, string $nombre, string $apellido, string $rol, string $cedula, string $contra, string $cargo)
    {
        // Instancia las variables para la carga de los datos del bien
        $id_usuario = intval($id_usuario);
        $rol = intval($rol);
        $cargo = !empty($cargo) ? $cargo : '';

        if (!empty($contra)) {
            $query = "UPDATE usuarios SET nombre= '$nombre',
               apellido = '$apellido',
               cedula = '$cedula',
               contrasena = '$contra',
               rol = $rol,
               cargo_postulado = $cargo
               WHERE id_usuario = $id_usuario";
        } else {
            $query = "UPDATE usuarios SET nombre= '$nombre',
               apellido = '$apellido',
               rol = $rol,
               cargo_postulado = $cargo,
               cedula = '$cedula'
               WHERE id_usuario = $id_usuario";
        }

        $resul = $this->registrar($query);
        return $resul;
    }

    public function deshabilitarUsuarios(int $id_usuario){

        $query = "UPDATE usuarios SET
                estatus_usuario=0
                WHERE id_usuario = $id_usuario";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function habilitarUsuarios(int $id_usuario){
        

        $query = "UPDATE usuarios SET
                estatus_usuario=1
                WHERE id_usuario = $id_usuario";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function cambiarContra(string $clave, string $id)
    {
        $hash = hash("SHA256", $clave);
        $id = intval($id);
        $query = "UPDATE usuarios SET contrasena = '$hash' WHERE id_usuario = $id";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function contraRecuperar(string $clave, string $cedula){
        $hash = hash("SHA256", $clave);
        $query = "UPDATE usuarios SET contrasena = '$hash' WHERE cedula = '$cedula'";
        $resul = $this->registrar($query);
        return $resul;
    }

}
