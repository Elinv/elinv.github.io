<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$colores;
$nameFile;
//Si se quiere subir una imagen
if (isset($_POST['colores'])) {
	$colores = $_POST['colores'];
	$nameFile = $_POST['nameFile'];
}

if(!is_file($nameFile)){
    file_put_contents($nameFile, $colores);
}else{	
	$nameFile = fopen($nameFile, "w") or die("No se ha podido abrir.");	
	fwrite($nameFile, $colores.PHP_EOL);
	// Close the file
	fclose($nameFile);
}
?>