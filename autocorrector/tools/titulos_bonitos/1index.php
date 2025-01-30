<?php
// //#region php
//     // ini_set('display_errors', 1);
//     // ini_set('display_startup_errors', 1);
//     // error_reporting(E_ALL);

//     date_default_timezone_set('America/Argentina/Buenos_Aires');
//     function getUserIP() 
//     {
//         if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
//             $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
//             $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
//         }
//         $client  = @$_SERVER['HTTP_CLIENT_IP'];
//         $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
//         $remote  = $_SERVER['REMOTE_ADDR'];

//         if (filter_var($client, FILTER_VALIDATE_IP)) {
//             $ip = $client;
//         } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
//             $ip = $forward;
//         } else {
//             $ip = $remote;
//         }
//         return $ip;
//     }

       
//     $ip = getUserIP();

//     //if(trim($ip) != '191.102.244.240'){
//     $fecha = date("Y-m-d H:i:s", time());
//     $page = $_SERVER['HTTP_HOST'] . "" . $_SERVER['PHP_SELF'];
//     //$referrer = $_SERVER['HTTP_REFERER'];
//     $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
//         $log = $ip . '&emsp;&emsp;&emsp;&emsp;' . $fecha . '&emsp;&emsp;&emsp;&emsp;' . $page;
//         // . $referrer . '      ' . $user_agent;
//         // fichero de registro
//         $Fichero = "../../rv.txt";
//         // abrimos el fichero para registro, registramos y cerramos.
//         $fp = fopen($Fichero, "a");
//         fwrite($fp, $log . "\n");
//         fclose($fp); 
//     //}
    
//         // A partir de aquí el contador propiamente dicho
// 	$nombreArchivo = "../../c.txt";
// 	# Si no existe, lo creamos
// 	if (!file_exists($nombreArchivo)) {
//     	touch($nombreArchivo);
// 	}
// 	# Obtenemos su contenido
// 	$contenido = trim(file_get_contents($nombreArchivo));
// 	# Si está vacío, lo igualamos a cero
// 	if ($contenido == "") {
//     	$visitas = 0;
// 	} else {
//     	# Si no, las visitas son lo que tenga el archivo
//     	$visitas = intval($contenido);
// 	}
// 	# Ya sea que las visitas son 0 o las que hayamos leído, las aumentamos
// 	$visitas++;
// 	# Y volvemos a escribir el valor en el archivo
// 	file_put_contents($nombreArchivo, $visitas);

//#endregion php
?>
<!DOCTYPE html>
<html>

<head>  

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Elinv text effects</title>

    <meta content="Nombre del Autor" name="Elinv" />
    <meta content="Generador de textos como Imágenes Elinv." name="Titulos bonitos Elinv" />
    <meta content="Elinv, Bragado, Generador, textos" name="Elinv, titulos, bonitos" />
    <link rel="icon" type="image/x-icon" href="./img/a.png">

    <link rel="stylesheet" href="./scr/bootstrap.min.css">
    <link rel="stylesheet" href="./scr/estilos.css">

</head>

<body>
    
    <!-- Regeneramos las nuevas texturas y actualizamos -->
    <?php include './files/listTexturas.php'; ?> 
    <!-- Regeneramos las nuevas fonts y actualizamos -->
    <?php include './files/listFonts.php'; ?> 

    <div class="container">
        <div class="row" style="margin-top: 1rem !important;">
            <!-- Preview -->
            <div class="col-md-6">
                <fieldset style="border:1px solid rgb(34, 113, 224);">
                    <legend class="tit3dEfect text-center">
                        Titulos bonitos.
                        <span id="labelAnchoAlto" style="color:#8dd20c">
                            [900 x 900]
                        </span>
                    </legend>
                    <canvas id="myCanvas" width="900px" height="900px"
                        style="border:1px solid rgb(0, 255, 26); padding: 10px; ">
                    </canvas>
                </fieldset>
            </div>

            <!-- Herramientas de diseño -->
            <div class="col-md-6">

                <div id="hcg-tabs-1" class="tabs-container">

                    <div id="tabs-nav" style="overflow-y: auto;">

                        <a href="#" data-target="tab_1" class="tabs-menu tabs-menu-active">Texto</a>
                        <a href="#" data-target="tab_2" class="tabs-menu">Fonts</a>
                        <a href="#" data-target="tab_3" class="tabs-menu">Color</a>
                        <a href="#" data-target="tab_4" class="tabs-menu">Sombras</a>
                        <a href="#" data-target="tab_5" class="tabs-menu">Effects.</a>
                        <a href="#" data-target="tab_6" class="tabs-menu">Gradient</a>
                        <a href="#" data-target="tab_7" class="tabs-menu">Texturas</a>
                        <a href="#" data-target="tab_8" class="tabs-menu">Overlaid</a>
                        <a href="#" data-target="tab_9" class="tabs-menu">Filtros</a>

                    </div>

                    <div class="tabs-content">

                        <!-- TEXTOS -->
                        <div id="tab_1" class="tabs-panel" style="display:block; background-color: #a6ff00;">
                            <div class="flex-content">

                                <!-- Controles texto print -->
                                <div>
                                    <input class="form-control text-primary text-center" type="text" id="textLinea1"
                                        name="textLinea1" placeholder="Texto linea 1" value="Dios"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div style="padding-top: 5px;">
                                    <input class="form-control text-primary text-center" type="text" id="textLinea2"
                                        name="textLinea2" placeholder="Texto linea 2" value="🌎🌳🌈"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div style="padding-top: 5px;">
                                    <input class="form-control text-primary text-center" type="text" id="textLinea3"
                                        name="textLinea3" placeholder="Texto linea 3" value="Elinv"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div style="padding-top: 5px;">
                                    <input class="form-control text-primary text-center" type="text" id="textLinea4"
                                        name="textLinea4" placeholder="Texto linea 4" value="🥰🙏🤚"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div style="padding-top: 5px;">
                                    <input class="form-control text-primary text-center" type="text" id="textLinea5"
                                        name="textLinea5" placeholder="Texto linea 5" value="💖@twitter_lpm"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div style="padding-top: 5px;">
                                    <input class="form-control text-primary text-center" type="text" id="textLinea6"
                                        name="textLinea6" placeholder="Texto linea 6" value="🎼elinv.musica.ar"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>
                            </div>
                            <div class="text-center">

                                <label class="text-success" for="textTexture">
                                    Configuración general
                                </label><br>
                                <button type="button" style="margin-top: 10px; margin-left: 20px;" 
                                        id="butSaveConfigGral" name="butSaveConfigGral" 
                                        title="Grabar configuración general actual!"
                                        class="btn btn-primary">
                                            Grabar
                                </button>
                        
                                <button type="button" style="margin-left: 20px; margin-top: 10px;" 
                                        id="butLoadConfigGral" name="butLoadConfigGral" 
                                        title="Cargar configuración general grabada!"
                                        class="btn btn-primary">
                                            Cargar
                                </button>

                                <button id="download" 
                                    style="margin-left: 20px; margin-top: 10px;" 
                                    class="btn btn-primary">
                                        Grabar imagen
                                </button>

                                <button id="reset" 
                                    style="margin-left: 20px; margin-top: 10px;" 
                                    class="btn btn-primary">
                                        Reset form
                                </button>
                                <hr>
                                <a href="https://github.com/Elinv/Titulos-bonitos-Elinv" target="_blank">
                                    <button id="githubLink" 
                                        style="margin-left: 20px; margin-top: 10px;" 
                                        class="btn btn-danger">
                                            Titulos-bonitos-Elinv - Gracias a GITHUB!
                                    </button>
                                </a>                           

                            </div>
                        </div>

                        <!-- FONTS -->
                        <div id="tab_2" class="tabs-panel" style="background-color: #bbd58a;">
                            <div class="flex-content">
                                <!-- seleccionar fonts -->
                                <div id="" style="margin: auto; position: relative; top: 28px; ">
                                    <label for="fonts" class="text-primary">Type fonts: </label>
                                    <label class="text-success" id="fontLoads">Fonts cargadas: </label>
                                    <select class="form-select form-select-lg" name="fonts" id="fonts"
                                        onchange='elinvTitBonitos.setEntorno(1)'></select>
                                    <hr>
                                    <label for="loadLocalFont" class="text-primary">
                                        load local fonts:
                                    </label><br>
                                    <!-- OTF (OpenType); TTF (TrueType); -->
                                    <input type="file" id="loadLocalFont" name="loadLocalFont" accept=".ttf, .otf">
                                </div>

                            </div>
                        </div>

                        <!-- COLOR -->
                        <div id="tab_3" class="tabs-panel" style="background-color: #91d01e;">
                            <div class="flex-content">

                                <div id="" style="margin: auto;">
                                    <label for="textColor" class="text-primary">Text color: </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px;" type="color"
                                        id="textColor" name="textColor" title="Color del Texto" value="#5E97FF"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div id="" style="margin: auto;">
                                    <label for="shadowColor" class="text-primary">Shadow Color: </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px;" type="color"
                                        id="shadowColor" name="shadowColor" title="Color de la sombra" value="#000000"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <div id="" style="margin: auto;">
                                    <label for="backgroundColor" class="text-primary">Back Color: </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px;" type="color"
                                        id="backgroundColor" name="backgroundColor"
                                        title="Color del fondo. Blanco total significa fondo transparente.[255-255-255]"
                                        value="#FFFFFF" onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <hr>

                                <div class="text-center">

                                    <label class="text-success" for="textTexture">
                                        Background texturas activar
                                    </label>

                                    <input type="checkbox" id="actBGTexture" name="actBGTexture" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    🌍

                                    <button type="button" style="margin-left: 20px;"
                                        id="butAsignColorPref" name="butAsignColorPref" 
                                        title="Asignar color prefijado!"
                                        class="btn btn-primary">
                                            Asignar Color
                                    </button>

                                    <button type="button" style="margin-left: 20px;" 
                                        id="butSaveColorPref" name="butSaveColorPref" 
                                        title="Grabar colores prefijado!"
                                        class="btn btn-primary">
                                            Grabar
                                    </button>
                                    
                                    <button type="button" style="margin-left: 20px; margin-top: 10px;" 
                                        id="butRestoreColorPref" name="butRestoreColorPref" 
                                        title="Restaurar preset colores prefijado!"
                                        class="btn btn-primary">
                                            Recuperar preset colores
                                    </button>                                    
                                </div>

                                <hr>

                                <!-- Colores prefijados regulables -->
                                <div class="container ms-auto">
                                    <label class="text-primary">
                                        Colores prefijados configurables:
                                    </label><br>

                                    <!-- 4 colores -->
                                    <div class="row flex-nowrap">

                                        <div class="col text-center">
                                            <input class="text-primary" style="width: 50px; height: 40px;" type="color"
                                                id="colorPrefijado1" name="colorPrefijado1" title="Color prefijado"
                                                value="#1e90ff" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado1">
                                        </div>

                                        <div class="col text-center">
                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado2" name="colorPrefijado2" title="Color prefijado"
                                                value="#a110e5" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado2">
                                        </div>

                                        <div class="col text-center">
                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado3" name="colorPrefijado3" title="Color prefijado"
                                                value="#1fe5ff" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado3">
                                        </div>

                                        <div class="col text-center">
                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado4" name="colorPrefijado4" title="Color prefijado"
                                                value="#1fff39" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado4">
                                        </div>
                                    </div>

                                    <!-- 4 colores más -->
                                    <div class="row flex-nowrap">

                                        <div class="col text-center">
                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado5" name="colorPrefijado5" title="Color prefijado"
                                                value="#ffc800" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado5">
                                        </div>

                                        <div class="col text-center">

                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado6" name="colorPrefijado6" title="Color prefijado"
                                                value="#ff1f1f" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado6">
                                        </div>

                                        <div class="col text-center">

                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado7" name="colorPrefijado7" title="Color prefijado"
                                                value="#d8840e" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado7">
                                        </div>

                                        <div class="col text-center">

                                            <input class="text-primary"
                                                style="width: 50px; height: 40px;margin-left: 10px;" type="color"
                                                id="colorPrefijado8" name="colorPrefijado8" title="Color prefijado"
                                                value="#189236" onchange="elinvTitBonitos.setEntorno();">
                                            <br>
                                            <input type="radio" id="asignTextColor" name="prefijColor"
                                                value="colorPrefijado8">
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Opciones -->
                                    <div class="row flex-nowrap">
                                        <div class="col text-center">

                                            <input type="radio" id="asignTextColor" name="prefijColorAsign"
                                                value="asignTextColor">
                                            <label for="asignTextColor" class="text-primary">
                                                Asign text color
                                            </label>

                                            <input type="radio" id="asignShadowColor" name="prefijColorAsign"
                                                value="asignShadowColor">
                                            <label for="asignShadowColor" class="text-primary">
                                                Asign Shadow color
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row flex-nowrap">
                                        <div class="col text-center">

                                            <input type="radio" id="asignBgColor" name="prefijColorAsign"
                                                value="asignBgColor">
                                            <label for="asignBgColor" class="text-primary">
                                                Asign Background color
                                            </label>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SOMBRAS -->
                        <div id="tab_4" class="tabs-panel" style="background-color: #98ce32;">

                            <div class="flex-content">
                                <!-- Sombra eje X Control -->
                                <div id="" style="margin: auto; ">
                                    <label for="sombrasX" class="text-primary">Sombra eje X Control:</label>
                                    <input class="form-control text-primary text-center" type="number" id="sombrasX"
                                        name="sombrasX" placeholder="Sombra eje X" value="-4"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <!-- Sombra eje Y Control -->
                                <div id="" style="margin: auto;">
                                    <label for="sombrasY" class="text-primary">Sombra eje Y Control:</label>
                                    <input class="form-control text-primary text-center" type="number" id="sombrasY"
                                        name="sombrasY" placeholder="Sombra eje Y" value="-4"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <!-- Sombra Blur Control -->
                                <div id="" style="margin: auto;">
                                    <label for="sombrasBlur" class="text-primary">Sombra Blur Control:</label>
                                    <input class="form-control text-primary text-center" type="number" id="sombrasBlur"
                                        name="sombrasBlur" placeholder="Sombra Blur" value="10"
                                        onchange="elinvTitBonitos.setEntorno();">
                                </div>
                            </div>

                        </div>

                        <!-- EFECTOS -->
                        <div id="tab_5" class="tabs-panel" style="background-color: #9fcd4b;">
                            <div style="display: grid;  grid-template-columns: 1fr 1fr"></div>
                            <!-- Tamaño de la font -->
                            <div id="" style="margin: auto;">
                                <label for="sizeFont" class="text-primary">Tamaño Letras:</label>
                                <input class="form-control text-primary text-center" type="number" id="sizeFont"
                                    name="sizeFont" placeholder="Tamaño de la letra" value="109"
                                    onchange="elinvTitBonitos.setEntorno();">
                            </div>
                            <!-- Espaciar Lineas -->
                            <div id="" style="margin: auto;">
                                <label for="separLineas" class="text-primary">Espaciar Lineas:</label>
                                <input class="form-control text-primary text-center" type="number" id="separLineas"
                                    name="separLineas" placeholder="Separación lineas" value="134"
                                    onchange="elinvTitBonitos.setEntorno();">
                            </div>
                            <hr>
                            <div style="display: grid;  grid-template-columns: 1fr 1fr">
                                <!-- Lado izquierdo => Controles -->
                                <div class="flex-content">
                                    <span class="text-success">
                                        Selector de efectos:</span><br>
                                    <!-- EFECTO 1 -->
                                    <input type="radio" id="3dEfect1" name="3dEfectos" value=""
                                        onchange="elinvTitBonitos.setEntorno(1,5);">
                                    <label for="3dEfect1" class="text-primary">3D Efecto 1</label>
                                    <input type="range" min="1" max="11" value="5" class="slider" id=""
                                        onchange="elinvTitBonitos.setEntorno(1, parseInt(this.value));">
                                    <input type="checkbox" id="efect1" name="efect1" value=""><br>
                                    <!-- EFECTO 2 -->
                                    <input type="radio" id="3dEfect2" name="3dEfectos" value=""
                                        onchange="elinvTitBonitos.setEntorno(2,5);">
                                    <label for="3dEfect2" class="text-primary">3D Efecto 2</label>
                                    <input type="range" min="1" max="11" value="5" class="slider" id=""
                                        onchange="elinvTitBonitos.setEntorno(2, parseInt(this.value));">
                                    <input type="checkbox" id="efect2" name="efect2" value=""><br>
                                    <!-- EFECTO 3 -->
                                    <input type="radio" id="3dEfect3" name="3dEfectos" value=""
                                        onchange="elinvTitBonitos.setEntorno(3,5);">
                                    <label for="3dEfect3" class="text-primary">3D Efecto 3</label>
                                    <input type="range" min="1" max="11" value="5" class="slider" id=""
                                        onchange="elinvTitBonitos.setEntorno(3, parseInt(this.value));">
                                    <input type="checkbox" id="efect3" name="efect3" value="">
                                </div>
                                <!-- Lado derecho => Controles -->
                                <div class="flex-content">
                                    <span class="text-success">
                                        Ancho y alto del lienzo:</span><br>
                                    <!-- ANCHO -->
                                    <label for="lienzoAncho" class="text-primary">width</label>
                                    <input type="range" min="1" max="1800" value="900" class="slider" id="lienzoAncho"
                                        name="lienzoAncho" onchange="elinvTitBonitos.resizeCanvas();">
                                    <br><br>
                                    <!-- ALTO -->
                                    <label for="lienzoAlto" class="text-primary">height</label>
                                    <input type="range" min="1" max="1800" value="900" class="slider" id="lienzoAlto"
                                        name="lienzoAlto" onchange="elinvTitBonitos.resizeCanvas();"><br>
                                </div>
                            </div>
                            <hr>
                            <div style="display: grid;  grid-template-columns: 1fr 1fr">
                                <!-- Espacio dedicado a activar borde de texto y color o color gradiente. -->
                                <div class="flex-content">

                                    <label for="strokText" class="text-success">
                                        Borde Texto
                                    </label>
                                    <input type="checkbox" id="strokText" name="strokText" value=""
                                        onchange="elinvTitBonitos.setEntorno()">
                                    <br>

                                    <label for="textBordeColor" class="text-primary">
                                        Color borde text
                                    </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px; width: 200px;"
                                        type="color" id="textBordeColor" name="textBordeColor" title="Color del Texto"
                                        value="#FFFFFF" onchange="elinvTitBonitos.setEntorno();">

                                    <hr>
                                    <!-- Definimos el ancho del borde -->
                                    <div class="text-center">
                                        <label id="labanchoBordeText" for="anchoBordeText" class="text-primary">
                                            Ancho Borde Texto ➡
                                        </label>
                                        <input type="range" min="1" max="100" value="8" class="slider"
                                            id="anchoBordeText" name="anchoBordeText"
                                            onchange="labanchoBordeText.innerHTML = 'Ancho Borde Texto ➡ '+this.value; elinvTitBonitos.setEntorno();">
                                    </div>
                                    <hr>

                                </div>

                                <!-- A partir de aquí definir color gradient en tres escalas. -->
                                <div class="flex-content">

                                    <label for="strokText" class="text-success">
                                        Borde ➡ Gradient Panel
                                    </label>
                                    <input type="checkbox" id="checkStrokTextGradient" name="checkStrokTextGradient"
                                        value="" onchange="elinvTitBonitos.setEntorno()"><br>

                                    <label id="lblBordeX0GradientIni" for="BordeX0GradientIni" class="text-primary">
                                        X0 ➡ Inicio : 1
                                    </label>
                                    <input type="range" min="1" max="2000" value="1" class="slider"
                                        id="BordeX0GradientIni" name="BordeX0GradientIni"
                                        onchange="lblBordeX0GradientIni.innerHTML = 'X0 ➡ Inicio : '+this.value; elinvTitBonitos.setEntorno();"><br>

                                    <label id="lblBordeY0GradientIni" for="BordeY0GradientIni" class="text-primary">
                                        Y0 ➡ Inicio : 1
                                    </label>
                                    <input type="range" min="1" max="2000" value="1" class="slider"
                                        id="BordeY0GradientIni" name="BordeY0GradientIni"
                                        onchange="lblBordeY0GradientIni.innerHTML = 'Y0 ➡ Inicio : '+this.value; elinvTitBonitos.setEntorno();"><br>


                                    <label id="lblBordeX1GradientIni" for="BordeX1GradientIni" class="text-primary">
                                        X1 ➡ Final : 900
                                    </label>
                                    <input type="range" min="1" max="2000" value="900" class="slider"
                                        id="BordeX1GradientIni" name="BordeX1GradientIni"
                                        onchange="lblBordeX1GradientIni.innerHTML = 'X1 ➡ Final : '+this.value; elinvTitBonitos.setEntorno();"><br>


                                    <label id="lblBordeY1GradientIni" for="BordeY1GradientIni" class="text-primary">
                                        Y1 ➡ Final : 900
                                    </label>
                                    <input type="range" min="1" max="2000" value="900" class="slider"
                                        id="BordeY1GradientIni" name="BordeY1GradientIni"
                                        onchange="lblBordeY1GradientIni.innerHTML = 'Y1 ➡ Final : '+this.value; elinvTitBonitos.setEntorno();">

                                    <!-- Etapa formación colores gradient -->
                                    <label for="textBordeGradient1" class="text-success">
                                        Gradient color inicial
                                    </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px; width: 200px;"
                                        type="color" id="textBordeGradient1" name="textBordeGradient1"
                                        title="Color 1 del Gradient" value="#FF0000"
                                        onchange="elinvTitBonitos.setEntorno();">

                                    <label for="textBordeGradient2" class="text-success">
                                        Gradient color medio
                                    </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px; width: 200px;"
                                        type="color" id="textBordeGradient2" name="textBordeGradient2"
                                        title="Color 1 del Gradient" value="#00FF00"
                                        onchange="elinvTitBonitos.setEntorno();">

                                    <label for="textBordeGradient3" class="text-success">
                                        Gradient color final
                                    </label>
                                    <input class="form-control text-primary"
                                        style="margin: 0px auto; display: block; height: 50px; width: 200px;"
                                        type="color" id="textBordeGradient3" name="textBordeGradient3"
                                        title="Color 1 del Gradient" value="#0000FF"
                                        onchange="elinvTitBonitos.setEntorno();">

                                </div>
                            </div>
                        </div>

                        <!-- GRADIENT -->
                        <div id="tab_6" class="tabs-panel" style="background-color: #8dd20c;">
                            <div style="display: grid;  grid-template-columns: 1fr 1fr">

                                <!-- Control Gradient del Texto -->
                                <div class="flex-content">
                                    <div id="" style="margin: auto;">
                                        <label for="gradientInicial" class="text-primary">Color inicial: </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientInicial" name="gradientInicial" title="Gradient color inicial"
                                            value="#00FF00" onchange="elinvTitBonitos.setEntorno();">
                                    </div>
                                    <div id="" style="margin: auto;">
                                        <label for="gradientMedio" class="text-primary">Color intermedio: </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientMedio" name="gradientMedio" title="Gradient color medio."
                                            value="#0000FF" onchange="elinvTitBonitos.setEntorno();">
                                    </div>
                                    <div id="" style="margin: auto;">
                                        <label for="gradientFinal" class="text-primary">Color final: </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientFinal" name="gradientFinal" title="Gradient color final"
                                            value="#FF0000" onchange="elinvTitBonitos.setEntorno();">
                                    </div><br>
                                    <!-- input checkbox para habilitar gradient -->
                                    <input type="checkbox" id="textGradient1" name="textGradient1" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <label for="textGradient1"> Activar gradient en Texto</label>
                                    <br>
                                    <input type="checkbox" id="textGradHorVert" name="textGradHorVert" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <label for="textGradHorVert"> Horizontal/Vertical</label>
                                    <!-- Sliders para presentar mejor los gradient del texto -->
                                    <input type="range" min="1" max="2000" value="1000" class="slider"
                                        id="textTranslateGradient" onchange="elinvTitBonitos.setEntorno();">
                                </div>

                                <!-- Control Gradient del fondo -->
                                <div class="flex-content">
                                    <div id="" style="margin: auto;">
                                        <label for="gradientInicialFondo" class="text-primary">Color inicial:
                                        </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientInicialFondo" name="gradientInicialFondo"
                                            title="Gradient color inicial del fondo" value="#00FF00"
                                            onchange="elinvTitBonitos.setEntorno();">
                                    </div>
                                    <div id="" style="margin: auto;">
                                        <label for="gradientMedioFondo" class="text-primary">Color intermedio:
                                        </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientMedioFondo" name="gradientMedioFondo"
                                            title="Gradient color medio del fondo." value="#0000FF"
                                            onchange="elinvTitBonitos.setEntorno();">
                                    </div>
                                    <div id="" style="margin: auto;">
                                        <label for="gradientFinalFondo" class="text-primary">Color final: </label>
                                        <input class="form-control text-primary"
                                            style="margin: 0px auto; display: block; height: 50px;" type="color"
                                            id="gradientFinalFondo" name="gradientFinalFondo"
                                            title="Gradient color final del fondo" value="#FF0000"
                                            onchange="elinvTitBonitos.setEntorno();">
                                    </div><br>
                                    <!-- input checkbox para habilitar gradient -->
                                    <input type="checkbox" id="fondoGradient1" name="fondoGradient1" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <label for="fondoGradient1"> Activar gradient en el fondo.</label>
                                    <br>
                                    <input type="checkbox" id="fondoGradHorVert" name="fondoGradHorVert" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <label for="fondoGradHorVert"> Horizontal/Vertical</label>
                                    <!-- Sliders para presentar mejor gradient del fondo -->
                                    <input type="range" min="1" max="2000" value="1000" class="slider"
                                        id="fondoTranslateGradient" onchange="elinvTitBonitos.setEntorno();">
                                </div>
                            </div>
                        </div>

                        <!-- TEXTURAS -->
                        <div id="tab_7" class="tabs-panel" style="background-color: #a1f800;">
                            <div class="flex-content" data-includeHTML="./files/texturasImg.html"></div>
                        </div>

                        <!-- OVERLAID -->
                        <div id="tab_8" class="tabs-panel" style="background-color: #a1f800;">
                            <div class="flex-content">
                                <!-- seleccionar fonts -->
                                <div id="" style="margin: auto; position: relative; top: 08px; ">
                                    <label class="text-success" for="textTexture">
                                        Controles texturas externas ➡
                                    </label>
                                    <input type="file" id="textTexture" name="textTexture"
                                        accept=".png, .jpeg, .gif, .jpg">
                                    <hr>
                                    <div style="display: grid;  grid-template-columns: 1fr 1fr">
                                        <!-- Controles overlai de origen -->
                                        <div class="flex-content">
                                            <label id="labXOrigenGet" for="OverXOrigenGet" class="text-primary">X
                                                eje
                                                Origen :
                                                1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverXOrigenGet" name="OverXOrigenGet"
                                                onchange="labXOrigenGet.innerHTML = 'X eje Origen:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');"><br>

                                            <label id="labYOrigenGet" for="OverYOrigenGet" class="text-primary">Y
                                                eje
                                                Origen :
                                                1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverYOrigenGet" name="OverYOrigenGet"
                                                onchange="labYOrigenGet.innerHTML = 'Y eje Origen:'+this.value;elinvTitBonitos.corregirTextGetFiles('getfile');">

                                            <label id="labAnchoOrigenGet" for="Ancho_OrigenGet"
                                                class="text-primary">Ancho
                                                Origen : 1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Ancho_OrigenGet" name="Ancho_OrigenGet"
                                                onchange="labAnchoOrigenGet.innerHTML = 'Ancho Origen:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">

                                            <label id="labAltoOrigenGet" for="Alto_OrigenGet" class="text-primary">Alto
                                                Origen
                                                : 1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Alto_OrigenGet" name="Alto_OrigenGet"
                                                onchange="labAltoOrigenGet.innerHTML = 'Alto Origen : '+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">
                                        </div>

                                        <!-- Controles overlai de destino -->
                                        <div class="flex-content">
                                            <label id="labXDestinoGet" for="OverXDestinoGet" class="text-primary">X
                                                eje
                                                Destino : 1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverXDestinoGet" name="OverXDestinoGet"
                                                onchange="labXDestinoGet.innerHTML = 'X eje Destino:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">

                                            <label id="labYDestinoGet" for="OverYDestinoGet" class="text-primary">Y
                                                eje
                                                Destino : 1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverYDestinoGet" name="OverYDestinoGet"
                                                onchange="labYDestinoGet.innerHTML = 'Y eje Origen:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">

                                            <label id="labAnchoDestinoGet" for="Ancho_DestinoGet"
                                                class="text-primary">Ancho
                                                Dest:1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Ancho_DestinoGet" name="Ancho_DestinoGet"
                                                onchange="labAnchoDestinoGet.innerHTML = 'Alto Dest:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">

                                            <label id="labAltoDestinoGet" for="Alto_DestinoGet"
                                                class="text-primary">Alto
                                                Dest:1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Alto_DestinoGet" name="Alto_DestinoGet"
                                                onchange="labAltoDestinoGet.innerHTML = 'Alto Dest:'+this.value; elinvTitBonitos.corregirTextGetFiles('getfile');">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Controles -->
                                    <label class="text-success" for="textTexture">
                                        Controles texturas precargadas ⬇
                                    </label>
                                    <hr>
                                    <div style="display: grid;  grid-template-columns: 1fr 1fr">
                                        <!-- Controles overlai de origen -->
                                        <div class="flex-content">
                                            <label id="labXOrigen" for="OverXOrigen" class="text-primary">X eje
                                                Origen :
                                                1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverXOrigen" name="OverXOrigen"
                                                onchange="labXOrigen.innerHTML = 'X eje Origen:'+this.value; elinvTitBonitos.setEntorno();"><br>

                                            <label id="labYOrigen" for="OverYOrigen" class="text-primary">Y eje
                                                Origen :
                                                1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverYOrigen" name="OverYOrigen"
                                                onchange="labYOrigen.innerHTML = 'Y eje Origen:'+this.value;elinvTitBonitos.setEntorno();">

                                            <label id="labAnchoOrigen" for="Ancho_Origen" class="text-primary">Ancho
                                                Origen : 1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Ancho_Origen" name="Ancho_Origen"
                                                onchange="labAnchoOrigen.innerHTML = 'Ancho Origen:'+this.value; elinvTitBonitos.setEntorno();">

                                            <label id="labAltoOrigen" for="Alto_Origen" class="text-primary">Alto
                                                Origen
                                                : 1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Alto_Origen" name="Alto_Origen"
                                                onchange="labAltoOrigen.innerHTML = 'Alto Origen : '+this.value; elinvTitBonitos.setEntorno();">
                                        </div>

                                        <!-- Controles overlai de destino -->
                                        <div class="flex-content">
                                            <label id="labXDestino" for="OverXDestino" class="text-primary">X eje
                                                Destino : 1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverXDestino" name="OverXDestino"
                                                onchange="labXDestino.innerHTML = 'X eje Destino:'+this.value; elinvTitBonitos.setEntorno();">

                                            <label id="labYDestino" for="OverYDestino" class="text-primary">Y eje
                                                Destino : 1</label>
                                            <input type="range" min="1" max="1200" value="1" class="slider"
                                                id="OverYDestino" name="OverYDestino"
                                                onchange="labYDestino.innerHTML = 'Y eje Origen:'+this.value; elinvTitBonitos.setEntorno();">

                                            <label id="labAnchoDestino" for="Ancho_Destino" class="text-primary">Ancho
                                                Dest:1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Ancho_Destino" name="Ancho_Destino"
                                                onchange="labAnchoDestino.innerHTML = 'Alto Dest:'+this.value; elinvTitBonitos.setEntorno();">

                                            <label id="labAltoDestino" for="Alto_Destino" class="text-primary">Alto
                                                Dest:1000</label>
                                            <input type="range" min="1" max="3500" value="1000" class="slider"
                                                id="Alto_Destino" name="Alto_Destino"
                                                onchange="labAltoDestino.innerHTML = 'Alto Dest:'+this.value; elinvTitBonitos.setEntorno();">
                                        </div>
                                    </div>
                                    <hr>
                                    <label class="text-success" for="textTexture">
                                        Overlaid en Texto
                                    </label>
                                    <input type="checkbox" id="textOverlaidCheck" name="textOverlaidCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <hr>
                                </div>

                            </div>
                        </div>

                        <!-- FILTROS -->
                        <div id="tab_9" class="tabs-panel" style="background-color: #abd261;">
                            <div style="display: grid;  grid-template-columns: 1fr 1fr">
                                <!-- Filtros controles -->
                                <div class="flex-content">
                                    <!-- Activar filtros -->
                                    <label class="text-success" for="actFiltros">
                                        Activar Filtros
                                    </label>
                                    <input type="checkbox" id="actFiltros" name="actFiltros" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Grayscale -->
                                    <label id="lblGrayscaleFil" for="grayscaleFil" class="text-primary">
                                        Grayscale : 50%
                                    </label>
                                    <input type="checkbox" id="grayScaleCheck" name="grayScaleCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="100" value="50%" class="slider" id="grayscaleFil"
                                        name="grayscaleFil"
                                        onchange="lblGrayscaleFil.innerHTML = 'Grayscale : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Invert -->
                                    <label id="lblInvertFil" for="InvertFil" class="text-primary">
                                        Invert : 75%
                                    </label>
                                    <input type="checkbox" id="invertCheck" name="invertCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="100" value="75%" class="slider" id="InvertFil"
                                        name="InvertFil"
                                        onchange="lblInvertFil.innerHTML = 'Invert : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Sepia -->
                                    <label id="lblSepiaFil" for="sepiaFil" class="text-primary">
                                        Sepia : 75%
                                    </label>
                                    <input type="checkbox" id="sepiaCheck" name="sepiaCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="100" value="75" class="slider" id="sepiaFil"
                                        name="sepiaFil"
                                        onchange="lblSepiaFil.innerHTML = 'Sepia : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto hue-rotate -->
                                    <label id="lblHue_RotateFil" for="hue_rotateFil" class="text-primary">
                                        Hue_rotate : 90 deg
                                    </label>
                                    <input type="checkbox" id="hue_rotateCheck" name="hue_rotateCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="360" value="90" class="slider" id="hue_rotateFil"
                                        name="hue_rotateFil"
                                        onchange="lblHue_RotateFil.innerHTML = 'Hue_rotate : ' + this.value + ' deg'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                </div>

                                <!-- Controles overlai de destino -->
                                <div class="flex-content">

                                    <!-- Efecto Brightness -->
                                    <label id="lblBrightnessFil" for="brightnessFil" class="text-primary">
                                        Brightness : 100%
                                    </label>
                                    <input type="checkbox" id="brightnessCheck" name="brightnessCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="400" value="100" class="slider" id="brightnessFil"
                                        name="brightnessFil"
                                        onchange="lblBrightnessFil.innerHTML = 'Brightness : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Contrast -->
                                    <label id="lblContrastFil" for="contrastFil" class="text-primary">
                                        Contrast : 100%
                                    </label>
                                    <input type="checkbox" id="contrastCheck" name="contrastCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="400" value="100" class="slider" id="contrastFil"
                                        name="contrastFil"
                                        onchange="lblContrastFil.innerHTML = 'Contrast : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Saturate -->
                                    <label id="lblSaturateFil" for="saturateFil" class="text-primary">
                                        Saturate : 100%
                                    </label>
                                    <input type="checkbox" id="saturateCheck" name="saturateCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="1000" value="100" class="slider" id="saturateFil"
                                        name="saturateFil"
                                        onchange="lblSaturateFil.innerHTML = 'Saturate : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Blur -->
                                    <label id="lblBlurFil" for="blurFil" class="text-primary">
                                        Blur : 10px
                                    </label>
                                    <input type="checkbox" id="blurCheck" name="blurCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="30" value="10" class="slider" id="blurFil"
                                        name="blurFil"
                                        onchange="lblBlurFil.innerHTML = 'Blur : ' + this.value + 'px'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                    <!-- Efecto Opacity -->
                                    <label id="lblOpacityFil" for="opacityFil" class="text-primary">
                                        Opacity : 100%
                                    </label>
                                    <input type="checkbox" id="opacityCheck" name="opacityCheck" value=""
                                        onchange="elinvTitBonitos.setEntorno();">
                                    <input type="range" min="1" max="100" value="100" class="slider" id="opacityFil"
                                        name="opacityFil"
                                        onchange="lblOpacityFil.innerHTML = 'Opacity : ' + this.value + '%'; elinvTitBonitos.setEntorno();">
                                    <hr>

                                </div>
                            </div>
                        </div>

                    </div>

                </div><br>

            </div>
        </div>
    </div>

    <!-- DIALOGO MODAL -->
    <div class="m-4">
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">  
                        <h5 class="modal-title">
                            Titulos Bonitos Elinv
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p id="dialTitleCuestion">
                            Seleccione opción?
                        </p>
                        <p id="dialInfo" class="text-secondary"><small>
                            Estas son sus opciones.
                        </small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Exit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./scr/jquery-3.6.0.js"></script>
    <script src="./scr/bootstrap.bundle.min.js"></script>    
    <script src="./scr/arrayFont.js"></script>
    <script src="./scr/scripts.js"></script>
    <script src="./scr/config.js"></script>

</body>

</html>
