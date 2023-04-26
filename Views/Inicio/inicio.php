<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Captación | Inicio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Assets/css/adminlte.min.css">
  <!-- Estilos customizados -->
  <link rel="stylesheet" href="Assets/css/inicio.css">
  <link rel="stylesheet" href="Assets/css/adicional.css">
  <!-- Librería para implementar el captcha de google -->
  <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
</head>

<body class="hold-transition login-page">
  <!-- <div class="wrapper"> -->
  <!-- <div class="container-fluid d-flex justify-content-center cintillo">
    <img src="Assets/img/CintilloInamujer.png" class="img-responsive" alt="">
  </div> -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <section class="content-header w-100 mb-3">
    <div class="container-fluid">
      <?php
      // Mensajes que se devuelven de las consultas
      $msg = "";
      $msg = !empty($_GET['msg']) ? $_GET['msg'] : "";
      $texto = '';
      $alerta = '';

      if ($msg == 'error-captcha') {
        $texto = 'El Captcha devolvió un error';
        $alerta = 'warning';
      } else if ($msg == 'exito_correo') {
        $texto = 'El correo se ha enviado correctamente';
        $alerta = 'success';
      } else if ($msg == 'error_correo') {
        $texto = 'Surgió un error inesperado. Si ocurre nuevamente llame a soporte técnico';
        $alerta = 'danger';
      } else if ($msg == 'error_verificar') {
        $texto = 'Surgió un error inesperado. La cédula no se encuentra registrada';
        $alerta = 'danger';
      } else if ($msg == 'error-usuario') {
        $texto = 'Los datos del usuario son incorrectos';
        $alerta = 'danger';
      } else if ($msg == 'error-vacio') {
        $texto = 'La contraseña o la cédula se encuentra vacía';
        $alerta = 'danger';
      }
      // Muestra el mensaje en caso de que la variable no este vacía
      if (!empty($msg)) {
        echo "<div class='alert alert-$alerta alert-dismissible fade show mt-3 mx-3' role='alert'>
            $texto
            <a href='http://localhost/Captacion%20Redes/Inicio' class='close' >
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
              <h3 class="card-title">Inicio de sesión</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="Usuarios/login" method="POST" id="login" novalidate="novalidate">
              <div class="card-body">
                <div class="form-group">
                  <label for="cedula" class="label">Cédula</label>
                  <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ingrese su cédula">
                </div>
                <div class="form-group">
                  <label for="contra">Contraseña</label>
                  <input type="password" name="contra" id="contra" class="form-control" placeholder="Ingrese su contraseña">
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="g-recaptcha" data-sitekey="6LcKyKcjAAAAAP_WPv_OuqlKWr8SmfDe6Hw9m4jz"></div>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-primary mt-2">Enviar</button>
                  <div class="recuperacion mt-2">
                    <a href="#" class="btn btn-secondary" data-toggle='modal' data-target='#recupModal'>Recuperación de contraseña</a>
                  </div>
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

  <?php
  include_once("Views/Modals/Usuarios/RecuperacionContrasena.php");
  ?>

  <footer class="main-footer w-100">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Diseñado con <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  </footer>

  <!-- </div> -->
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="Assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="Assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery-validation -->
  <script src="Assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="Assets/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="Assets/js/adminlte.min.js"></script>
  <script src="Assets/js/validacion_adi.js"></script>
  </script>
</body>

</html>