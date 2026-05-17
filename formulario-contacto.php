<!--
        Técnico online y servicios web
        JJRinconS   07/12/2020
-->

<?php

define("RECAPTCHA_V3_SECRET_KEY", '6LfuBrsaAAAAAO22Ii2LBRj8iEkXFGa3u-5oNoaZ');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php');
    exit;
}

$nombre = trim((string)($_POST['nombre'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$telefono = trim((string)($_POST['telefono'] ?? ''));
$mensaje = trim((string)($_POST['mensaje'] ?? ''));
$token = trim((string)($_POST['token'] ?? ''));
$action = trim((string)($_POST['action'] ?? ''));

if ($nombre === '' || $email === '' || $telefono === '' || $mensaje === '') {
    header('Location: contacto.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contacto.php');
    exit;
}

if ($token === '' || $action !== 'formulario-contacto') {
    header('Location: contacto.php');
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'secret' => RECAPTCHA_V3_SECRET_KEY,
    'response' => $token,
)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$arrResponse = is_string($response) ? json_decode($response, true) : null;
$isValidCaptcha = is_array($arrResponse)
    && !empty($arrResponse['success'])
    && ($arrResponse['action'] ?? '') === $action
    && (float)($arrResponse['score'] ?? 0) >= 0.5;

if (!$isValidCaptcha) {
    header('Location: contacto.php');
    exit;
}

$nombreSafe = strip_tags($nombre);
$emailSafe = filter_var($email, FILTER_SANITIZE_EMAIL);
$telefonoSafe = strip_tags($telefono);
$mensajeSafe = strip_tags($mensaje);

$headers = array(
    'From: ' . $emailSafe,
    'Reply-To: ' . $emailSafe,
    'X-Mailer: PHP/' . phpversion(),
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
);

$body = "Este mensaje fue enviado por " . $nombreSafe . ",\r\n";
$body .= "Su e-mail es: " . $emailSafe . "\r\n";
$body .= "Su telefono es: " . $telefonoSafe . "\r\n";
$body .= "Mensaje: " . $mensajeSafe . "\r\n";
$body .= "Enviado el " . date('d/m/Y');

$para = 'info@rgarrones.com';
$asunto = 'Consulta formulario RGARRONES.COM';

mail($para, $asunto, $body, implode("\r\n", $headers));

header('Location: index.php');
exit;
?>
