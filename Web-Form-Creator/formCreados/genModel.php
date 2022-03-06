<?php
// recibimos desde ajax el codigo fuente
$codigoFuenteVar = $_POST['codigoFuente']; 
//echo 'Leido correctamente';

// nombre de archivo con la fecha
$fechaHoraMin = date("Y-m-d-H-i-s");
$nameFile = "./modelos/" . $fechaHoraMin . ".html";


// Abrir el archivo, creándolo si no existe:
$archivo = fopen($nameFile,"w+b");
if( $archivo == false ) {
    //echo "Error al crear el archivo";
  }
  else
  {
      // Escribir en el archivo:
       fwrite($archivo, $codigoFuenteVar);
      // Fuerza a que se escriban los datos pendientes en el buffer:
       fflush($archivo);
  }
  // Cerrar el archivo:
  fclose($archivo);
  // reenviamos a la pagina donde se ven los formularios creados
  //header("Location: ./listForm.php");
  //die();

?>
