<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formex</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="node_modules/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <script type="module" src="node_modules/@ionic/core/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="node_modules/@ionic/core/dist/ionic/ionic.js"></script>
  <link rel="stylesheet" href="node_modules/@ionic/core/css/ionic.bundle.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="Vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="node_modules/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Vistas/plugins/summernote/summernote-bs4.min.css">
  <style>
    .icon ion-icon {
      font-size: clamp(45px, 6vw, 85px);
      /* Minimum 45px, maximum 85px */
      position: absolute;
      right: 15px;
      top: 15px;
      color: rgba(0, 0, 0, 0.15);
      transition: font-size 0.3s ease;
    }

    .small-box:hover .icon ion-icon {
      font-size: clamp(50px, 6.5vw, 90px);
      /* Slightly larger on hover */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center ">
      <img src="Assets/cona.png" alt="cona" height="60" width="60">
    </div>
    <noscript>
      <div class="alert alert-danger">
        This application requires JavaScript to be enabled.
      </div>
    </noscript>

    <?php
    try {
      $db = Conexion::ensureConnection();
    } catch (Exception $e) {
      // Show a user-friendly error message
      echo "<div class='alert alert-danger'>System temporarily unavailable</div>";
      // Optionally redirect to an error page
      // header("Location: error.php");
      //exit();
    }
    if (isset($_SESSION['access']) && $_SESSION['access'] == true) {
      // <!-- Navbar -->
      include "Vistas/Modulos/nav.php";
      //<!-- Main Sidebar Container -->
      include "Vistas/Modulos/aside.php";
      //<!-- Listas amigables -->
      if (isset($_GET["ruta"])) {
        $valid_routes = [
          "inicio",
          "calendario",
          "alumnos",
          "estadisticas",
          "control",
          "salir",
          "404"
        ];

        if (in_array($_GET["ruta"], $valid_routes)) {
          $route_file = "Vistas/Modulos/" . $_GET["ruta"] . ".php";
          include $route_file;
        } else {
          include "Vistas/Modulos/404.php";
        }
        include "Vistas/Modulos/footer.php";
        echo '</div>';
      }
    } else {
      include "Vistas/Modulos/pantalla.php";
    }
    ?>
  </div>


  <!-- Navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <!-- Control Sidebar -->

  <!-- ./wrapper -->
  <script>
    window.onerror = function (msg, url, lineNo, columnNo, error) {
      console.error('Error: ' + msg + '\nURL: ' + url + '\nLine: ' + lineNo);
      return false;
    };
  </script>

  <!-- Core Dependencies -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- jQuery UI -->
  <script src="node_modules/jquery-ui/dist/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Plugins -->
  <script src="node_modules/moment/min/moment.min.js"></script>
  <script src="node_modules/chartjs/chart.js"></script>
  <script src="node_modules/sparklines/source/sparkline.js"></script>
  <script src="node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="node_modules/jqvmap/dist/maps/jquery.vmap.usa.js"></script>
  <script src="node_modules/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="node_modules/daterangepicker/daterangepicker.js"></script>
  <script src="node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="node_modules/summernote/dist/summernote-bs4.min.js"></script>
  <script src="node_modules/overlayScrollbars/browser/overlayscrollbars.browser.es5.min.js"></script>

  <!-- DataTables -->
  <script src="node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
  <script src="node_modules/datatables-responsive/js/responsive.bootstrap.js"></script>
  <script src="node_modules/datatables-buttons/js/dataTables.buttons.js"></script>
  <script src="node_modules/datatables-buttons/js/buttons.bootstrap.js"></script>
  <script src="node_modules/datatables-buttons/js/buttons.html5.js"></script>
  <script src="node_modules/datatables-buttons/js/buttons.print.js"></script>
  <script src="node_modules/datatables-buttons/js/buttons.colVis.js"></script>

  <!-- PDF Generation -->
  <script src="node_modules/jszip/dist/jszip.min.js"></script>
  <script src="node_modules/pdfmake/build/pdfmake.min.js"></script>
  <script src="node_modules/pdfmake/build/vfs_fonts.js"></script>

  <!-- SweetAlert2 -->
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

  <!-- AdminLTE -->
  <script src="Vistas/dist/js/adminlte.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize DataTables
      if ($.fn.DataTable) {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      }

      // Initialize Bootstrap tooltips and popovers
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      });
    });
  </script>
</body>

</html>