<?php
require_once "Modelo/mdl_inventario.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inventario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Inventario</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <?php
          $inventory = Inventario::getAll();
          echo "<strong>Periodo:</strong> {$inventory['period']['start']} - {$inventory['period']['end']}";
          ?>
        </div>

        <!-- Inventory table -->
        <div class="table-responsive">
          <table id="inventario" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th colspan="3"></th>
                <th colspan="4" style="text-align: center;">En Unidades</th>
                <th colspan="4" style="text-align: center;">En Importes (Coste Histórico)</th>
                <th></th>
              </tr>
              <tr>
                <th>Producto</th>
                <th>Nombre</th>
                <th>Método Costeo</th>
                <th>Inventario Inicial</th>
                <th>Entradas</th>
                <th>Salidas</th>
                <th>Existencia</th>
                <th>Inventario Inicial</th>
                <th>Entradas</th>
                <th>Salidas</th>
                <th>Inventario Final</th>
                <th>Error</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($inventory['data'] as $item) {
                echo '<tr>
                    <td>' . htmlspecialchars($item['producto']) . '</td>
                    <td>' . htmlspecialchars($item['nombre']) . '</td>
                    <td>' . htmlspecialchars($item['metodo_costeo']) . '</td>
                    <td>' . htmlspecialchars($item['unidades']['inventario_inicial']) . '</td>
                    <td>' . htmlspecialchars($item['unidades']['entradas']) . '</td>
                    <td>' . htmlspecialchars($item['unidades']['salidas']) . '</td>
                    <td>' . htmlspecialchars($item['unidades']['existencia']) . '</td>
                    <td>' . htmlspecialchars($item['importes']['inventario_inicial']) . '</td>
                    <td>' . htmlspecialchars($item['importes']['entradas']) . '</td>
                    <td>' . htmlspecialchars($item['importes']['salidas']) . '</td>
                    <td>' . htmlspecialchars($item['importes']['inventario_final']) . '</td>
                    <td>' . htmlspecialchars($item['error']) . '</td>
                </tr>';
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3"><strong>Totales</strong></td>
                <td><?php echo htmlspecialchars($inventory['totals']['unidades']['inventario_inicial']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['unidades']['entradas']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['unidades']['salidas']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['unidades']['existencia']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['importes']['inventario_inicial']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['importes']['entradas']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['importes']['salidas']); ?></td>
                <td><?php echo htmlspecialchars($inventory['totals']['importes']['inventario_final']); ?></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- Totals -->
        <div class="mt-3">
          <h5>Totales:</h5>
          <ul>
            <?php
            // Display error descriptions
            if ($errorCode = $item['error']) {
              echo "Error meaning: {$inventory['errors_mapping'][$errorCode]}";
            }
            ?>
          </ul>
        </div>
        <!-- Error mappings display -->
        <div class="mt-3">
          <h5>Leyenda de Errores:</h5>
          <ul>
            <?php
            foreach ($inventory['errors_mapping'] as $code => $description) {
              echo "<li>($code) " . htmlspecialchars($description) . "</li>";
            }
            ?>
          </ul>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function () {
    $('#inventario').DataTable({
      "orderCellsTop": true,
      "fixedHeader": true,
      "pageLength": 50,
      "order": [[0, "asc"]],
      "scrollX": true,
      "scrollY": "calc(100vh - 400px)",
      "scrollCollapse": true,
      "autoWidth": false,
      "columnDefs": [
        {
          "targets": [3, 4, 5, 6, 7, 8, 9, 10],
          "render": function (data, type, row) {
            if (type === 'display') {
              return parseFloat(data).toLocaleString('es-MX');
            }
            return data;
          }
        },
        {
          "targets": '_all',
          "className": 'dt-head-center dt-body-right'
        },
        {
          "targets": [0, 1, 2],
          "className": 'dt-body-left'
        }
      ],
      "language": {
        "url": "Vistas/plugins/datatables-Spanish.json"
      },
      // Add these new options
      "colReorder": false,
      "fixedColumns": {
        leftColumns: 3
      },

    });
  });
</script>