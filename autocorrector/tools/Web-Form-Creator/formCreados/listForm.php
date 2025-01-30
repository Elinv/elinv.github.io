<?php
// Listar archivos del directorio
function newest($a, $b)
{
    return filemtime($a) - filemtime($b);
}
// put all files in an array 
$dir = glob('./modelos/*');
// sort the array by calling newest() 
natsort($dir);
$dir = array_reverse($dir);
//print_r ($dir); 
//Pasamos a un array js
?>
<script>
    var filesElinvArray = <?php echo json_encode($dir); ?>;
    var avance = 2;
</script>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>👥 Design 💚 Form 👀 Elinv 👥</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./modelos/scr/bootstrap.min.css">
    <link rel="shortcut icon" href="#" />
    <style>
        .recuadro,
        .container {
            position: relative;
            background-color: rgb(148, 43, 43);
            border: 1px solid black;
            margin: auto;
        }

        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        legend {
            color: white;
            padding: 5px 10px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        input {
            margin: 15px;
        }

        textarea {
            font-family: monospace;
            text-rendering: auto;
            color: -internal-light-dark(black, white);
            letter-spacing: normal;
            word-spacing: normal;
            line-height: normal;
            text-indent: 0px;
            display: flex;
            resize: auto;
            cursor: text;
            white-space: pre-wrap;
            overflow-wrap: break-word;
            background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
            column-count: initial !important;
            margin: 0em;
            border-width: 1px;
            padding: 2px;
            background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #FFCEE7), to(#FFFFFF));
            background: -moz-linear-gradient(top, #FFFFFF, #FFCEE7 1px, #FFFFFF 25px);
            box-shadow: rgb(0 0 0 / 10%) 0px 0px 8px;
            -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -webkit-box-shadow: rgb(0 0 0 / 10%) 0px 0px 8px;
        }

        form,
        label,
        p {
            color: white !important;
        }

        #wrapper {
            margin: auto;
        }

        body {
            background-color: aqua;
            width: 100%;
        }
    </style>
</head>

<!--Certificado Elinv-->
<img style="position: absolute; top: 0; left: 0; border: 0;z-index: 4;" width="110px" src="./img/elinvycloudflare.png" alt="Certificado calidad Elinv y Cloudflare">

<!--Cabecera de la pagina-->
<header class="container-fluid text-center">
    <div class="text-center">
        <img alt="US" src="./img/DesignFormElinv.png" width="390px">
    </div>
</header>

<!--Si no tiene Javascript activado-->
<noscript class="justify-content-center">
    <div style="position: absolute; margin: auto; z-index: 16; height: 400px; width: 300px; left: 4%; top: 26%">
        <div id="elinvForm" style="position: relative; top: 8px; left: 2px; display:inline-block; margin-left:auto; margin-right:auto; margin-bottom:auto;">
            <div id="contenedor1" style="width: 380px; height: 660px;margin: auto;text-align:center; margin-bottom:17px;" title="Habilitando javascript accederás a toda su funcionalidad">

                <div style="margin: auto; width: 350px; position: relative; top: 10px; left: -2px;">
                    <fieldset class="border p-2" style="border-radius: 4px; width: 350px; height: 500px;">
                        <legend class="w-auto" title="Title del Fieldset Legend" id="Id Fieldset Legend" name="Name Fieldset Legend" style="color: blue;">Para verlo funcionar, habilitá Javascript</legend>
                    </fieldset>
                </div><img src="../img/elinv.png" alt="Elinv @ 2022" width="130" height="380" id="voo" name="voo" style="position: relative; top: -398px; left: 3px;">
                <div id="zvrdn" style="margin: auto; width: 60px; position: relative; top: -793px; left: 1px;"><button type="button" id="Id_Boton" name="Name_Boton" title="Presione aquí para cancelar!" class="btn btn-primary">Elinv</button></div>
                <div id="qswuets" style="margin: auto; width: 248px; position: relative; top: -463px; left: 5px;"><button type="button" id="Id_Boton" name="Name_Boton" title="Presione aquí para cancelar!" class="btn btn-primary">No tienes Javascript habilitado.</button></div>
            </div>
        </div>
    </div>
</noscript>

<!--Donde recibimos todos los formularios creados-->
<div class="recuadro">
    <div id="wrapper" style="width: 400px; text-align:center;">
        <div id="updateDinamico" style="position: relative; top: 8px; left: 2px; display:inline-block; margin-left:auto; margin-right:auto; margin-bottom:auto;">

        </div>
    </div>
</div>

<!--Pie de página-->
<footer class="" style="bottom:0;">
    <h2 class="container-fluid text-center" style="cursor: pointer;">
        <button id="vermas" type="button" class="btn btn-info"> 🔭 Leer mas ➕ ... ✅</button>
    </h2>
</footer>


<!-- ALERTA DINAMICA   -->
<!-- Modal -->
<div class="modal fade" id="sinMasForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 62px;">Elinv</h4>
            </div>
            <div class="modal-body">
                <p id="error">Es todo por ahora!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>


<!-- Dialogo al enviar al usuario el formulario-->
<div class="modal" id="exportHtmlForm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Creador de formularios Elinv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-primary">Código fuente pagina web contiene el formulario.</p>
                <textarea class="form-control" id="id_t_a_Result" name="Name_textarea" placeholder="Placeholder al textarea" rows="34" cols="40"></textarea>
                <br>
                <p class="text-primary">Código fuente unicamente del formulario.</p>
                <div class="container-fluid" id="" style="height: 725px;">
                <textarea class="form-control" id="sourceCode" name="Name_textarea" placeholder="Placeholder al textarea" rows="29" cols="40"></textarea>
                </div>
                <!--
                <div class="container-fluid" id="vistaWeb" style="height: 725px;">
                </div>
                -->
            </div>
            <div class="modal-footer" style="margin: auto;">
                <button type="button" style="z-index: 6;" class="btn btn-primary">Contenido en el portapapeles.</button>
                <button type="button" style="z-index: 6;" class="btn btn-primary" data-dismiss="modal"> Close</button>
            </div>
        </div>
    </div>
</div>


<script src="./modelos/scr/jquery-3.6.0.js"></script>
<script src="./modelos/scr/bootstrap.min.js"></script>
<script>
    // al cargar el documento
    $(document).ready(function() {
        // al cargar el documento cargamos cuatro formularios ultimos
        const element = filesElinvArray.length;
        let total = 6;
        if (element <= 5) {
            total = element;
        }
        for (avance; avance < total; avance++) {
            const element = filesElinvArray[avance];
            $.get(element, function(addFileFormHtml) {
                $("#updateDinamico").append(addFileFormHtml + `<button type="button" title="Exportar formulario" class="btn btn-success" onclick="exportarFormularioAHtml('${element}');">Exportar</button><hr>`);
            });
        }
    });

    /* si se presiona el boton vamos cargando de a 4 formularios
       en orden desde el actual al pasado */
    $("#vermas").click(function() {
        let verMas = avance + 4;
        let actual = avance;

        for (avance = actual; avance < verMas; avance++) {
            const element = filesElinvArray[avance];
            if (element === undefined) {
                //alert(element);
                $('#sinMasForm').modal("show");
                return -1;
            } else {
                $.get(element, function(addFileFormHtml) {
                    $("#updateDinamico").append(addFileFormHtml + `<button type="button" title="Exportar formulario" class="btn btn-success" onclick="exportarFormularioAHtml('${element}');">Exportar</button><hr>`);
                });
            }
        }
    });

    // exportar formulario seleccionado a html
    function exportarFormularioAHtml(dirFileName) {
        $.get(dirFileName, function(addFileFormHtml) {
            $.get("./base/modelHead.php", function(addFileHead) {
                $.get("./base/modelFoot.php", function(addFileFoot) {
                    // Limpiamos un poco el código del formulario
                    addFileFormHtml = cleanSource(addFileFormHtml);
                    // Resultado final para agregar
                    let sourceFinal = addFileHead + addFileFormHtml + addFileFoot;
                    $('#exportHtmlForm').modal("show");
                    $(id_t_a_Result).val(sourceFinal);
                    //document.getElementById("vistaWeb").innerHTML = sourceFinal;
                    document.getElementById("sourceCode").innerHTML = addFileFormHtml;
                    copyTextToClipboard(sourceFinal);
                });
            });
        });
    }
    
    // clean form
    function cleanSource(addFileFormHtml){
        const regex = /draggable dragaware claseArrastrable/ig;
        addFileFormHtml = addFileFormHtml.replace(regex, '');

        const regex1 = `border-width: 1px;border-style: solid; border-color:chartreuse; margin: auto;text-align:center; margin-bottom:17px;`;
        addFileFormHtml = addFileFormHtml.replace(regex1, '');

        const regex2 = `📱 Form estilo movil preferentemente!`;
        addFileFormHtml = addFileFormHtml.replace(regex2, '');

        const regex3 = `🔲 Dimensiones (412 x 914)`;
        addFileFormHtml = addFileFormHtml.replace(regex3, '');

        const regex4 = `📱 Samsung Galaxy A51/71`;
        addFileFormHtml = addFileFormHtml.replace(regex4, '');

        addFileFormHtml = addFileFormHtml.replace(/\r?\n/g, "");

        addFileFormHtml = addFileFormHtml.replace(/\n/g, '');
        
        addFileFormHtml = addFileFormHtml.replace(/\s+/g, ' ');

        //Devolvemos el resultado
        return addFileFormHtml;
    }

    // funciones para copiar al portapapeles
    // -------------------------------------
    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        // para las notificaciones
        let msg;
        try {
            let successful = document.execCommand('copy');
            msg = successful ? 'successful' : 'unsuccessful';
            msg = 'Copiado exitosamente! -> ' + msg;
            console.log('Design Form Web Creator: ' + "\r\n", msg)
        } catch (err) {
            msg = 'Ha ocurrido un error al copiar: ' + err;
            console.log('Design Form Web Creator: ' + "\r\n", msg);
        }
        document.body.removeChild(textArea);
    }

    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        let msg;
        navigator.clipboard.writeText(text).then(function() {
            msg = 'Copiado exitosamente! -> ' + '\r\n \r\n => ' + text;
            console.log('Design Form Web Creator: ' + "\r\n", msg);
        }, function(err) {
            msg = 'Ha ocurrido un error al copiar: ' + err;
            console.log('Design Form Web Creator: ' + "\r\n", msg);
        });
    }
</script>

</body>

</html>