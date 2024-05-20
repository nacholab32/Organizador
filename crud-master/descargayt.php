<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST["url"];
    $formato = $_POST["formato"];

    // Ejecutar el código de Pytube con la URL y el formato proporcionados
    $command = escapeshellcmd("python3 descargar_video.py " . $url . " " . $formato);
    $output = shell_exec($command);
    echo $output;
}
?>

<?php include('includes/header.php'); ?>
<div class="card card-body">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="url">Ingrese la URL del video de YouTube:</label><br>
        <input type="text" id="url" name="url"><br>
        <label for="formato">Seleccione el formato (mp4 o mp3):</label><br>
        <input type="text" id="formato" name="formato"><br><br>
        <button class="btn-success" name="Descargar">
    </form>
</div>
<?php include('includes/footer.php'); ?>