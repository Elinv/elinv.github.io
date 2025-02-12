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

// ? -----------------
// * Detectar dispositivo
function detect(){
	$tablet_browser = 0;
	$mobile_browser = 0;
	$body_class = 'desktop';

	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$tablet_browser++;
		$body_class = "tablet";
	}

	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$mobile_browser++;
		$body_class = "mobile";
	}

	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		$mobile_browser++;
		$body_class = "mobile";
	}

	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda ','xda-');

	if (in_array($mobile_ua,$mobile_agents)) {
		$mobile_browser++;
	}

	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
		$mobile_browser++;
		//Check for tablets on opera mini alternative headers
		$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		$tablet_browser++;
		}
	}
	if ($tablet_browser > 0) {
		// tablet
		return "tablet";
	}
	else if ($mobile_browser > 0) {
		// movil
		return 'movil';
	}
	else {
		// ordenador de escritorio
		return 'escritorio';
	}  
}
// * Uso:
// if (detect() == "movil"){
// 	print "es un dispositivo movil";
// };
// ? -----------------

// Change style by movil
// $cssStyle = "style.css?v=".rand(1,10000);
if (detect() == "movil"){
    header("Location: ./indexm.html");
    exit();
}else{
    header("Location: ./index.html");
    exit();
};

?>