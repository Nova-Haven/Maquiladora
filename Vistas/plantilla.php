<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Psicología</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <link rel="stylesheet" href="Vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Vistas/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
  echo '<div class="wrapper">';
?>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center ">
    <img  src="Assets/cona.png" alt="cona" height="60" width="60"> 
   </div>
   
    <?php
    if(isset($_SESSION['pantalla']) && $_SESSION['pantalla']== 'activa'){
        // <!-- Navbar -->
        include "Vistas/Modulos/nav.php"; 
        //<!-- Main Sidebar Container -->
        include "Vistas/Modulos/aside.php";
        //<!-- Listas amigables -->
        if(isset($_GET["ruta"])){
            if($_GET["ruta"]=="inicio" ||
                $_GET["ruta"]=="calendario" ||
                $_GET["ruta"]=="alumnos" ||
                $_GET["ruta"]=="estadisticas" ||
                $_GET["ruta"]=="control" ||
                $_GET["ruta"]=="salir" ||
                $_GET["ruta"]=="404" 
            ){
                include "Vistas/Modulos/".$_GET["ruta"].".php";
            }else{
              include "Vistas/Modulos/404.php"; 
            }
        }
        
        include "Vistas/Modulos/footer.php"; 
        echo '</div>';
       }else{
        include "Vistas/Modulos/pantalla.php"; 
      }
    ?>


  <!-- Navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <!-- Control Sidebar -->

<!-- ./wrapper -->
<!-- jQuery -->
<script src="Vistas/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="Vistas/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="Vistas/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="Vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="Vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="Vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Vistas/plugins/moment/moment.min.js"></script>
<script src="Vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="Vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="Vistas/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="Vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Vistas/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Vistas/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Vistas/dist/js/pages/dashboard.js"></script>

<!-- jQuery -->
<script src="Vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="Vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="Vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="Vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="Vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="Vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="Vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="Vistas/plugins/jszip/jszip.min.js"></script>
<script src="Vistas/plugins/pdfmake/pdfmake.min.js"></script>
<script src="Vistas/plugins/pdfmake/vfs_fonts.js"></script>
<script src="Vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="Vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="Vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SWEETALERT2 -->
<script src="Vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="Vistas/plugins/sweetalert2/sweetalert2.min.css"></script>
<!-- AdminLTE App -->
<script src="Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Vistas/dist/js/demo.js"></script>
</body>
</html>
