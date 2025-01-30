<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$nameFile;
//Si se quiere subir una imagen
if (isset($_POST['nameFile'])) {
	$nameFile = $_POST['nameFile'];
}

if(is_file($nameFile)){
	$stream = fopen($nameFile,"r");
	$string = stream_get_contents($stream);
	echo $string;
	fclose($stream);
}
?>