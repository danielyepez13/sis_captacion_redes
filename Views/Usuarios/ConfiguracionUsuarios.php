<?php
$menu_open = 'configuracion';
$activo = 'ConfiguracionUsuarios';
$titulo = 'Configuración de usuarios';
$msg = !empty($_GET['msg']) ? $_GET['msg'] : "";

// Requiere el encabezado
encabezado($menu_open, $activo, $msg, $titulo);
$nombre_completo = explode(" ", $data['nombre']);
?>
<div class="container-fluid">
    <form action="../Usuarios/configurar" id="configurar_datos" method="POST">
        <input type="hidden" id="id_usuario_datos" name="id_usuario_datos" value="<?=$data['id_usuario'] ?>">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="nombre_datos">Nombre: </label>
                <input type="text" id="nombre_datos" name="nombre_datos"  class="form-control" value="<?=$nombre_completo[0]?>" onkeypress="return letras(event)">
            </div>
            <div class="col-lg-6 mb-3">
                <label for="apellido_datos">Apellido: </label>
                <input type="text" id="apellido_datos" name="apellido_datos" class="form-control" value="<?=$nombre_completo[1]?>" onkeypress="return letras(event)">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="cedula_datos">Cédula: </label>
                <input type="text" id="cedula_datos" name="cedula_datos" value="<?=$data['cedula']?>" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="nombre_rol_datos">Rol: </label>
                <input type="text" name="nombre_rol_datos" id="nombre_rol_datos" value="<?=$data['nombre_rol']?>" class="form-control" readonly>
                <input type="hidden" name="rol_datos" id="rol_datos" value="<?=$data['rol']?>">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="modificar">Guardar</button>
        </div>
    </form>

    <hr class="my-3">

    <form action="../Usuarios/cambiar" id="configurar_pass" method="POST">
        <input type="hidden" id="id_usuario_datos" name="id_usuario_datos" value="<?=$data['id_usuario'] ?>">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="contra">Contraseña: </label>
                <input type="password" id="contra" name="contra" class="form-control">
            </div>
            <div class="col-lg-6 mb-3">
                <label for="contra_rep">Repita la contraseña: </label>
                <input type="password" id="contra_rep" name="contra_rep" class="form-control">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="modificar">Cambiar</button>
        </div>
    </form>
</div>
    <!-- Requiere el footer o pie de la página -->
    <?php pie($menu_open) ?>