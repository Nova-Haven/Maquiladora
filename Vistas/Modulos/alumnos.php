 <?php
 require_once "Modelo/mdl_alumno.php";
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alumnos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Alumnos</li>
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
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-cliente">
          Registrar Alumnos</button>
        </div>
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Ap Paterno</th>
                    <th>Ap Materno</th>
                    <th>Grupo</th>
                    <th>Carrera</th>
                    <th>Celular Tutor</th>
                    <th>Celular Alumno</th>
                    <th>Seguimiento</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $idClientess=NULL;
                    $obj_mcliente = Alumnomdl::mdlObtenerAlumno();
                    foreach($obj_mcliente as $key => $value){
                      echo '<tr>
                      <td>'.$value["Matricula"].'</td>
                      <td>'.$value["Nom"].'</td>
                      <td>'.$value["App"].'</td>
                      <td>'.$value["Apm"].'</td>
                      <td>'.$value["Grup"].'</td>
                      <td>'.$value["Carr"].'</td>
                      <td>'.$value["TutorCel"].'</td>
                      <td>'.$value["CelAlum"].'</td>
                      <td>
                      <a href="control"><input type="button" class="btn btn-secondary" value="Ir" ></a>
                      </td> 
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
  <div class="modal fade" id="modal-cliente">
    <div class="modal-dialog">
      <div class="modal-content">
                    <form method="post" role="form">
                    <div class="modal-header">
                      <h4 class="modal-title">Registrar Cliente</h4>
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
      <input type="text" class="form-control" placeholder="Ingresa la matricula" name="txt_matri">
    </div>
  </div>
</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary" name="guardar_alumno">Guardar Alumno</button>
</div>

<?php
if(isset($_POST['guardar_alumno'])) {
  $matricula = $_POST['txt_matri'];

  $info_alumno = Alumnomdl::obtenerInfoAlumnoDesdeExcel($matricula);

  if ($info_alumno) {
    $resultado = Alumnomdl::mdlGuardarAlumno($info_alumno);

    if ($resultado === 'correcto') {
      echo '<script>alert("Alumno guardado correctamente");</script>';
    } else {
      echo '<script>alert("Error al guardar el alumno");</script>';
    }
  } else {
    echo '<script>alert("Matrícula no encontrada en el CSV");</script>';
  }
}
?>

                    </form>
                    
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
