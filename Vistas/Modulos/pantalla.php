<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><b>Psicología</b></a>
  </div>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="Assets/cona.png" alt="User Image">
    </div>
  <form method="post" class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" name="txt_contrasena" class="form-control" placeholder="Contraseña">

        <div class="input-group-append">
          <button type="button" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
      <?php
            $obj_login = new PantallaCtrl();
            $obj_login -> ctrlIngresoPantalla();
        ?>
    </form>
  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Ingresa tu contraseña.
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2023-2025 <b><a  class="text-black">Colegio Nacional de Educación Profesional Técnica 259, Miguel Alemán, Tam</a></b><br>
    Todos los derechos reservados.
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="Vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
