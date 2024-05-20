<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>
<?php include('includes/descargayt.php'); ?>


<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- mensajes de alerta -->

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>

      <!-- vista para agregar la tarea en el fomulario -->
      <div class="card card-body">
        <form action="guardar_tarea.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo de Tarea" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de Tarea"></textarea>
          </div>
          <input type="submit" name="guardar_tarea" class="btn btn-success btn-block" value="Guardar Tarea">
        </form>
      </div>
    </div>

    <div class="card card-body">
        <form action="descargayt.php" method="POST">
          <div class="form-group">
            <input type="text" name="url" class="form-control" placeholder="Url" autofocus>
          </div>
          <div class="form-group">
            <textarea name="formato" rows="2" class="form-control" placeholder="formato mp4 o mp3"></textarea>
          </div>
          <input type="submit" name="descarga" class="btn btn-success btn-block" value="descargar">
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tarea";
          $resultado_tarea = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($resultado_tarea)) { ?>
            <tr>
              <td><?php echo $row['titulo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['fecha']; ?></td>
              <td>
                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="eliminar_tarea.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>



<?php include('includes/footer.php'); ?>