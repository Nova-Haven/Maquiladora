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
        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal-cliente">
          Registrar Alumnos
        </button>
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
            $idClientess = NULL;
            $obj_mcliente = Alumnomdl::mdlObtenerAlumno();
            foreach ($obj_mcliente as $key => $value) {
              echo '<tr>
                      <td>' . $value["Matricula"] . '</td>
                      <td>' . $value["Nom"] . '</td>
                      <td>' . $value["App"] . '</td>
                      <td>' . $value["Apm"] . '</td>
                      <td>' . $value["Grup"] . '</td>
                      <td>' . $value["Carr"] . '</td>
                      <td>' . $value["TutorCel"] . '</td>
                      <td>' . $value["CelAlum"] . '</td>
                      <td>
                      <a href="control?mat=' . $value["Matricula"] . '"><input type="button" class="btn btn-secondary" value="Ir" ></a>
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
<div class="modal fade" id="modal-cliente" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Registrar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" class="form-control" placeholder="Ingresa la matricula" name="txt_matri" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="guardar_alumno">Guardar Alumno</button>
        </div>

        <?php
        if (isset($_POST['guardar_alumno'])) {
          $matricula = $_POST['txt_matri'];
          $info_alumno = Alumnomdl::obtenerInfoAlumnoDesdeExcel($matricula);

          if ($info_alumno) {
            $resultado = Alumnomdl::mdlGuardarAlumno($info_alumno);
            if ($resultado === 'correcto') {
              echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Alumno guardado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = 'alumnos';
                        });
                    </script>";
            } else {
              echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error al guardar el alumno'
                        });
                    </script>";
            }
          } else {
            echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'No encontrado',
                        text: 'Matrícula no encontrada en el CSV'
                    });
                </script>";
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