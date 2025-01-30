<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Listar archivos del directorio
    function newest($a, $b)
    {
        return filemtime($a) - filemtime($b);
    }
    // put all files in an array 
    $dir = glob('./textura/*.jpg');
    // sort the array by calling newest() 
    natsort($dir);
    $dir = array_reverse($dir); 
    //echo $dir;
    $resultado='';
    // recorremos todos los archivos.
    foreach($dir as $archivo){
        /* Contenedor onclick="elinvTitBonitos.imgGetBoolean = false; 
        texturas a partir de aquí */
        $resultado .= '<img width=80 src='.$archivo.' onclick="elinvTitBonitos.imgGetBoolean=false; textOverlaidCheck.setAttribute(\'checked\',\'true\'); elinvTitBonitos.texturaOverlaid = this.src; elinvTitBonitos.setEntorno()">';
    }
    //echo $resultado;
    $file = './files/texturasImg.html';
    file_put_contents($file, $resultado);

?>
