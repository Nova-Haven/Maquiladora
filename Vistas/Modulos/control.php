<?php require_once (realpath(dirname(__FILE__)."/../../Modelo/mdl_control.php")); 
if (isset($_GET['mat'])) {
  $_COOKIE['mat'] = $_GET['mat'];
}
if (isset($_POST['txt_ob'])){ 
  Controlmdl::mdlGuardarobservaciones($_POST['txt_ob'],$_COOKIE['mat']);
  unset($_COOKIE['mat']);
  //unset($_GET['mat']);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Control</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Control</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <a><input type="button" class="btn btn-secondary" value="Registro" data-toggle="modal" data-target="#modal-ob"></a>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Folio</th>
            <th>Fecha</th>
            <th>Observaciones</th>
          </tr>
          </thead>
          <tbody>
            <?php
              foreach(Controlmdl::mdlObtenerobservaciones() as $key){
                echo '<tr>
                <td>'.$key["folio"].'</td>
                <td>'.$key["fecha"].'</td>
                <td>'.$key["observaciones"].'</td> 
                </tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-ob">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h4 class="modal-title">Registrar Observaciones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="hidden" name="mat" value="<?php echo $_GET['mat'];?>" />
              <input type="text" class="form-control" placeholder="Ingresa observaciones" name="txt_ob">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Observaciones</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>