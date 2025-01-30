<?php
    // Listar archivos del directorio
    function newest($a, $b)
    {
        return filemtime($a) - filemtime($b);
    }
    // put all files in an array 
    $dir = glob('*');
    // sort the array by calling newest() 
    natsort($dir);
    $dir = array_reverse($dir);
    $dir = array_reverse($dir);
    //Pasamos a un array js
    echo json_encode ($dir);
?>
