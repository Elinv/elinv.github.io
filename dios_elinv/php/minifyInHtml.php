<?php 

// ~ Minify HTML 
// ~ ---------------------------------------------------------------
// Uso => ob_start("sanitize_output");
function sanitize_output($buffer, $salida) 
{
	$search = [
		'/\>[^\S ]+/s',
		'/[^\S ]+\</s',
		'/(\s)+/s',
		'/\/\*(.|\s)*?\*\//',
		'/<!--(.|\s)*?-->/'
	];	
	$replace = [
		'>',
		'<',
		'\\1',
		'',
		''
	];	
	$buffer = preg_replace($search, $replace, $buffer);	

	// para enviar el buffer a la salida de archivo
	// Guardar en un archivo si se ejecuta en localhost
	$whitelist = array(
		'127.0.0.1',
		'::1'
	);	
	// * Solo si se ejecuta en localhost
	if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
		// echo "ssssss";
	}else{
		//$myfile = fopen("./elinv.github.io/dios_elinv/index.html", "w") or die("Unable to open file!");
        $myfile = fopen($salida, "w") or die("Unable to open file!");        
		fwrite($myfile, $buffer);
		fclose($myfile);		
	}

	return $buffer;
}
// ~ ---------------------------------------------------------------
?>