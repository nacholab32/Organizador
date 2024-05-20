
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


