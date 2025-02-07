<?php

function menu(){
    // aquí establecemos si el menu de SMS de Dios se muestra
    $diosSMSTrue = '';
    if ($_SESSION['diossms'] == 'true'){
        $diosSMSTrue = '<a href="./diosms" target="_blank" rel="noopener noreferrer">
            <img src="./assets/menu_img/Yosoy.svg" alt="Yosoy!">
        </a><br><br>';
    }
    // aquí establecemos si el menu de SMS de ReverbMusic
    $reverbMusicTrue = '';
    if ($_SESSION['reverbMusic'] == 'false'){
        $reverbMusicTrue = '<a href="./reverbMusic" target="_blank" rel="noopener noreferrer">
            <img src="./assets/menu_img/MusicOnLineElinv.svg" alt="Elinv Música On Line En ReverbNation!">
        </a><br><br>';
    }    
    // Si así lo consideran todo lo mio es vuestro.
    $siasiloconsideran = '';
    if ($_SESSION['siasiloconsideran'] == 'true'){
        $siasiloconsideran = '<a href="./gracias/index.php" target="_blank" rel="noopener noreferrer">
            <img src="./assets/menu_img/siasiloconsideran.svg" alt="Deben permanecer alertas!">
            </a><br><br> ';
    }     
    //cambiamos la imagen si se detecta movil
    // Solo autorizamos su uso en PC escritorio, debido al formato.
    if (isMobile()) {
        // móvil
        $popupFoto = '<img id="imgPopup" src="./assets/elinv/elinv_en_colores.webp"  alt="Imágen de Elinv en Colores para el menú">';
    } else {
        $popupFoto = '<img id="imgPopup" src="./assets/elinv/elinv_en_colores.webp" alt="Imágen de Elinv en Colores para el menú">';
    }


    $men = <<<MENUPRINCIPAL
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway:300,400,600&subset=latin-ext");
        .container {
            display: flex;
            align-items: top;
            justify-content: center;
            width: 100vw;
        }
        .button {
            text-decoration: none;
            font-size: 4.875rem;
            font-weight: 300;
            display: inline-block;
            position:absolute;
        }
        .popup {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: 100vw;
            height: 100vh;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            visibility: hidden;
            opacity: 1;
            overflow: hiden;
            transition: 0.64s ease-in-out;
        }
        .popup-inner {
            position: relative;
            bottom: -100vw;
            right: -100vh;
            display: flex;
            align-items: center;
            max-width: 800px;
            max-height: 600px;
            width: 60%;
            height: 80%;
            /*Reflector*/
            background: radial-gradient(300px at 60% 50% , #fff 40%, #000 100%);
            /*Vidrio*/
            transform: rotate(-352deg);
            transition: 0.99s ease-in-out;
              background: linear-gradient(
                50deg,
                rgba(255, 255, 255, 0.4) 12%,
                rgba(255, 255, 255, 0.1) 77%
            );
            background-blend-mode: ;
            box-shadow: 3px 4px 24px 3px rgba(0, 0, 0, 0.78);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            /*Vidrio*/
        }
        .popup__photo {
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            width: 40%;
            height: 100%;
            overflow: hidden;
        }
        .popup__photo img {
            width: auto;
            height: 100%;
            /*Vidrio*/
            transform: rotate(37deg);
            transition: 0.64s ease-in-out;
              background: linear-gradient(
                50deg,
                rgba(255, 255, 255, 0.4) 12%,
                rgba(255, 255, 255, 0.1) 77%
            );
            /*background-blend-mode:  ;*/
            box-shadow: 0px 4px 24px 1px rgba(0, 0, 0, 0.28);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            /*Vidrio*/
        }
        .popup__text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 60%;
            height: 100%;
            padding: 4rem;
        }
        .popup__text h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            text-transform: uppercase;
            color: #0A0A0A;
        }
        .popup__text p {
            font-size: 0.875rem;
            color: #686868;
            line-height: 1.2;
        }
        .popup:target {
            visibility: visible;
            opacity: 1;
        }
        .popup:target .popup-inner {
            bottom: 0;
            right: 0;
            transform: rotate(0);
        }
        .popup__close {
            position: absolute;
            right: -1rem;
            top: -1rem;
            width: 3rem;
            height: 3rem;
            font-size: 0.875rem;
            font-weight: 300;
            border-radius: 100%;
            border: 2px solid #1C6EA4;
            background-color: #007090;
            background: radial-gradient(300px at 50% 50% , #444 40%, #000 100%);
            z-index: 4;
            color: #fff;
            line-height: 3rem;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }
        .popup__close:hover {
            background: radial-gradient(300px at 50% 50% , #777 40%, #000 100%);
        }
        .h1Cls {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            width: 200px;
            height: 40px;
            border: 1px solid #07b92a;
            position: relative;
            transition: 3.9s;
            background: rgba(0,0,0,0.3);
        }

        .h1Cls::before {
            content: "E";
            display: block;
            font-size: 18px;
            background-color: #07B92A;
            color: #fff;
            border-radius: 3px;
            padding: 3px 5px;
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(-5px, -30%);
            transition: .3s;
        }

        .h1Cls:hover::before {
            transform: translate(-5px, -50%);
            color: #fff;
        }
        .h1Cls:hover {
            transform: translate(-5px, -50%);
            color: #fff;
        }
        @media only screen and (max-width: 600px) {
            .popup-inner{
                width: 95%;
                height: 100%;
            }
            .popup__photo img {
                width: 250px;
                height: 100%;
            }
            .popup__photo img {
                width: 150px;
                /*Vidrio*/
                transform: rotate(0deg);
                transition: 0.64s ease-in-out;
                background: linear-gradient(
                    50deg,
                    rgba(255, 255, 255, 0.4) 1%,
                    rgba(255, 255, 255, 0.1) 57%
                );
                background-blend-mode:saturation;
                box-shadow: 0px 4px 24px 1px rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(1px);
                -webkit-backdrop-filter: blur(1px);
                /*Vidrio*/
            }
        }
    </style>

    <div class="container">
        <a class="button" href="#popup">🌞</a>
        <div class="popup" id="popup">
            <div class="popup-inner">
                <div class="popup__photo">
                {$popupFoto}
                </div>
                <div class="popup__text">
                    <h1 class="h1Cls">Menu</h1>
                    <p class="" style="font-size: 1.4em;">
                        {$diosSMSTrue}
                        {$reverbMusicTrue}
                        {$siasiloconsideran}      
                        <a href="cor.php" target="_blank" rel="noopener noreferrer">
                            <img src="./assets/menu_img/Mini-Links-Elinv.svg" alt="Crea y compartí, tu mini link acortado o personalizado de estos terribles enlaces de mas de un kilómetro de extensión.">
                        </a><br><br>                                          
                        <a href="alerta.php" target="_blank" rel="noopener noreferrer">
                            <img src="./assets/menu_img/Elinv_Alerta.svg" alt="Deben permanecer alertas!">
                        </a><br><br>
                        <a href="acercade.php" target="_blank" rel="noopener noreferrer">
                            <img src="./assets/menu_img/Elinv_Acerca_de.svg" alt="Acerca de ...">
                        </a><br><br>

                        
                    </p>
                </div>
                <a class="popup__close" href="#">❌</a>
            </div>
        </div>
    </div>
    MENUPRINCIPAL;

    print ($men);
}

// <a href="./diosms" target="_blank" rel="noopener noreferrer">Hijo oye!</a><br><br>

// <a href="obra.php" target="_blank" rel="noopener noreferrer">
// <img src="./assets/menu_img/Cancionero_Elinv.svg" alt="Cancionero">
// </a><br><br>
// <a href="obra1.php" target="_blank" rel="noopener noreferrer">
// <img src="./assets/menu_img/Mas creaciones_Elinv.svg" alt="Mas...">
// </a><br><br>
// <a href="siestacontigo.php" target="_blank" rel="noopener noreferrer">
// <img src="./assets/menu_img/Dolor...es Dolores.svg" alt="Dolor...es Dolores">
// </a><br><br>