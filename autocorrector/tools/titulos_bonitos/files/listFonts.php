<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // put all files in an array 
    $dir = glob('./fonts/*');
    // sort the array by calling newest() 
    natsort($dir);
    //$dir = array_reverse($dir); 
    //echo $dir;
    $resultado='const fuentes = [ ';

    // recorremos todos los archivos.
    foreach($dir as $archivo){
        /* Contenedor onclick="elinvTitBonitos.imgGetBoolean = false; 
        texturas a partir de aquí */
        //$archivo = substr($archivo, 1);
        $resultado .= '"'.$archivo.'", ';
    }
    $resultado = substr($resultado, 0, -2).'];';
    //$resultado = trim($resultado, ',').'];';
    //echo $resultado;
    $file = './scr/arrayFont.js';
    file_put_contents($file, $resultado);

?>
