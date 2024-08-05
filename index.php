<?php
function movil(){
if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i',strtolower($_SERVER['HTTP_USER_AGENT']))){
    return "1";
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user = array('PIE4','PIE4_Smartphone','PIE6','Minimo','OperaMini','AvantGo','Plucker','NetFront',  
    'SonyEricsson','Nokia','Motorola','BlackBerry','WindowsMobile','PPC','PDA','Smartphone','Palm');

if(in_array($user_agent,$user))
    return "1";
else
    return "0";
}
// detectamos de donde proviene el tráfico
$movil = movil();
// Solo autorizamos su uso en PC escritorio, debido al formato.
if ( $movil == "0" ) {
    //echo "La web no se ha cargado desde un movil.";
} else {
    echo "<center>Esta aplicación<br>no funciona<br>en<br>teléfonos móviles.</center>";
return -1;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title>Creador SRT y VTT Elinv...</title>
    <meta name="description"
        content="No soy lo que ustedes creen!, y no creen lo que soy! Todo lo que necesitamos es Dios! La música y la literatura aquí expresada por Elinv, es solamente fantástica! Y el sano juicio así debe asumirla." />
    <meta name="author" content="Elinv" />
    <meta name="keywords" content="'música, rock, pop, alma, sentimientos'">
    <meta name="language" content="Spanish">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico?v=" + cachet />
    <script src="./src/jquery-3.7.1.min.js.js"></script>
    <link href="./src/index.css" rel="stylesheet" />
</head>

<body>
    <div style="position: absolute; top: -0.8em; left: 50%; min-height: 60%;">
        <h1 id="next" class="myButBlue digTime" style="width: 500px; font-size: 1.5em;">Next Subtitle</h1>
    </div>

    <div class="container" style="position: relative;">
        <div class="controlAudio">
            <fieldset class="naranja">
                <legend class="naranja">Panel De Control:</legend>
                <div align="center">
                    <video id="audio1" class="rojo" style="width:45em;" controls ontimeupdate="document.getElementById('tiempoActual').innerHTML = this.currentTime.toFixed(3); 
                            document.getElementById('tiempoActual').innerHTML = this.currentTime.toFixed(3); 
                            document.getElementById('tiempoTotal').innerHTML = Math.floor(this.duration).toFixed(3);">
                        <track src="./subtitulo.vtt" kind="subtitles" srclang="en" label="Subtítulo" default>
                    </video>
                    <div id="repVideoAudio" class="tooltip ttHelpPlayer tooltipOut"
                        onclick="this.classList.remove('tooltipOut');this.style.display='none';">
                        <img src="./img/interroga.svg" alt="Ayuda acerca del reproductor de video o audio" width="32"
                            height="32" loading="lazy">
                        <div class="top">
                            <center>
                                <h3><b><u>Reproductor de <br>Video y Audio</u></b></h3>
                            </center>
                            <p>En el botón abajo
                                buscas tu archivo de video o audio<br>
                                ↙️ a reproducir.
                            </p>
                            <i></i>
                        </div>
                    </div>
                </div>
                <div align="center">
                    <!-- Mp3/Ogg:
                    <input type="text" id="audioFile" class="azul" onmousedown="salvarAudio(event);"
                        placeholder="Nombre y extensión de la canción" value="./TemblorosoEnTiSP.mp4"
                        style="text-align:center"> -->
                    <input class="myButBlue" type="file" id="fileUpload" style="text-align:center; margin-top: 0.4em;">
                    <hr style="color: yellowgreen;">
                    <input type="text" id="idvelocidad" class="azul" placeholder="Velocidad" value="1" size="5"
                        style="text-align:center; margin-top: 0.4em; font-size: 0.6em;">
                    <sub style="font-size: 0.6em;">Speed</sub>
                </div>
            </fieldset>
            <div align="center" style="margin-top: 15px; margin-bottom: 10px;">
                <!-- <button id="playbutton" onclick="inicializa(); togglePlay();">play</button> -->
                <div id="masVel" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                    <button onclick="aumentarVelocidad();" class="myButBlue">Speed +</button>
                    <div class="top">
                        <center>
                            <h3><b><u>Ve mas incómodo</u></b></h3>
                            <span style="font-size: 10rem;">🏃‍♂️</span>

                            <p>Puedes aumentar <br>
                                la velocidad de reproducción.
                            </p>
                            <i></i>
                        </center>
                    </div>
                </div>
                <div id="menVel" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                    <button onclick="bajarVelocidad();" class="myButBlue">Speed -</button><br>
                    <div class="top">
                        <center>
                            <h3><b><u>Ve mas cómodo</u></b></h3>
                            <span style="font-size: 10rem;">🧘‍♀️</span>

                            <p>Puedes bajar <br>
                                la velocidad de reproducción.
                            </p>
                            <i></i>
                        </center>
                    </div>
                </div>

            </div>
        </div>

        <!-- ----------------------------  -->
        <!-- Aquí se formará el SRT final  -->
        <div id="outSrt" class="srtNew tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
            <h1 align="center" class="butSpeed digTime"><button class="myBut" type="button"
                    onclick=saveTextAreaAsFile()>Out SRT|VTT</button></h1>
            <div class="top" style="margin-top: 3.7em; padding: 0px;">
                <center>
                    <p>✏️Graba subtítulo en formatos SRT y VTT.</p>
                    <i></i>
                </center>
            </div>

            <textarea id="srtCreator" class="rojo" name="srtCreator" rows="25" cols="30" style="height: 80%;width: 95%;"
                placeholder="Aquí se irá formando el subtitulo srt de la canción!"></textarea>
        </div>

        <!-- Letra original para utilizar como subtitulos  -->
        <div class="subtitulos">
            <div id="outTxt" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                <h1 align="center" class="butSpeed digTime"><button class="myBut" type="button"
                        onclick=saveTextAreaAsFileTXT()>Out lyrics</button></h1>
                <div class="top" style="margin-top: 3.7em; padding: 0px;">
                    <center>
                        <p>✏️Graba letra en formato TXT.</p>
                        <i></i>
                    </center>
                </div>
            </div>

            <textarea id="letraSubtit" class="rojo" name="letraSubtit" rows="25" cols="30"
                style="height: 80%;width: 95%;"
                placeholder="Ingrese aqui por linea, la letra de su canción, para subtitular!"></textarea>
        </div>

        <!-- Array con las lineas de subtitulos que se insertarán  -->
        <div class="arraySubTit">
            <div id="outMatriz" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                <h1 align="center" class="butSpeed digTime"><button class="myBut" type="button">Array</button></h1>
                <div class="top" style="margin-top: 3.7em; padding: 0px;">
                    <center>
                        <p>Matríz uso interno del programa.</p>
                        <i></i>
                    </center>
                </div>
            </div>
            <textarea id="arraySubtit" class="rojo" name="arraySubtit" rows="25" cols="30"
                style="height: 80%;width: 95%;"
                placeholder="Array contiene las lineas para subtitular el audio o el video."></textarea>
        </div>
        <!-- ----------------------------  -->

        <!-- ----------------------------  -->
        <!-- Timer del capturador       -->
        <div align="center" class="lineaActual">
            <!-- Mostramos la velocidad -->
            <fieldset class="rojo">
                <legend class="naranja">Info:</legend>
                <div id="infoTimer" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                    <div id="rate" class="naranja" style="float:right; margin-left: 2em;">Rate: ...</div>
                    <!-- Mostramos el avance -->
                    <b><u class="verde naranja">Timer:</b></u>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="tiempoActual" class="butSpeed digTime"> 0 </span>&nbsp;&nbsp;
                    <span id="sep"> <sub>de</sub> </span>&nbsp;&nbsp;
                    <span id="tiempoTotal" class="butSpeed digTime"> 0 </span>
                    <div class="top">
                        <center>
                            <h3><b><u>Tiempo de reproducción</u></b></h3>
                            <span style="font-size: 10rem;">⏳</span>

                            <p>Posición del puntero <br>
                                y velocidad <br>
                                de reproducción.
                            </p>
                            <i></i>
                        </center>
                    </div>
                </div>
            </fieldset>
        </div>
        <!-- ----------------------------  -->

        <div align="center" class="buttCapturar" style="margin-top: 15px;">
            <fieldset class="naranja">
                <legend class="naranja">Línea de tiempo:</legend>
                <br>
                <div id="lineaTiempo" class="tooltip tooltipOut" onclick="this.classList.remove('tooltipOut');">
                    <input type="text" class="azul" id="iEstrofa" value="" size="4" placeholder="id línea"
                        style="text-align:center; margin: 6px;"> ⬅️ Siguiente
                    <input type="text" class="azul" id="estrofa" value="" size="35" placeholder="Siguiente Subtítulo"
                        style="text-align:center; margin: 6px; font-size: 0.8em;">
                    <br>
                    <center>
                        <button class="myButBlue" id="butSigLinea" onclick="sigLinea();">Linea actual</button>
                        <button class="myButBlue" id="butCaptura" onclick="captura();">Capturar</button>
                    </center>
                    <div class="top" style="width: 20em; padding: 0.2em;">
                        <center>
                            <h3><b><u>Línea del tiempo</u></b></h3>
                            <span style="font-size: 5rem;">⏱️</span>
                            <span style="font-size: 1rem;"><br>
                                <b style="color:rgb(252, 0, 67)">1°</b> Id de la linea siguiente a imprimir<br>
                                durante el proceso de captura temporal.
                                <hr>
                                <b style="color:rgb(252, 0, 67)">2°</b> En dos lugares pueden ver<br>
                                el texto de la siguiente línea.
                                <hr>
                                <b style="color:rgb(252, 0, 67)">3°</b> Pueden establecer el número de Línea<br>
                                y desde el botón "Línea Actual"<br>
                                establecen el punto siguiente de inserción.<br>
                                Apuntan el reproductor a unos instantes antes<br>
                                y continuan con la generación del subtítulo.
                                <hr>
                                <b style="color:rgb(252, 0, 67)">4°</b> Con el mouse capturan en cada momento<br>
                                el tiempo, de inicio, de fin y el texto<br>
                                a subtítular.<br>
                                Luego lo podrán editar si lo desean.<br>
                                Teclas de acceso rápido <br>
                                a Capturar <b style="color:rgb(252, 0, 67)">(Alt + X)</b>.
                            </span>
                            </p>
                            <i></i>
                        </center>
                    </div>
                </div>
            </fieldset>
            <hr>
            <label>
                <input type="checkbox" name="ckHelp" id="ckHelp"
                    onchange="localStorage.setItem('ckHelp', this.checked); helpEstado();" checked>
                Check help active
                <div id="codeHtmlReprod" class="tooltip tooltipOut" style="margin-top: 2em;"
                    onclick="this.classList.remove('tooltipOut');">
                    <button class="myButBlue" style="margin-left: 2em;" id="butCaptura"
                        onclick="letraSubtit.value += codevideo.textContent">Code html reproductor</button>
                    <div class="top">
                        <center>
                            <h3><b><u style="color:rgb(252, 0, 0)">Code html reproductor</u></b></h3>
                            <p>
                                <code style="font-size: 0.6em;" id="codevideo">
                                    &lt;video id="idVideo" class="" style="width:45em;" controls&gt;<br><br>
                                    &lt;track src="./subtitulo.vtt" kind="subtitles" srclang="en" label="Subtítulo" default&gt;<br><br>
                                    &lt;/video&gt;<br><br>
                                </code>
                                <hr>
                                <span style="font-size: 0.7em;">
                                    Este código es para <br>
                                    el subtitulado <br>
                                    en reproductor html<br>
                                    a través de archivos con extensión VTT.<br>
                                    <br>
                                    Para reproducir el video <br>
                                    directamente con subtitulos SRT, <br>
                                    solo debe tener el mismo nombre <br>
                                    que el archivo de video.<br>
                                </span>
                            </p>
                            <i></i>
                        </center>
                    </div>
                </div>
            </label>
        </div>
        <!-- ----------------------------  -->
        <!-- <div class="masAction"></div>
        <div class="piePagina"></div>
        <div class="pieBordeDer"></div>
        <div class="pieBordeIzq"></div> -->
    </div>
    <script src="./src/index.js"></script>
</body>

</html>