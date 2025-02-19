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
  <link rel="stylesheet" href="assets/fonts/SourceSansPro.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="node_modules/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <script type="module" src="node_modules/@ionic/core/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="node_modules/@ionic/core/dist/ionic/ionic.js"></script>
  <link rel="stylesheet" href="node_modules/@ionic/core/css/ionic.bundle.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
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

    .table-responsive {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    #inventario {
      width: 100%;
      min-width: 1200px;
      /* Adjust based on your content */
    }

    #inventario th,
    #inventario td {
      white-space: nowrap;
      padding: 8px;
    }

    @media (max-width: 1200px) {
      .card-body {
        padding: 0.5rem;
      }
    }

    .content-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
      overflow-y: auto;
      padding-bottom: 2rem;
    }

    .card {
      margin-bottom: 1rem;
    }

    .card-body {
      max-height: calc(100vh - 200px);
      overflow-y: auto;
    }

    /* Ensure table header stays visible when scrolling */
    .table-responsive {
      position: relative;
    }

    .dataTables_scrollHead {
      position: sticky;
      top: 0;
      z-index: 1;
      background: white;
    }
  </style>

  <!-- Core Dependencies -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center ">
      <img src="assets/img/conalep.png" alt="cona" height="60" width="60">
    </div>
    <noscript>
      <div class="alert alert-danger">
        This application requires JavaScript to be enabled.
      </div>
    </noscript>

    <?php
    try {
      Conexion::ensureConnection();
    } catch (Exception $e) {
      if (str_contains($e, "Database")) {
        error_log("Trying to initialize database...");
        if (Conexion::initializeDatabase()) {
          Conexion::ensureConnection();
        }
        echo "<div class='alert alert-warning'>La base de datos no existe, se ha creado una y la contraseña de acceso se ha establecido en `admin123`, este mensaje sólo se mostrará una vez.</div>";
      } else {
        echo "<div class='alert alert-danger'>Sistema temporalmente no disponible</div>";
      }
      // Show a user-friendly error message
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
        if ($_GET["ruta"] == "/") {
          include "Vistas/Modulos/inicio.php";
        } else if ($_GET["ruta"] == "salir") {
          LoginCtrl::logout(true);
        } else {

          $valid_routes = [
            "inventario",
            "estadisticas",
            "404"
          ];

          if (in_array($_GET["ruta"], $valid_routes)) {
            if (is_file("Vistas/Modulos/" . $_GET["ruta"] . ".php")) {
              $route_file = "Vistas/Modulos/" . $_GET["ruta"] . ".php";
              include $route_file;
            }
          } else {
            include "Vistas/Modulos/404.php";
          }
        }
        include "Vistas/Modulos/footer.php";
        echo '</div>';
      }
    } else {
      include "Vistas/Modulos/pantalla.php";
    }
    ?>
  </div>

  <!-- ./wrapper -->
  <script>
    window.onerror = function (msg, url, lineNo, columnNo, error) {
      console.error('Error: ' + msg + '\nURL: ' + url + '\nLine: ' + lineNo);
      return false;
    };
  </script>
  <!-- DataTables -->
  <script src="node_modules/datatables/media/js/jquery.dataTables.min.js"></script>

  <!-- PDF Generation -->
  <script src="node_modules/jszip/dist/jszip.min.js"></script>
  <script src="node_modules/pdfmake/build/pdfmake.min.js"></script>
  <script src="node_modules/pdfmake/build/vfs_fonts.js"></script>

  <!-- SweetAlert2 -->
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

  <!-- AdminLTE -->
  <script src="Vistas/dist/js/adminlte.min.js"></script>
</body>

</html>