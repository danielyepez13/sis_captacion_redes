<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventario | Recuperar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/css/adminlte.min.css">
  <!-- Estilos customizados -->
  <link rel="stylesheet" href="../Assets/css/inicio.css">
  <link rel="stylesheet" href="../Assets/css/adicional.css">

</head>

<body class="hold-transition login-page">

  <!-- Content Header (Page header) -->
  <section class="content-header w-100 mb-3">
    <div class="container-fluid">
        <?php
        // Mensajes que se devuelven de las consultas
        $msg = "";
        $msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
        $texto = '';
        $alerta = '';

        if ($msg == 'usuario_no_encontrado') {
          $texto = 'El usuario que se ha ingresado no existe en la Base de datos';
          $alerta = 'warning';
        }
        // Muestra el mensaje en caso de que la variable no este vacía
        if (!empty($msg)) {
          echo "<div class='alert alert-$alerta alert-dismissible fade show mt-3 mx-3' role='alert'>
            $texto
            <a href='http://localhost/Proyecto%20Inventario/Inicio/recuperacion' class='close' >
              <span aria-hidden='true'>&times;</span>
            </a>
          </div>";
        }
        ?>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Recuperar contraseña</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="recuperar" method="POST" id="recuperar">
              
              <div class="card-body">
                <div class="form-group">
                  <label for="cedula" class="label">Cédula</label>
                  <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese su cédula">
                  <br>
                  <label for="contra">Contraseña</label>
                  <input type="password" name="contra" id="contra" class="form-control" placeholder="Ingrese su contraseña">
                  <br>
                  <label for="contra_rep">Repita la contraseña: </label>
                  <input type="password" id="contra_rep" name="contra_rep" class="form-control" placeholder="Repita su contraseña">
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <footer class="main-footer w-100">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- </div> -->
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../Assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../Assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery-validation -->
  <script src="../Assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../Assets/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../Assets/js/adminlte.min.js"></script>
  <script src="../Assets/js/validacion_adi.js"></script>
  </script>
</body>

</html>