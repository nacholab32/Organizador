<?php
include("db.php");
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

<?php include('includes/header.php'); ?>
<div class="card card-body">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="url">Ingrese la URL del video de YouTube:</label>
            <input type="text" id="url" name="url" class="form-control" placeholder="Ej. https://www.youtube.com/watch?v=video_id">
        </div>
        <div class="form-group">
            <label for="formato">Seleccione el formato:</label>
            <select id="formato" name="formato" class="form-control">
                <option value="mp4">MP4</option>
                <option value="mp3">MP3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Descargar</button>
    </form>
</div>
<?php include('includes/footer.php'); ?>
