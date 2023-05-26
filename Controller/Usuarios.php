<?php
class Usuarios extends Controllers
{
    public function __construct()
    {

        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ../Inicio");
        }
        parent::__construct();
    }

    // Clave Pública recaptcha
    // 6LcKyKcjAAAAAP_WPv_OuqlKWr8SmfDe6Hw9m4jz
    // Clave secreta recaptcha
    // 6LcKyKcjAAAAAK6GdNWgCZCUTuNbcRjEvr8oIe3T

    // Método que permite iniciar sesión
    public function login()
    {
        // Solicita que tanto la cedula como la contraseña del usuario no esten vacíos
        if (!empty($_POST['cedula']) && !empty($_POST['contra'])) {
            $cedula = $_POST['cedula'];
            $contra = $_POST['contra'];
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LcKyKcjAAAAAK6GdNWgCZCUTuNbcRjEvr8oIe3T';

            // Envia la información del captcha
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            // La recibe en formato json
            $arr = json_decode($response, true);

            // Comprubea si la validación fue exitosa
            if ($arr['success']) {

                // Mediante la función hash permite encriptar la contraseña
                $hash = hash("SHA256", $contra);
                $data = $this->model->selectUsuario($cedula, $hash);
                if (!empty($data)) {
                    $_SESSION['id'] = $data['id_usuario'];
                    $_SESSION['nombre'] = $data['nombre'] . " " . $data['apellido'];
                    $_SESSION['cedula'] = $data['cedula'];
                    // $_SESSION['correo'] = $data['correo'];
                    $_SESSION['nombre_rol'] = $data['nombre_rol'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['activo'] = true;
                    header('location: ../Dashboard/dashboard');
                } else {
                    $error = 'error-usuario';
                    header("location: ../Inicio?msg=$error");
                }
                // De caso contrario surge un error
            } else {
                $error = 'error-captcha';
                header("location: ../Inicio?msg=$error");
            }
        } else {
            $error = 'error-vacio';
            header("location: ../Inicio?msg=$error");
        }
    }

    // Método que permitirá cerrar la sesión iniciada
    public function logout(int $prueba)
    {
        session_destroy();
        if($prueba == 1){
            header("Location: ../../Inicio?msg=prueba_terminada");
            // echo '1';
        }else if($prueba == 2){
            header("Location: ../../Inicio?msg=prueba_terminada_error");
        }
        else{
            // echo null;
            header("Location: ../Inicio");
        }
    }

    // Trae la vista del listado de usuarios
    public function listar()
    {
        $data = $this->model->selectUsuarios();
        $this->views->getView($this, "ListarUsuarios", $data);
    }

    // Trae la lista de roles
    public function registrar()
    {
        // Instancio una variable vacía para evitar errores posteriores
        $rol = "";

        $rol .= "<option value='' selected>Seleccione un rol</option>";

        // Busco en la base de datos los roles que aparecen
        $resul_roles = $this->model->selectRoles();

        // Se crea el forach para listar todos los roles
        foreach ($resul_roles as $roles) {
            if ($_SESSION['rol'] != 1) {
                if ($roles['id_rol'] != 1) {
                    $rol .= "<option value='$roles[id_rol]'>$roles[nombre_rol]</option>";
                }
            } else {
                $rol .= "<option value='$roles[id_rol]'>$roles[nombre_rol]</option>";
            }
        }

        $respuesta = array('rol' => $rol);
        echo json_encode($respuesta);
        die();
    }

    // Ejecuta las funciones para guardar los datos en la BD del usuario y devolver una respuesta
    public function insertar()
    {
        $nombre = $_POST['nombre_regis'];
        $apellido = $_POST['apellido_regis'];
        $cedula = $_POST['cedula_regis'];
        $contrasena = $_POST['contrasena_regis'];
        $cargo = $_POST['cargo_postulado'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $hash = hash("SHA256", $contrasena);
        $rol = $_POST['rol_regis'];

        // Busca la función en el modelo para insertar los datos en la BD
        $insert = $this->model->insertUsuarios($nombre, $apellido, $cedula, $hash, $rol, $fecha, $hora, $cargo);

        // Realiza la condicional para retornar una respuesta al usuario dependiendo del resultado
        if ($insert === 'existe') {
            $data = 'existe_usuario';
            header('Location: ../Usuarios/listar?msg=' . $data);
            die();
        }
        // En caso de que se devuelva True o False como resultado
        if ($insert === true) {
            $data = 'exito_usuario';
            header('Location: ../Usuarios/listar?msg=' . $data);
            die();
        } else {
            $data = 'error_usuario';
            header('Location: ../Usuarios/listar?msg=' . $data);
            die();
        }
    }

    public function ver()
    {
        $user = $_POST['user'];
        $estatus = "";

        $visualizar = $this->model->selectUsuario($user);
        if ($visualizar['estatus_usuario'] == true) {
            $estatus = 'Activo';
        } else {
            $estatus = 'Deshabilitado';
        }

        $respuesta = array("nombre" => $visualizar['nombre'] . " " . $visualizar['apellido'], "cedula" => $visualizar['cedula'], "rol" => $visualizar['nombre_rol'], "cargo" => $visualizar['nombre_cargo'], "fecha_registro" => $visualizar['fecha_registro'], "hora_registro" => $visualizar['hora_registro'], "estatus_usuario" => $estatus);
        echo json_encode($respuesta);
        die();
    }

    public function editar()
    {
        $id_usuario = intval($_POST['editar']);
        // Se busca el usuario específico
        $data = $this->model->selectUsuario($id_usuario);

        // Se instancia una variable vacía para evitar errores posteriores
        $rol = "";

        // Se concatena la primera opción que fue la que ya estaba en la base de datos
        $rol .= "<option value='$data[rol]' selected>$data[nombre_rol]</option>";

        // Se busca en la base de datos los roles que aparecen
        $resul_roles = $this->model->selectRoles();

        foreach ($resul_roles as $roles) {
            if ($_SESSION['rol'] != 1) {
                if ($roles['id_rol'] != 1) {
                    // Mientras la lista de roles sean diferentes del actual, entrarán en la condicional
                    if ($data['rol'] != $roles['id_rol']) {
                        $rol .= "<option value='$roles[id_rol]'>$roles[nombre_rol]</option>";
                    }
                }
            } else {
                // Mientras la lista de roles sean diferentes del actual, entrarán en la condicional
                if ($data['rol'] != $roles['id_rol']) {
                    $rol .= "<option value='$roles[id_rol]'>$roles[nombre_rol]</option>";
                }
            }
        }

        $cargo = '<label for="cargo_edit">Cargo: </label>
        <select name="cargo_edit" id="cargo_edit" class="form-control">';
        $cargo .= "<option value='$data[cargo_postulado]' selected>$data[nombre_cargo]</option>";
        $resul_cargos = $this->model->selectCargos();

        foreach ($resul_cargos as $cargos) {
            // Mientras la lista de cargos sean diferentes del actual entrarán en la condicional
            if ($data['cargo_postulado'] != $cargos['id_cargo']) {
                $cargo .= "<option value='$cargos[id_cargo]'>$cargos[nombre_cargo]</option>";
            }
        }
        $cargo .= "</select>";

        $respuesta = array('nombre' => $data['nombre'], 'apellido' => $data['apellido'], 'rol' => $rol, 'cargo' => $cargo,'cedula' => $data['cedula'], 'id_usuario' => $id_usuario);
        echo json_encode($respuesta);
        die();
    }
    public function modificar()
    {
        $id_usuario = $_POST['id_usuario_edit'];
        $nombre = $_POST['nombre_edit'];
        $apellido = $_POST['apellido_edit'];
        $rol = $_POST['rol_edit'];
        $cargo = $_POST['cargo_edit'];
        $cedula = $_POST['cedula_edit'];
        $contra = $_POST['contra_edit'];
        $hash = hash("SHA256", $contra);

        $modificar = $this->model->modificarUsuarios($id_usuario, $nombre, $apellido, $rol, $cedula, $hash, $cargo);
        if ($modificar) {
            $data = 'modif_exito';
            header('Location: ../Usuarios/listar?msg=' . $data);
            die();
        } else {
            $data = 'modif_error';
            header('Location: ../Usuarios/listar?msg=' . $data);
            die();
        }
        // echo $data;
    }

    public function deshabilitar(string $id_usuario)
    {
        $this->id_usuario = intval($id_usuario);

        $deshabilitar = $this->model->deshabilitarUsuarios($this->id_usuario);
        if ($deshabilitar) {
            $data = 'desha_exito';
        } else {
            $data = 'desha_error';
        }
        header('Location: ../../Usuarios/listar?msg=' . $data);
    }

    public function habilitar(string $id_usuario)
    {
        $this->id_usuario = intval($id_usuario);

        $habilitar = $this->model->habilitarUsuarios($this->id_usuario);
        if ($habilitar) {
            $data = 'ha_exito';
        } else {
            $data = 'ha_error';
        }
        header('Location: ../../Usuarios/listar?msg=' . $data);
    }

    public function configuracion()
    {
        $id_usuario = intval($_SESSION['id']);
        // Busco el usuario específico
        $data = $this->model->selectUsuario($id_usuario);

        $data = array('nombre' => $data['nombre'] . " " . $data['apellido'], 'nombre_rol' => $data['nombre_rol'], 'rol' => $data['rol'], 'cedula' => $data['cedula'], 'id_usuario' => $id_usuario);
        $this->views->getView($this, "ConfiguracionUsuarios", $data);
    }

    public function configurar()
    {
        $id_usuario = $_POST['id_usuario_datos'];
        $nombre = $_POST['nombre_datos'];
        $apellido = $_POST['apellido_datos'];
        $rol = $_POST['rol_datos'];
        $cedula = $_POST['cedula_datos'];

        var_dump($id_usuario, $nombre, $apellido, $rol, $cedula);

        $modificar = $this->model->modificarUsuarios($id_usuario, $nombre, $apellido, $rol, $cedula, "");
        if ($modificar) {
            $data = 'modif_exito';
            header('Location: ../Usuarios/configuracion?msg=' . $data);
            die();
        } else {
            $data = 'modif_error';
            header('Location: ../Usuarios/configuracion?msg=' . $data);
            die();
        }

        // var_dump($modificar);
        // echo $data;
    }

    public function cambiar()
    {
        $id = $_POST['id_usuario_datos'];
        $actual = $_POST['contra'];
        $hash = hash("SHA256", $actual);

        // var_dump($id, $actual, $hash);

        $cambiar = $this->model->cambiarContra($hash, $id);
        if ($cambiar) {
            $data = 'modif_exito';
            header('Location: ../Usuarios/configuracion?msg=' . $data);
            die();
        } else {
            $data = 'modif_error';
            header('Location: ../Usuarios/configuracion?msg=' . $data);
            die();
        }
    }

    public function cargos()
    {
        $cargos = $this->model->selectCargos();

        $resul_cargos = "<select name='cargo_postulado' id='cargo_postulado' class='form-control' required>
        <option value='' >Seleccione un cargo para el usuario postulado</option>";
        foreach ($cargos as $cargo) {
            $resul_cargos .= "<option value='$cargo[id_cargo]'>$cargo[nombre_cargo]</option>";
        }
        $resul_cargos .= "</select>";

        echo $resul_cargos;
        die();
    }
}