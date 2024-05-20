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

<?php include('includes/index.php'); ?>
<?php include('includes/header.php'); ?>
<!-- Formulario para que los usuarios ingresen la URL y el formato -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="url">Ingrese la URL del video de YouTube:</label><br>
    <input type="text" id="url" name="url"><br>
    <label for="formato">Seleccione el formato (mp4 o mp3):</label><br>
    <input type="text" id="formato" name="formato"><br><br>
    <input type="submit" value="Descargar">
</form>
