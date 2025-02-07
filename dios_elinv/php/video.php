<?php

function videoFullInVid(videoFullDiv $vidFull){    
    $estilos = <<< ESTILOS
        <style>
            :root {
                --ancho: 412px;
                --alto: 777px;
            }
            .out_container {
                display: flex;
                justify-content: center;
                margin-top: {$vidFull->posDesdeTop};
                opacity: {$vidFull->opacidad};
            }
            .vidContainer {
                width: var(--ancho);
                height: var(--alto);
                border: 2px solid #000;
                border-radius: 10px;
                overflow: auto;
                overflow:hidden;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /*Shador oscuro*/
                /* -webkit-box-shadow: 5px 5px 15px 5px #000000; 
                box-shadow: 5px 5px 15px 5px #000000; */
                /*Bordes target*/
                -webkit-box-shadow: 8px 0px 0px 0px #DCD0C0, 0px 8px 0px 0px #B1938B, -8px 0px 0px 0px #4E4E56, 0px 0px 0px 8px #DA635D, 5px 5px 15px 5px rgba(0,0,0,0); 
                box-shadow: 8px 0px 0px 0px #DCD0C0, 0px 8px 0px 0px #B1938B, -8px 0px 0px 0px #4E4E56, 0px 0px 0px 8px #DA635D, 5px 5px 15px 5px rgba(0,0,0,0);           
            }
            h1 {
                font-size: 24px;
                color: #2ecc71;
                margin: 20px;
                text-align: center;
            }
            .sticky {
                position: sticky;
                bottom: 0px;
                background-color: #2ecc71;
                background: rgba(0, 0, 0, 0.3);
                color: white;
                padding: 10px;
                font-size: 18px;
                text-align: center;
                z-index: 1;
            }
            h3 {
                font-size: 16px;
                padding: 10px 20px;
                line-height: 1.5;
                color: #333;
            }
            .vidClsFull {
                margin-left: auto !important;
                margin-right: auto !important;
                text-align: center !important;
                width: var(--ancho);
                height: var(--alto);
                z-index: 0;
            }
            video {
                object-fit: fill;
            }                
            @media only screen and (max-width: 480px) {
                .out_container {
                   display: flex;
                    justify-content: center;
                    margin-top: 0;
                    opacity: {$vidFull->opacidad};
                }
                .vidContainer {
                    width: var(--ancho);
                    height: var(--alto);
                }
                .vidClsFull {
                    width: var(--ancho);
                    height: var(--alto);
                }
                video {
                    object-fit: fill;
                }
            }
        </style>    
    ESTILOS;

    $videoFull = <<<VIDEOFULL
        <div class="out_container">
            <div class="vidContainer">
                <video height: "700"; autoplay muted loop id="myVideo" class="vidClsFull">
                    <source src="{$vidFull->vidUrl}" type="video/mp4" />
                </video>
                <div class="sticky">                    
                    <button id="myBtn" onclick="vidFullFunc()">Elinv</button>
                </div>
            </div>
        </div>
        <script>
            var video = document.getElementById("myVideo");
            var btn = document.getElementById("myBtn");

            function vidFullFunc() {
                if (video.paused) {
                    video.play();
                    btn.innerHTML = "Elinv";
                } else {
                    video.pause();
                    btn.innerHTML = "Elinv";
                }
            }
        </script>
    VIDEOFULL;

    $giftoFull = <<<GITTOFULL
        <div class="out_container">
            <div class="vidContainer">
                <img src="{$vidFull->vidUrl}" alt="dolores" class="vidClsFull">
                <div class="sticky">                    
                    <button id="myBtn" onclick="vidFullFunc()">Elinv</button>
                </div>
            </div>
        </div>
    GITTOFULL;

    // ? Diapositivas.
    $sinCache = rand(1,100);
    $diapositiva = '';
    foreach ($vidFull->img as $key => $img) {
        # code...
        $diapositiva .= "<div class=\"diapositiva\" id=\"diapositiva-{$key} \"> 
                <a href=\"https://www.n1m.com/elinv\" target=\"_blank\" rel=\"noopener noreferrer\" title=\"Pre estreno únicamente en N1M\">
                    <img src=\"./video/diap/{$img}?{$sinCache}\" alt=\"\" loading=\"lazy\">
                </a>
            </div> ";
    }
    $estiloGaleria = <<<ESTILOGALERIA
        <style>
            :root {
                --ancho: 412px;
                --alto: 777px;
            }
            .diapositivas { 
                position: relative; 
                width: var(--ancho); 
                height: var(--alto);
                margin: 40px auto; 
                text-align: center; 
            } 
            .diapositiva { 
                position: absolute; 
                top: 22px; 
                left: 0; 
                width: 100%; 
                height: var(--alto); 
                display: none; 
                opacity: {$vidFull->opacidad};
            } 
            .diapositiva.active { 
                display: block; 
            } 
            .boton-anterior, .boton-siguiente { 
                position: absolute; 
                top: 0%; 
                transform: translateY(-50%); 
                background-color: #4CAF50; 
                color: #fff; 
                border: none; 
                padding: 10px 20px; 
                font-size: 16px; 
                cursor: pointer; 
            } 
            .boton-anterior { 
                left: 0; 
            } 
            .boton-siguiente { 
                right: 0; 
            }
            img{
                width: 100%; 
            }
            @media only screen and (max-width: 480px) {
                img{
                    height: 100%; 
                }
            }
        </style>   
        <div class="diapositivas"> 
            {$diapositiva}            
            <button class="boton-anterior" onclick="anterior()">Anterior</button> 
            <button class="boton-siguiente" onclick="siguiente()">Siguiente</button> 
        </div> 
        <script type="text/javascript" charset="utf-8"> 
            let diapositivas = document.querySelectorAll('.diapositiva'); 
            let indice = 0; 
            diapositivas[indice].classList.add('active'); 
            function anterior() { 
                diapositivas[indice].classList.remove('active'); 
                indice--; 
                if (indice < 0) { 
                    indice = diapositivas.length - 1; 
                } 
                diapositivas[indice].classList.add('active'); 
            }             
            function siguiente() { 
                diapositivas[indice].classList.remove('active'); 
                indice++; 
                if (indice >= diapositivas.length) { 
                    indice = 0; 
                } 
                diapositivas[indice].classList.add('active');
            } 
            // Get window width - height
            var anchoVar = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            var altoVar = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            // Get the root element
            var root = document.documentElement;
            // Change the width
            root.style.setProperty('--ancho', anchoVar);
            root.style.setProperty('--alto', altoVar);
        </script> 
    ESTILOGALERIA;

    if ($vidFull->tipo == 'video'){
        print ($estilos);
        print ($videoFull);
    }else if ($vidFull->tipo == 'gif'){
        print ($estilos);
        print ($giftoFull);
    }else if ($vidFull->tipo == 'galeria'){
        print ($estiloGaleria);
    }
}


function estrenoInDiv(estrenoINDiv $estreno){
    $estreno = <<< ESTRENO
        <style>
            .center-div
            {
                position: absolute;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 400px;
                height: 400px;
                background-color: #ccc;
                border-radius: 3px;  
                -webkit-border-radius: 13px;
                -moz-border-radius: 13px;
                border-radius: 13px;
            }
            .imgCls{
                -webkit-box-shadow: 5px 5px 15px 5px #000000; 
                box-shadow: 5px 5px 15px 5px #000000;
                -webkit-border-radius: 13px;
                -moz-border-radius: 13px;
                border-radius: 13px;
            }
        </style>
        <div class='center-div'>
            <a href='{$estreno->estrenoUrl}' 
                target='_blank'>
                <img class="imgCls" src='{$estreno->img}' alt='{$estreno->title}' title='{$estreno->title}'>
            </a>
        </div>
    ESTRENO;
    echo $estreno;
}