<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- mensajes de alerta -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

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

          while($row = mysqli_fetch_assoc($resultado_tarea)) { ?>
          <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST["url"];
    $formato = $_POST["formato"];

    // Ejecutar el código de Pytube con la URL y el formato proporcionados
    // Aquí debes integrar el código de Pytube para procesar la URL y el formato, y realizar la descarga del video o audio.
    // Asegúrate de tener Python instalado en el servidor y que el código de Pytube pueda ejecutarse desde PHP.

    // Ejemplo de integración básica del código de Pytube en PHP
    $command = escapeshellcmd("python3 descargar_video.py " . $url . " " . $formato);
    $output = shell_exec($command);
    echo $output;
}
?>


<!-- Formulario para que los usuarios ingresen la URL y el formato -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="url">Ingrese la URL del video de YouTube:</label><br>
    <input type="text" id="url" name="url"><br>
    <label for="formato">Seleccione el formato (mp4 o mp3):</label><br>
    <input type="text" id="formato" name="formato"><br><br>
    <input type="submit" value="Descargar">
</form>

<?php include('includes/footer.php'); ?>
