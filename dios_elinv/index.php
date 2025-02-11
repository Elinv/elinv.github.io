<?php
error_reporting(0);

$ip = $_SERVER['REMOTE_ADDR'];
//echo "La IP entrante es: " . $ip . "<br>";

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "http://ipinfo.io/{$ip}/json"
));
$details = json_decode(curl_exec($curl));
curl_close($curl);

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_hora_actual = date('Y-m-d H:i:s');
//echo "La fecha y hora actual es: " . $fecha_hora_actual . "<br>";

$info = $ip . " - " . $fecha_hora_actual . "\n";
$info .= "<br>--------------------------------------";
$info .= "<br>IP          :   ".$details->ip;
$info .= "<br>PAIS        :   ".$details->country;
$info .= "<br>PROVINCIA   :   ".$details->region;
$info .= "<br>CIUDAD      :   ".$details->city;
$info .= "<br>LAT.LONG    :   ".$details->loc;
$info .= "<br>COD.POSTAL  :   ".$details->postal;
$info .= "<br>ORGANIZACION:   ".$details->org;
$info .= "<br>--------------------------------------";

$dest = "elinv.elinv@gmail.com"; // Email de destino
$asunto = "Visita a la pagina web"; // Asunto
$cuerpo = $info; // Cuerpo del mensaje

// Cabeceras del correo
$headers = "From: Elinv elinv.@musica.ar\r\n"; // Quien envia?
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Enviar el correo
if(mail($dest, $asunto, $cuerpo, $headers)) {
//	echo "Correo enviado exitosamente.";
} else {
//	echo "Error al enviar el correo.";
}

header("Location: ./index.html");
exit();
?>