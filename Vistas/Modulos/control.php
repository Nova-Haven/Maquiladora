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
        <div class="card-header">
        </div>
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Fecha</th>
                    <th>Observaciones</th>
                    <th>Registro</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    //echo dirname(__FILE__);
                    require_once (realpath(dirname(__FILE__)."/../../Modelo/mdl_control.php"));
                    foreach(Controlmdl::mdlObtenerobservaciones() as $key => $value)
                      echo '<tr>
                      <td>'.$value["folio"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>'.$value["observaciones"].'</td>
                      <td>
                      <a><input type="button" class="btn btn-secondary" value="Registro" data-toggle="modal" data-target="#modal-ob"></a>
                      </td> 
                      </tr>';
                    
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
                    <form method="post" role="form">
                    <div class="modal-header">
                      <h4 class="modal-title">Registrar Observaciones/h4>
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
      <input type="text" class="form-control" placeholder="Ingresa observaciones" name="txt_ob">
    </div>
  </div>
</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary" name="guardar_alumno">Guardar Observaciones</button>
</div>

                    </form>
                    
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
