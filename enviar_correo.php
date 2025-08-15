<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $destinatario = "mobeka98@gmail.com";
    $asunto = "Nuevo mensaje desde el formulario web";
    
    $contenido = "Has recibido un nuevo mensaje desde tu página web:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<h2>Gracias, $nombre. Tu mensaje ha sido enviado correctamente.</h2>";
    } else {
        echo "<h2>Hubo un problema al enviar tu mensaje. Intenta nuevamente.</h2>";
    }
} else {
    echo "<h2>Acceso no válido.</h2>";
}
?>
