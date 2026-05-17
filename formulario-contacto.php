<!--
        Técnico online y servicios web
        JJRinconS   07/12/2020
-->

<?php

define("RECAPTCHA_V3_SECRET_KEY", '6LfuBrsaAAAAAO22Ii2LBRj8iEkXFGa3u-5oNoaZ');
 
if (isset($_POST['email']) && $_POST['email']) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
} else {
    // set error message and redirect back to form...
    header('location: formulario-contacto.php');
    exit;
}

if (isset($_POST['mensaje']) && $_POST['mensaje']) {
    $email = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
} else {
    // set error message and redirect back to form...
    header('location: formulario-contacto.php');
    exit;
}

if (isset($_POST['telefono']) && $_POST['telefono']) {
    $email = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
} else {
    // set error message and redirect back to form...
    header('location: formulario-contacto.php');
    exit;
}
 
$token = $_POST['token'];
$action = $_POST['action'];
 
// call curl to POST request

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verify the response
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // valid submission
    // go ahead and do necessary stuff
} else {
    // spam submission
    // show error message
}


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];


$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre .",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "Su teléfono es: " . $telefono . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'info@rgarrones.com';
$asunto = 'Consulta formulario RGARRONES.COM';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:index.php");
?>