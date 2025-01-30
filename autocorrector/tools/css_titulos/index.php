<?php
    include_once('../../contador.php');
?>

<!-- Agregar posibilidad fondo transparente -->

<!DOCTYPE html>
<html lang="es">

<head>
    <title>ELINV CSS titulos!</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Elinv">
    <meta name="copyright" content="Copyright (c) by Elinv.  All Rights Reserved." />
    <meta name="description" content="Crear textos destacados y convertirlos en imagenes." />
    <meta name="keywords" content="Elinv, textos, destacados, css efectos, convertir en imagenes">
    <link rel="icon" type="image/png" sizes="96x96" href="./img/a.png">
    <link rel="stylesheet" href="./scr/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <style>
        .sombra {
            background: url("./img/sombra.png") no-repeat scroll center center #ffffff;
            height: 56px;
            margin: auto;
        }
    </style>
</head>

<body>
<br>
    <div class="container-fluid">
        <br>
        <div class="" style="text-align:center;">
            <div class="gral neon" id="capture" name="capture" 
            style="font-family: Tangerine; display:inline-block;
                margin-left:auto;
                margin-right:auto;
                padding-left: 50px;
                padding-right: 50px;
                text-align:center;
                height: auto;">
                    🌳Elinv🌈
            </div>
        </div>

        <div class="sombra"></div>

        <br>
        <div style="display: grid;  grid-template-columns: 1fr 1fr">
            <div class="flex-content">
                <!-- Captura normal -->
                <button type="button" class="btn btn-success" id="btnScreenShot" onclick="html2canvas(document.querySelector('#capture')).then(canvas=>{document.getElementById('img-out').appendChild(canvas)
                });">
                    Capturar
                </button>                
                <!-- Captura fondo transparente -->
                <button type="button" class="btn btn-success" id="btnScreenShot" onclick="let el = document.querySelector('#capture'); html2canvas(el,{backgroundColor:null}).then(canvas => {document.getElementById('img-out').appendChild(canvas);})">
                    Capturar
                </button>
                <hr>

                <div class="flex-content" id="efectos" style="height: 250px; overflow: auto;">
                </div>
            </div>

            <div class="flex-content">
                <br>
                <label for="sizeFont" id="sizeFontLbl" class="text-primary">Font size: 150</label>
                <input type="range" min="10" max="300" value="150" class="slider" id="sizeFont"
                    onchange="document.getElementById('capture').style.fontSize = parseInt(this.value)+'px'; sizeFontLbl.innerHTML ='Font size: ' + this.value">

                <label for="sizeFont" id="sizeFontLbl" class="text-primary">Tu logo</label>

                <textarea class="form-control text-primary text-center" id="textLinea2" name="textLinea2" placeholder="Ingresá el texto de tu logo" rows="2" cols="40" onchange="capture.innerHTML = this.value;"></textarea>

                <br>

                <!-- BOTONES TIPOS DE LETRAS -->
                <div class="flex-content" data-includeHTML="./files/botones_letras.html"
                    style="height: 250px; overflow: auto;">
                </div>

            </div>

        </div>
        
        <div class="sombra"></div>

        <br><br>
        
        <div style="text-align:center;">
            <div class="neon" id="img-out" 
                style="padding-top: 25px;padding-bottom: 25px; height: auto;">
            </div>
        </div>    
        <div class="sombra"></div>
    </div>


    <script src="./scr/html2canvas.js"></script>
    <script src="./scr/func_grales.js"></script>
    <script src="./files/elementosAleatorios.js"></script>
    <script src="./scr/jquery.min.js"></script>
    <script src="./scr/bootstrap.min.js"></script>

    <script>

        function changeFont(tipo) {
            var cambiaLetra = new FontFace('letra nueva', 'url(' + tipo + ')');
            cambiaLetra.load().then(function (loaded) {
                document.fonts.add(loaded);
                document.getElementById('capture').style.fontFamily = '"letra nueva", Arial';
            }).catch(function (error) {
                // error
            });
        }

        // Incluir porciones html externa
        $(document).ready(function () {
            $("div[data-includeHTML]").each(function () {
                $(this).load($(this).attr("data-includeHTML"));
            });
        });

        /* Función para desordenar array de elementos */
        function desordenar(unArray) {
            var t = unArray.sort(function (a, b) { return (Math.random() - 0.5) });
            return [...t];
        }
        // Contendrá el array desordenado
        efectosDesordenados = [];
        //creo bucle para llenar array vacío
        for (i = 0; i < 4; i++) {
            x = desordenar(efectos);
            efectosDesordenados[i] = x;
        }

        //Agregando elementos
        String.prototype.toDOM = function () {
            var d = document
                , i
                , a = d.createElement("div")
                , b = d.createDocumentFragment();
            a.innerHTML = this;
            while (i = a.firstChild) b.appendChild(i);
            return b;
        };
        //Convertimos a string
        var aleat = efectosDesordenados[0].join();
        var foo = aleat.toDOM();
        //Agregamos a la pagina en el div puntual
        document.getElementById("efectos").appendChild(foo);

    </script>


</body>

</html>