</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Diseñado con <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>

</div>
<?php
// Obteniendo URL de la ágina actual
$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];

// En caso de poseer GET se le quita
if (strrpos($url, '?') === false) {
  $sin_get = "http://" . $host . $url;
} else {
  $url = explode("?", $url);
  $sin_get = "http://" . $host . $url[0];
}

$cantidad_s = substr_count($sin_get, "/");
if ($cantidad_s >= 6) {
  $slash = '../../';
} else {
  $slash = '../';
}
?>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= $slash ?>Assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $slash ?>Assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $slash ?>Assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $slash ?>Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?= $slash ?>Assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= $slash ?>Assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Summernote -->
<script src="<?= $slash ?>Assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $slash ?>Assets/plugins/moment/moment.min.js"></script>
<script src="<?= $slash ?>Assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?= $slash ?>Assets/js/adminlte.js"></script>
<script src="<?= $slash ?>Assets/js/pages/dashboard.js"></script>
<?php
if ($pagina != 'dashboard' and $pagina != 'estadisticas') {
?>
  <!-- Assets para funcionalidades del proyecto -->
  <script src="<?= $slash ?>Assets/js/<?= ucfirst($pagina) ?>/regis_<?= $pagina ?>.js"></script>
  <script src="<?= $slash ?>Assets/js/<?= ucfirst($pagina) ?>/visua_<?= $pagina ?>.js"></script>
  <script src="<?= $slash ?>Assets/js/<?= ucfirst($pagina) ?>/modif_<?= $pagina ?>.js"></script>
  <script src="<?= $slash ?>Assets/js/<?= ucfirst($pagina) ?>/valid_<?= $pagina ?>.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= $slash ?>Assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= $slash ?>Assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel","pdf","print"],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
        //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>

<?php
  // Se colocan las condicionales para evitar conflictos con el javascript y las distintas páginas del sistema
} else if ($pagina == 'estadisticas') {
?>
  <script src="<?= $slash ?>Assets/plugins/chart.js/Chart.min.js"></script>
  <?php
  if ($estadistica == 'EstadoBien') {
  ?>
    <script>
      var estadobien = document.getElementById("estado").getContext("2d");

      var barChart = new Chart(estadobien, {
        type: 'doughnut',
        data: {
          labels: [
            <?php
            foreach ($data as $nombres) {
              echo "'" . $nombres['nombre_condicion'] . "', ";
            }
            ?>
          ],
          datasets: [{
            label: 'estado',
            data: [
              <?php

              echo $data2['bueno'] . ", " . $data2['malo'];

              ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(75, 192, 192, 0.6)',
            ]
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          }
        },
      });
    </script>
  <?php
  } else if ($estadistica == 'TipoActa') {
  ?>
    <script>
      var tipoacta = document.getElementById("tipo").getContext("2d");

      var barChart = new Chart(tipoacta, {
        type: 'doughnut',
        data: {
          labels: [
            <?php
            foreach ($data as $nombres) {
              echo "'" . $nombres['nombre_tipo'] . "', ";
            }
            ?>
          ],
          datasets: [{
            label: 'estado',
            data: [
              <?php

              echo $data2['entrega'] . ", " . $data2['salida'] . ", " . $data2['desincor'];

              ?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(75, 192, 192, 0.6)',
            ]
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top',
            },
          }
        },
      });
    </script>
  <?php
  }
  ?>
<?php
}
?>
</body>

</html>