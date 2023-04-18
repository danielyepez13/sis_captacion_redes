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

    // El primer parámetro que posee es para filtrar la lista de usuarios que se hace al crear un nuevo bien en la vista del administrador
    public function selectUsuarios($sin_verificador = '')
    {
        
        $sql = "SELECT * FROM usuarios ORDER BY fecha_registro DESC, hora_registro DESC";
        
        $res = $this->listar($sql);
        return $res;
    }

    public function selectUsuario(string $identificador, string $contrasena = '')
    {
        $this->identificador = $identificador;
        $this->contrasena = $contrasena;
        if (!empty($this->contrasena)) {
            $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.cedula, u.contrasena, u.rol, u.fecha_registro, u.hora_registro, u.estatus_usuario, r.id_rol, r.nombre_rol FROM usuarios as u INNER JOIN rol as r ON u.rol = r.id_rol WHERE cedula = '{$this->identificador}' AND contrasena = '{$this->contrasena}'";
        } else {
            // Permite versatilidad para realizar las listas de usuario en otras vistas, sin crear otra función
            $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.cedula, u.contrasena, u.rol, u.fecha_registro, u.hora_registro, u.estatus_usuario, r.id_rol, r.nombre_rol FROM usuarios as u INNER JOIN rol as r ON u.rol = r.id_rol WHERE id_usuario = '{$this->identificador}'";
        }
        $res = $this->buscar($sql);
        return $res;
    }

    // Permite verificar si el usuario ingresado se encuentra en la base de datos
    public function verificarUsuario(string $cedula){
        $this->cedula = $cedula;
        // Sentencia que verifica si el usuario ya se ha registrado
        $sql = "SELECT * FROM usuarios WHERE cedula = '{$this->cedula}'";

        // Devuelve true o false si encuentra o no resultados que coincidan.
        $verificar = $this->verificar($sql);
        return $verificar;
    }

    public function insertUsuarios(string $nombre, string $apellido, string $cedula, string $contrasena, string $rol, string $fecha, string $hora)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->contrasena = $contrasena;
        $this->rol = intval($rol);
        $this->fecha = $fecha;
        $this->hora = $hora;

        // Sentencia que verifica si el usuario ya se ha registrado
        $sql = "SELECT * FROM usuarios WHERE cedula = '{$this->cedula}'";

        // Devuelve true o false si encuentra o no resultados que coincidan.
        $verificar = $this->cantidad($sql);
        if ($verificar < 1) {
            // Query que carga al usuario que se desea insertar en el registro
            $query = "INSERT INTO usuarios(nombre, apellido, cedula, contrasena, rol, fecha_registro, hora_registro) VALUES ('{$this->nombre}','{$this->apellido}', '{$this->cedula}', '{$this->contrasena}', {$this->rol}, '{$this->fecha}', '{$this->hora}')";

            // Devuelve verdadero o falso dependiendo si logró realizar la sentencia
            $resul = $this->registrar($query);
        } else {
            $resul = "existe";
        }
        return $resul;
    }
    public function modificarUsuarios(string $id_usuario, string $nombre, string $apellido, string $rol, string $cedula, string $contra)
    {
        // Instancia las variables para la carga de los datos del bien
        $this->id_usuario = intval($id_usuario);
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rol = intval($rol);
        $this->cedula = $cedula;
        $this->contra = $contra;

        if (!empty($this->contra)) {
            $query = "UPDATE usuarios SET nombre= '{$this->nombre}',
               apellido = '{$this->apellido}',
               cedula = '{$this->cedula}',
               contrasena = '{$this->contra}',
               rol = {$this->rol}
               WHERE id_usuario = {$this->id_usuario}";
        } else {
            $query = "UPDATE usuarios SET nombre= '{$this->nombre}',
               apellido = '{$this->apellido}',
               rol = {$this->rol},
               cedula = '{$this->cedula}'
               WHERE id_usuario = {$this->id_usuario}";
        }

        $resul = $this->registrar($query);
        return $resul;
    }

    public function deshabilitarUsuarios(int $id_usuario){
        $this->id_usuario = $id_usuario;

        $query = "UPDATE usuarios SET
                estatus_usuario=0
                WHERE id_usuario = {$this->id_usuario}";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function habilitarUsuarios(int $id_usuario){
        $this->id_usuario = $id_usuario;

        $query = "UPDATE usuarios SET
                estatus_usuario=1
                WHERE id_usuario = {$this->id_usuario}";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function cambiarContra(string $clave, string $id)
    {
        $this->clave = $clave;
        $hash = hash("SHA256", $this->clave);
        $this->id = intval($id);
        $query = "UPDATE usuarios SET contrasena = '$hash' WHERE id_usuario = {$this->id}";
        $resul = $this->registrar($query);
        return $resul;
    }

    public function contraRecuperar(string $clave, string $cedula){
        $this->clave = $clave;
        $hash = hash("SHA256", $this->clave);
        $this->cedula = $cedula;
        $query = "UPDATE usuarios SET contrasena = '$hash' WHERE cedula = '{$this->cedula}'";
        $resul = $this->registrar($query);
        return $resul;
    }

}
