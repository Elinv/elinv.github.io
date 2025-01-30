<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if (empty($_POST['id'])) {
        echo "El campo de la definición incorrecta, está vacío!";
    }elseif (empty($_POST['termino'])) {
        //echo var_dump($_POST);
        echo "El campo de la definición correcta, está vacío!";
    }else{
        $id = $_POST["id"];
        $termino = $_POST["termino"];
        // open and load a XML file
        $dom = new DomDocument();
        $dom->load('diccionario.xml');

        $body = $dom->getElementsByTagName('DICCIONARIO')->item(0);

        $termNODE = $dom->createElement('TERMINOS');

        $idXML = $dom->createElement('ID');
        $cont = $dom->createTextNode($id);
        $idXML->appendChild($cont);

        $definicion = $dom->createElement('DEFINICION');
        $cont = $dom->createTextNode($termino);
        $definicion->appendChild($cont);

        $termNODE->appendChild($idXML);
        $termNODE->appendChild($definicion);

        $body->appendChild($termNODE);

        echo $dom->saveXML();
        $dom->save('diccionario.xml');
    }
}
?>