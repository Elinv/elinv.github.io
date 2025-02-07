<?php
/**
 *  Si es PC o un TELEFONO MOVIL
 */
function movil(){ 
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i',strtolower($_SERVER   ['HTTP_USER_AGENT']))){
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

function isMobile() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileDevices = [
        'Android', 'iPhone', 'iPad', 'iPod', 'BlackBerry', 'Windows Phone', 'Opera Mini', 'IEMobile', 'Mobile'
    ];

    foreach ($mobileDevices as $device) {
        if (stripos($userAgent, $device) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * Head Html
 *
 * @param Type String $lang     => País Idioma tipo de html
 * @param Type String $title    => título de la página
 * @param Type String $content  => De que se trata, contenido
 * @param Type String $autor    => del nombre del autor
 * @param Type String $keywords => palabaras claves 
 * @param Type String $favicon  => icon favicon
 * 
 **/
function printHTML5(htmlHEAD $cfgHtmlHead)
{
    $viewHTML = <<<HTMLHEAD
        <!DOCTYPE html>
        <html lang="{$cfgHtmlHead->lang}">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>"{$cfgHtmlHead->title}"</title>
            <meta name="description"
                content="{$cfgHtmlHead->content}" />
            <meta name="author" content="{$cfgHtmlHead->autor}" />
            <meta name="keywords" content="{$cfgHtmlHead->keywords}">
            <meta name="language" content="Spanish">
            <link rel="icon" type="image/x-icon" href="{$cfgHtmlHead->favicon}" />
            <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
            <meta http-equiv="Pragma" content="no-cache" />
            <meta http-equiv="Expires" content="0" />
        </head>
    HTMLHEAD;
    echo $viewHTML;
}

/**
 * Body config
 *
 * @param Type String $backG     => Imagen de fondo ~ NULL es igual a ""
 * 
 **/
function bodyCfg($backG_PC, $backG_MOV)
{
    if ($backG_PC != "" || $backG_MOV != ""){
        // detectamos de donde proviene el tráfico
        // Solo autorizamos su uso en PC escritorio, debido al formato.
        if (isMobile()) {
            // móvil
            echo "<body style=\"{$backG_MOV}; background-position: right top; background-repeat: no-repeat; background-size: cover; \">";            
        } else {
            echo "<body style=\"{$backG_PC}; background-repeat: no-repeat;  background-size: 100% 100%; min-height: 110vh;\">";
        }
    }else{
        echo "<body";
    }
}

/**
 * Player Google Drive
 *
 * @param Type String $bottomPC     => posición desde abajo en PC
 * @param Type String $bottomMOV    => posición desde abajo en MOVIL
 * @param Type String $video        => URL video
 * @param Type String $videoText    => Text href video
 * 
 **/
function playerGoogleDrive($bottomPC, $bottomMOV, $video, $videoText)
{
    echo "
        <style>
        .vidClas {
            background-color: #07328d;
            border-left: 6px solid #f44336; /*Señalador a la izquierda*/
            -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0, 0, 0, 0);
            box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0, 0, 0, 0);
            position: absolute;
            margin-left: 10%;
            max-height: 445px;
            border-radius: 20px;
            margin-bottom: 1em;
            left: 0; 
            right: 0; 
            margin-inline: auto; 
            width: fit-content; 
            bottom:{$bottomPC}px
        }
        @media (max-width: 900px) {
            .vidClas {
                bottom:{$bottomMOV}px
            }
        }
        </style>
        <div class=\"vidClas\">
        <a href=\"{$video}\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"color:white; margin-left: 20px;\">
        <center><b><u>$videoText</u></b></center></a> </div>";
}


/**
 * Foto presentación.
 *
 * @param Type String $bottomPC     => posición desde abajo en PC
 * @param Type String $bottomMOV    => posición desde abajo en MOVIL
 * @param Type String $urlfoto      => URL foto
 * @param Type String $fotoText     => Text href video
 * @param Type String $W            => Foto ancho
 * @param Type String $H            => Foto alto
 * @param Type String $video        => Video Url
 * 
 **/
function fotoPresentacion(fotoPresenta $fotoPresen, $view)
{
    // De acuerdo a la variable mostramos la imagen o no
    $imagen = "";
    if ($view == "si"){
        $imagen = "<img class=\"img\" src=\"{$fotoPresen->fotoUrl}\" alt=\"\" width=\"{$fotoPresen->W}\" height=\"{$fotoPresen->H}\" loading=\"lazy\">";
    }
    // Imprimimos todo 
    echo "
        <style>
        .fotoClass {
            position: absolute;
            margin-left: 10%;
            max-height: 445px;
            margin-bottom: 1em;
            left: 0; 
            right: 0; 
            margin-inline: auto; 
            width: fit-content; 
            bottom:{$fotoPresen->posBottomPC}px;
            opacity:0.6;
        }
        .img {
            border-radius: 18px;
            padding: 9px;
        }
        @media (max-width: 900px) {
            .fotoClass {
                bottom:{$fotoPresen->posBottomMOVIL}px
            }
        }
        </style>
        <div class=\"fotoClass\">
        <a href=\"{$fotoPresen->videoUrl}\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"color:white; margin-left: 0px;\">
        $imagen
        <center><b><u style=\"opacity:1;\">{$fotoPresen->fotoText}</u></b></center></a>        
        </div>";
}


/**
 * Add Button menu 
 *
 * @param Type String $classBut         => Clase del botón
 * @param Type String $bottomPC         => posición desde abajo en PC
 * @param Type String $bottomMOV        => posición desde abajo en MOVIL
 * @param Type String $aHrefButMenu1    => URL destino
 * @param Type String $imgSrcButMenu1   => URL  de la imagen
 * @param Type String $altTitButMenu1   => Text alt y title de la imagen 
 * 
 **/
function addButMenu(butCpyrgth $butCpy)
{
    echo "
        <style>
        .{$butCpy->class} {
            position: absolute; 
            left: 0; 
            right: 0; 
            margin-inline: auto; 
            width: fit-content; 
            bottom:{$butCpy->posButMenu2PC}px;
        }
        @media (max-width: 900px) {
            .{$butCpy->class} {
                bottom:{$butCpy->posButMenu2MOV}px
            }
        }                     
        </style>
        <div class=\"{$butCpy->class}\">
        <a class=\"luz\" href=\"{$butCpy->aHrefButMenu2}\" target=\"_blank\">
        <img src=\"{$butCpy->imgSrcButMenu2}\" 
        alt=\"{$butCpy->altTitButMenu2}\" 
        title=\"{$butCpy->altTitButMenu2}\" loading=\"lazy\"></a>
        </div>";
}



/**
 * Video animación 
 *
 * @param Type String $classBut             => Clase de la animación
 * @param Type String $bottomPC             => posición desde abajo en PC
 * @param Type String $bottomMOV            => posición desde abajo en MOVIL
 * @param Type String $sourceVideoAnima     => URL  de la animación
 * @param Type String $transp               => Grado de transparencia ej: 0.6
 * 
 **/
function videoAnima($classBut, $bottomPC, $bottomMOV, $sourceVideoAnima, $transp)
{
    echo "
    <style>
        .$classBut {
            margin-top: {$bottomPC}px;
            opacity: {$transp}; 
            bottom:{$bottomPC}px;
        }
        @media (max-width: 900px) {
            .$classBut {
                bottom:{$bottomMOV}px
            }
        }                     
    </style>
    <div class=\"{$classBut}\">
    <video width=\"100%\" height=\"240\" controls=\"\" loop=\"\" autoplay=\"\" muted=\"\"> 
    <source src=\"$sourceVideoAnima\" type=\"video/mp4\">
    Tu navegador no soporta este tipo de videos.</video>
    </div>";
}


?>