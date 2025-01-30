/* Configuración general -> save */
$("#butSaveConfigGral").click(function () {

    /* CONTIENE TODAS LAS VARIABLES CONCATENADAS */
    let cfgSave = ``;

    /* FONTS */
    let configAct = $('#fonts option:selected').index();
    cfgSave += `${configAct}|`;

    /* HACER LO MISMO CON EL TEXTURE FILE CARGADO POR EL USUARIO
        CONTROL: -> textTexture         file */

    /* Array de controles */
    let cfgControl = [
        /* COLOR */
        ['textColor', 'val'],
        ['shadowColor', 'val'],
        ['backgroundColor', 'val'],
        /* ['actBGTexture', 'cb'], */
        ['backgroundColor', 'val'],
        /* SOMBRAS */
        ['sombrasX', 'val'],
        ['sombrasY', 'val'],
        ['sombrasBlur', 'val'],
        /* EFECTOS */
        ['sizeFont', 'val'],
        ['separLineas', 'val'],

        ['3dEfect1', 'cb'],
        ['3dEfect2', 'cb'],
        ['3dEfect3', 'cb'],

        ['efect1', 'cb'],
        ['efect2', 'cb'],
        ['efect3', 'cb'],

        ['lienzoAncho', 'val'],
        ['lienzoAlto', 'val'],
        ['strokText', 'cb'],
        ['textBordeColor', 'val'],
        ['anchoBordeText', 'val'],
        ['checkStrokTextGradient', 'cb'],

        ['BordeX0GradientIni', 'val'],
        ['BordeY0GradientIni', 'val'],
        ['BordeX1GradientIni', 'val'],
        ['BordeY1GradientIni', 'val'],

        ['textBordeGradient1', 'val'],
        ['textBordeGradient2', 'val'],
        ['textBordeGradient3', 'val'],

        /* GRADIENT */
        ['gradientInicial', 'val'],
        ['gradientMedio', 'val'],
        ['gradientFinal', 'val'],
        ['textGradient1', 'cb'],
        ['textGradHorVert', 'cb'],

        ['textTranslateGradient', 'val'],
        ['gradientInicialFondo', 'val'],
        ['gradientMedioFondo', 'val'],
        ['gradientFinalFondo', 'val'],

        ['fondoGradient1', 'cb'],
        ['fondoGradHorVert', 'cb'],
        ['textBordefondoTranslateGradientColor', 'val'],

        /* TEXTURAS */
        /* Hay que ver como la guardamos */
        /* Que textura se ha hecho click */

        /* OVERLAID */
        ['OverXOrigenGet', 'val'],
        ['OverYOrigenGet', 'val'],
        ['Ancho_OrigenGet', 'val'],
        ['Alto_OrigenGet', 'val'],

        ['OverXDestinoGet', 'val'],
        ['OverYDestinoGet', 'val'],
        ['Ancho_DestinoGet', 'val'],
        ['Alto_DestinoGet', 'val'],

        ['OverXOrigen', 'val'],
        ['OverYOrigen', 'val'],
        ['Ancho_Origen', 'val'],
        ['Alto_Origen', 'val'],

        ['OverXDestino', 'val'],
        ['OverYDestino', 'val'],
        ['Ancho_Destino', 'val'],
        ['Alto_Destino', 'val'],

        ['textOverlaidCheck', 'cb'],

        /* FILTROS */
        ['actFiltros', 'cb'],
        ['grayScaleCheck', 'cb'],
        ['invertCheck', 'cb'],
        ['sepiaCheck', 'cb'],
        ['hue_rotateCheck', 'cb'],
        ['brightnessCheck', 'cb'],
        ['contrastCheck', 'cb'],
        ['saturateCheck', 'cb'],
        ['blurCheck', 'cb'],
        ['opacityCheck', 'cb'],

        ['grayscaleFil', 'val'],
        ['InvertFil', 'val'],
        ['sepiaFil', 'val'],
        ['hue_rotateFil', 'val'],
        ['brightnessFil', 'val'],
        ['contrastFil', 'val'],
        ['saturateFil', 'val'],
        ['blurFil', 'val'],
        ['opacityFil', 'val']
    ];

    let i;
    for (i = 0; i < cfgControl.length; i++) {
        if (cfgControl[i][1] == 'val') {
            cfgSave += $('#' + cfgControl[i][0]).val() + '|';
        } else if (cfgControl[i][1] == 'cb') {
            cfgSave += getCheckEstado(cfgControl[i][0]) + '|';
        }
    }
    // aquí la textura
    cfgSave += elinvTitBonitos.texturaOverlaid + '|';


    /* recuperamos los archivos creados para asesorar 
    al usuario y no crear copias iguales */
    var parametros = {
        "valorCaja1": "valorCaja1"
    };
    $.ajax({
        data: parametros,
        url: './php/restorePreset.php',
        type: 'post',
        beforeSend: function () {
            //$('#listArchivos').html("Procesando, espere por favor...");
        },
        success: function (response) {
            // todos los archivos del directorio
            let arr = new Array();
            arr = JSON.parse(response);
            let cuantos = arr.length;
            // filtramos a nuestra extensión
            var filesConfig = arr.filter(function (file) {
                return file.indexOf('.cfgElv') !== -1;
            });
            //console.log(filesColor);
            //asignamos información
            $(".modal-title").html('Presets configuraciones creadas!');
            $("#dialTitleCuestion").html("Reescriba o cree una nueva configuración?");
            // bucle por los archivos colectados.
            let botones = '';
            for (const files in filesConfig) {
                if (Object.hasOwnProperty.call(filesConfig, files)) {
                    if (filesConfig[files] != 'undefined') {
                        botones += '<button type="button" class="btn btn-primary savePresetConfig" style="margin-top: 10px; margin-left: 10px;">' + filesConfig[files] + '</button>';
                    }
                }
            }
            botones += '<button type="button" class="btn btn-success savePresetConfig" style="margin-top: 10px; margin-left: 10px;">Nueva configuración</button>';

            botones += '<input class="form-control text-primary" style="margin-top: 10px; width: 350px;" type="text" id="newNamePresetConfig" name="newNamePresetConfig" placeholder="nueva configuración.">';

            botones += '<input class="form-control text-primary" type="hidden" id="hiddenConfiguracion" name="hiddenConfiguracion" value="' + cfgSave + '">';


            // Enviamos al dialogo
            $("#dialInfo").html(botones);

            /* mostramos el cuadro de dialogo
            crear mensajes con todos los presets */
            showModal();
            //$("#myModal").modal('show');                
        },
        error: function (xhr, status, text) {
            var response = $.parseJSON(xhr.responseText);
            console.log('Failure!');
            if (response) {
                console.log(response.error);
            } else {
                // This would mean an invalid response from the server
            }
        }
    });
});

// despliega el modal dialog
function showModal(params) {
    $("#myModal").modal('show');
}

// Incluir porciones html externa
$(document).ready(function () {
    // ejecuta button creado dinamico para restaurar preset colores
    $(document).on("click", ".savePresetConfig", function () {
        // si se sobreescribe un archivo o se crea uno nuevo
        let nameFile = '';
        alert($(this).html());
        if ($(this).html() == 'Nueva configuración') {
            if ($('#newNamePresetConfig').val() == '') {
                alert('No ha ingresado nombre del nuevo archivo de configuración!');
                return;
            }
            nameFile = $('#newNamePresetConfig').val() + '.cfgElv';
        } else {
            nameFile = $(this).html();
        }
        let cfgNew = $('#hiddenConfiguracion').val();
        //alert(color);
        // grabar los cambios o en nuevo archivo
        $.ajax({
            type: "POST",
            url: './php/cfgSave.php',
            data: {
                colores: cfgNew,
                nameFile: nameFile
            },
            success: function (data) {
                mensaje = "Configuración guardada correctamente!.";
                alert(mensaje);
                return;
            },
            error: function (xhr, status, error) {
                mensaje = "Ha ocurrido un error: " + xhr;
                alert(mensaje);
                return;
            }
        });
    });
});

/* Obtener el estado de un checkbox */
function getCheckEstado(control) {
    let valor = false;
    if ($('#' + control).prop('checked')) {
        valor = true;
    } else {
        valor = false;
    }
    return valor;
}

/* Configuración general -> load */
$("#butLoadConfigGral").click(function () {

    var parametros = {
        "valorCaja1": "valorCaja1"
    };
    $.ajax({
        data: parametros,
        url: './php/restorePreset.php',
        type: 'post',
        beforeSend: function () {
            //$('#listArchivos').html("Procesando, espere por favor...");
        },
        success: function (response) {
            // todos los archivos del directorio
            let arr = new Array();
            arr = JSON.parse(response);
            let cuantos = arr.length;
            // filtramos a nuestra extensión
            var filesCfg = arr.filter(function (file) {
                return file.indexOf('.cfgElv') !== -1;
            });
            //console.log(filesCfg);
            //asignamos información
            $(".modal-title").html('Restaurar presets configuraciones');
            $("#dialTitleCuestion").html("Seleccione setting a restaurar?");
            // bucle por los archivos colectados.
            let botones = '';
            for (const files in filesCfg) {
                if (Object.hasOwnProperty.call(filesCfg, files)) {
                    if (filesCfg[files] != 'undefined') {
                        botones += '<button type="button" class="btn btn-primary restorePresetCfg" style="margin-left: 10px;">' + filesCfg[files] + '</button>';
                    }
                }
            }
            $("#dialInfo").html(botones);

            /* mostramos el cuadro de dialogo
            crear mensajes con todos los presets */
            showModal();
            //$("#myModal").modal('show');                
        },
        error: function (xhr, status, text) {
            var response = $.parseJSON(xhr.responseText);
            console.log('Failure!');
            if (response) {
                console.log(response.error);
            } else {
                // This would mean an invalid response from the server
            }
        }
    });
});

// ejecuta button creado dinamico para restaurar preset colores
$(document).on("click", ".restorePresetCfg", function () {
    var parametros = {
        nameFile: $(this).html()
    };
    $.ajax({
        data: parametros,
        url: './php/configRestore.php',
        type: 'post',
        beforeSend: function () {
            console.log("Procesando, espere por favor...");
        },
        success: function (response) {
            //let respuesta = JSON.parse(response);
            reasigCfg(response);
        },
        error: function (xhr, status, text) {
            var response = $.parseJSON(xhr.responseText);
            console.log('Failure!');
            if (response) {
                console.log(response.error);
            } else {
                // This would mean an invalid response from the server
            }
        }
    });
});

// Reasigna colores al panel de acuerdo al archivo cargado
function reasigCfg(configuracion) {
    /* Array de controles */
    let cfgControl = [
        /* COLOR */
        ['textColor', 'val'],
        ['shadowColor', 'val'],
        ['backgroundColor', 'val'],
        /* ['actBGTexture', 'cb'], */
        ['backgroundColor', 'val'],
        /* SOMBRAS */
        ['sombrasX', 'val'],
        ['sombrasY', 'val'],
        ['sombrasBlur', 'val'],
        /* EFECTOS */
        ['sizeFont', 'val'],
        ['separLineas', 'val'],

        ['3dEfect1', 'cb'],
        ['3dEfect2', 'cb'],
        ['3dEfect3', 'cb'],

        ['efect1', 'cb'],
        ['efect2', 'cb'],
        ['efect3', 'cb'],

        ['lienzoAncho', 'val'],
        ['lienzoAlto', 'val'],
        ['strokText', 'cb'],
        ['textBordeColor', 'val'],
        ['anchoBordeText', 'val'],
        ['checkStrokTextGradient', 'cb'],

        ['BordeX0GradientIni', 'val'],
        ['BordeY0GradientIni', 'val'],
        ['BordeX1GradientIni', 'val'],
        ['BordeY1GradientIni', 'val'],

        ['textBordeGradient1', 'val'],
        ['textBordeGradient2', 'val'],
        ['textBordeGradient3', 'val'],

        /* GRADIENT */
        ['gradientInicial', 'val'],
        ['gradientMedio', 'val'],
        ['gradientFinal', 'val'],
        ['textGradient1', 'cb'],
        ['textGradHorVert', 'cb'],

        ['textTranslateGradient', 'val'],
        ['gradientInicialFondo', 'val'],
        ['gradientMedioFondo', 'val'],
        ['gradientFinalFondo', 'val'],

        ['fondoGradient1', 'cb'],
        ['fondoGradHorVert', 'cb'],
        ['textBordefondoTranslateGradientColor', 'val'],

        /* TEXTURAS */
        /* Hay que ver como la guardamos */
        /* Que textura se ha hecho click */

        /* OVERLAID */
        ['OverXOrigenGet', 'val'],
        ['OverYOrigenGet', 'val'],
        ['Ancho_OrigenGet', 'val'],
        ['Alto_OrigenGet', 'val'],

        ['OverXDestinoGet', 'val'],
        ['OverYDestinoGet', 'val'],
        ['Ancho_DestinoGet', 'val'],
        ['Alto_DestinoGet', 'val'],

        ['OverXOrigen', 'val'],
        ['OverYOrigen', 'val'],
        ['Ancho_Origen', 'val'],
        ['Alto_Origen', 'val'],

        ['OverXDestino', 'val'],
        ['OverYDestino', 'val'],
        ['Ancho_Destino', 'val'],
        ['Alto_Destino', 'val'],

        ['textOverlaidCheck', 'cb'],

        /* FILTROS */
        ['actFiltros', 'cb'],
        ['grayScaleCheck', 'cb'],
        ['invertCheck', 'cb'],
        ['sepiaCheck', 'cb'],
        ['hue_rotateCheck', 'cb'],
        ['brightnessCheck', 'cb'],
        ['contrastCheck', 'cb'],
        ['saturateCheck', 'cb'],
        ['blurCheck', 'cb'],
        ['opacityCheck', 'cb'],

        ['grayscaleFil', 'val'],
        ['InvertFil', 'val'],
        ['sepiaFil', 'val'],
        ['hue_rotateFil', 'val'],
        ['brightnessFil', 'val'],
        ['contrastFil', 'val'],
        ['saturateFil', 'val'],
        ['blurFil', 'val'],
        ['opacityFil', 'val']
    ];
    const arrCfg = configuracion.split("|");
    arrCfg.splice(-1,1);
    // recuperamos la textura
    elinvTitBonitos.texturaOverlaid = arrCfg[arrCfg.length-1];
    arrCfg.splice(-1,1);
    arrCfg.splice(-1,1);
    let cont = 0;
    // recorremos todos los elementos
    arrCfg.forEach(element => {
        if (cont == 0) {
            document.getElementById("fonts").selectedIndex = element;
        } else {
            //console.log(cont + '  ' +element + '  ' + cfgControl[cont-1][0] + '  ' + element);
            if (cfgControl[cont-1][1] == 'val') {
                $('#' + cfgControl[cont-1][0]).val(element);
            } else if (cfgControl[cont-1][1] == 'cb') {
                //alert(element);
                if (element === "true") {
                    $('#' + cfgControl[cont-1][0]).prop('checked', true);
                } else {
                    $('#' + cfgControl[cont-1][0]).prop('checked', false);
                }
            }

        }
        cont++;
    });

    //alert(configuracion);
    elinvTitBonitos.resizeCanvas();
    elinvTitBonitos.setEntorno();

}

