<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><b>Formex</b></a>
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
      <?php LoginCtrl::login(); ?>
    </form>
  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Ingresa tu contraseña.
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2025-2028 <b><a class="text-black">Maquiladora Formex</a></b><br>
    Todos los derechos reservados.
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="Vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>