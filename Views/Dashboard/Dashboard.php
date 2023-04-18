<?php
$menu_open = 'dashboard';
$activo = 'dashboard';
$titulo = 'Captación de personal de redes';
// Requiere el encabezado
encabezado($menu_open, $activo, $activo, $titulo);

?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="row justify-content-around">
      <!-- Contador de Bienes -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            
            <h3>0</h3>

            <p>Pruebas Realizadas</p>
          </div>
          <div class="icon">
            <i class="ion ion-folder"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Contador de Actas -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            
            <h3>0</h3>

            <p>Pruebas Aprobadas</p>
          </div>
          <div class="icon">
            <i class="ion ion-document"></i>
          </div>
          <a href="#" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>


    </div>


  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Requiere el footer o pie de la página -->
<?php pie($activo) ?>