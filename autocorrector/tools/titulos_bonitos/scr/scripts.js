/* AGREGAR GRABAR Y RECUPERAR MODELOS

AGREGAR FILTROS. BRILLO CONTRASTE ETC... */


/*Al cargarse el programa*/
window.onload = function () {
    elinvTitBonitos.addFonts();
    elinvTitBonitos.setEntorno();
    // evento en input file TEXTURE
    var input = document.getElementById('textTexture');
    input.addEventListener('change', elinvTitBonitos.handleFilesTextures);
    // evento en input file FONT
    var input = document.getElementById('loadLocalFont');
    input.addEventListener('change', elinvTitBonitos.handleFilesFonts);
}

var elinvTitBonitos = {
    // Variables generales
    // contexto canva
    cvs: document.querySelector('canvas'),
    canvasTextSinEfectos: '',
    // texturas
    texturaOverlaid: '',
    // copia contexto canvas
    ctxCopy: '',
    imgGetFile: '',
    imgTextureLocal: '',
    fontLoad: false,
    fontFile: '',

    /* Genera textura desde el input file */
    handleFilesFonts: function (e) {
        elinvTitBonitos.fontLoad = true;
        elinvTitBonitos.fontFile = e.target.files[0];
        elinvTitBonitos.setEntorno();
    },


    /* Genera textura desde el input file */
    handleFilesTextures: function (e) {
        var img = new Image;
        img.src = URL.createObjectURL(e.target.files[0]);
        //Reset input file para colver a cargar.
        $("#textTexture").val('');
        //cargamos la imagen
        img.onload = function () {
            elinvTitBonitos.printTextGetFiles(img);
        }
    },

    // función convierte en var global a nivel formulario
    contextVarGlobal: function (ctx) {
        this.ctxCopy = ctx;
    },

    /* Imprimir en canvas la img leida del input file */
    printTextGetFiles: function (img) {
        this.overlaidText(img, this.ctxCopy);
        this.imgGetFile = img;
    },

    /* Corregir parametros deslizar imagen get files */
    corregirTextGetFiles: function (getFiles) {
        this.overlaidText(this.imgGetFile, this.ctxCopy, getFiles);
    },

    /* función para redimensionar el canvas por el usuario */
    resizeCanvas: function () {
        // recalcula el tamaño del canvas
        this.cvs.width = parseInt($("#lienzoAncho").val());
        this.cvs.height = parseInt($("#lienzoAlto").val());
        // mostrando ancho y alto           
        $("#labelAnchoAlto").text(' [' + this.cvs.width + ' x ' + this.cvs.height + ']');
        // demuestrear el trabajo
        this.setEntorno();
    },

    /* función para agregar listado de font al select */
    addFonts: function () {
        /* Cargamos listado de fuentes */
        var select = document.getElementById("fonts");
        let nombre = "";
        for (index in fuentes) {
            nombre = fuentes[index].split('/')[2].split('.')[0];
            //if (nombre.length > 8) { nombre = nombre.substring(0, 16); }
            select.options[select.options.length] = new Option(nombre, fuentes[index]);
        }
        // Seleccionamos estilo letra amazonas
        $('#fonts option').eq(8).prop('selected', true);
        /* Total fuentes cargadas */
        $('#fontLoads').text(' ( Fuentes cargadas: ' + fuentes.length + ' )');
    },

    // establecer el entorno del título a crear
    setEntorno: function (tipo, capas) {

        /* anula el boton derecho en el canvas
        menu contextual */
        //$('body').on('contextmenu', '#myCanvas', function(e){ return false; });

        // si los valores son nulos
        if (tipo === null || tipo === "") {
            //hacemos lo que se requiera en caso de que la variable contenga null   
        }

        // si la fuente fue cargada en forma local
        var myFont = '';
        if (this.fontLoad == true) {
            let fontLocal = URL.createObjectURL(this.fontFile);
            myFont = new FontFace('localfont', 'url(' + fontLocal + ')');
        } else {
            // o desde la base de font de este programa
            myFont = new FontFace($('#fonts option:selected').text(), 'url(' + $('#fonts option:selected').val() + ')');
        }

        myFont.load().then(font => {
            document.fonts.add(font)
        }).then(() => {
            // texto ingresado por formulario
            let texto1 = $('#textLinea1').val();
            let texto2 = $('#textLinea2').val();
            let texto3 = $('#textLinea3').val();
            let texto4 = $('#textLinea4').val();
            let texto5 = $('#textLinea5').val();
            let texto6 = $('#textLinea6').val();
            // contexto canvas
            let ctx = this.cvs.getContext('2d');

            /* font que utilizaremos.
            si fue cargada en forma local */
            if (this.fontLoad == true) {
                ctx.font = $('#sizeFont').val() + 'px ' + 'localfont';
                this.fontLoad = false;
                /* o desde el programa */
            } else {
                ctx.font = $('#sizeFont').val() + 'px ' + $('#fonts option:selected').text();
            }

            //Control del fondo
            this.fondo(ctx, this.cvs);

            // align text horizontally center
            ctx.textAlign = "center";
            // align text vertically center
            ctx.textBaseline = "middle";
            //ctx.fillText(texto, 50, 150)
            let separacion = $('#separLineas').val();

            // Sombras
            let sombrasX = $('#sombrasX').val();
            let sombrasY = $('#sombrasY').val();
            // redefinimos el fondo
            this.fondo(ctx, this.cvs);

            let topPrimerLinea = 150;

            // ahora el texto
            if (texto1) {tipo
                this.draw3dText(ctx, texto1, this.cvs.width / 2, topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
            if (texto2) {
                this.draw3dText(ctx, texto2, this.cvs.width / 2, separacion * 1 + topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
            if (texto3) {
                this.draw3dText(ctx, texto3, this.cvs.width / 2, separacion * 2 + topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
            if (texto4) {
                this.draw3dText(ctx, texto4, this.cvs.width / 2, separacion * 3 + topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
            if (texto5) {
                this.draw3dText(ctx, texto5, this.cvs.width / 2, separacion * 4 + topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
            if (texto6) {
                this.draw3dText(ctx, texto6, this.cvs.width / 2, separacion * 5 + topPrimerLinea, sombrasX, sombrasY, tipo, capas);
            }
        })
    },

    //Control del fondo
    fondo: function (context, cvs) {
        /* Fondo Gradiente */

        if (fondoGradient1.checked) {
            var colorGradient;
            if (fondoGradHorVert.checked) {
                colorGradient = context.createLinearGradient(0, 0, 0, fondoTranslateGradient.value, 0);
            } else {
                colorGradient = context.createLinearGradient(0, 0, fondoTranslateGradient.value, 0);
            }
            colorGradient.addColorStop("0.0", $('#gradientInicialFondo').val());
            colorGradient.addColorStop("0.5", $('#gradientMedioFondo').val());
            colorGradient.addColorStop("1.0", $('#gradientFinalFondo').val());
            //pintamos el fondo de color azul
            context.fillStyle = colorGradient;
            context.fillRect(0, 0, this.cvs.width, this.cvs.height);

        } else if (actBGTexture.checked) {

            /* Verifica si las variables no son nulas.
            Si se ha cargado una textura desde el programa */
            if (this.imgTextureLocal) {

                var ptrn = context.createPattern(this.imgTextureLocal, 'repeat');
                context.fillStyle = ptrn;
                context.fillRect(0, 0, this.cvs.width, this.cvs.height);

                // O se ha leido por el usuario
            } else if (this.imgGetFile) {

                var ptrn = context.createPattern(this.imgGetFile, 'repeat');
                context.fillStyle = ptrn;
                context.fillRect(0, 0, this.cvs.width, this.cvs.height);

                //Sino se lo ayuda a gestionar la carga de una textura
            } else {
                alert('Debe seleccionar una imagen de fondo!')
            }

        } else {
            //Control del fondo
            let backColor = $('#backgroundColor').val();
            var opacity = document.getElementById('alpha').value;
            // console.log(opacity);
            if (opacity == 1){
                if (backColor == '#ffffff') {
                    //Fondo transparente
                    context.clearRect(0, 0, this.cvs.width, this.cvs.height);
                } else {
                    //pintamos el fondo de color azul
                    context.fillStyle = backColor;
                    context.fillRect(0, 0, this.cvs.width, this.cvs.height);
                }
            }else{
                //pintamos el fondo de color azul
                context.fillStyle = backColor;
                context.globalAlpha = opacity;
                context.fillRect(0, 0, this.cvs.width, this.cvs.height);
                context.globalAlpha = 1.0;                
            }
        }
    },

    /* Función para dibujar el texto */
    draw3dText: function (context, text, x, y, sombrasX, sombrasY, tipo, capas) {
        // efecto 3D
        if (efect1.checked || efect2.checked || efect3.checked) {
            this.efectos3D(context, tipo, capas, text, x, y);
        }

        // presetear las sombras
        context = this.sombras(context);

        /* pasamos el contexto a variable global 
        a nivel del objeto. */
        this.contextVarGlobal(context);

        // Create a linear gradient
        // The start gradient point is at x=20, y=0
        // The end gradient point is at x=220, y=0
        var gradient = context.createLinearGradient($('#BordeX0GradientIni').val(), $('#BordeY0GradientIni').val(), $('#BordeX1GradientIni').val(), $('#BordeY1GradientIni').val());

        // función stroke                
        if (strokText.checked) {

            if (checkStrokTextGradient.checked) {
                // Add three color stops
                gradient.addColorStop(0, $('#textBordeGradient1').val());
                gradient.addColorStop(.5, $('#textBordeGradient2').val());
                gradient.addColorStop(1, $('#textBordeGradient3').val());

                // Fill with gradient
                context.strokeStyle = gradient;
            } else {
                context.strokeStyle = $('#textBordeColor').val();
            }

            context.lineWidth = $('#anchoBordeText').val();
            context.miterLimit = 2;
            context.strokeText(text, x, y);
        }

        // Zona de filtros
        if (actFiltros.checked) {

            var filtros = [["hue_rotateCheck", "'hue-rotate(' + $(\"#hue_rotateFil\").val() + 'deg)'"],
            ["grayScaleCheck", "'grayscale(' + $(\"#grayscaleFil\").val() + '%)'"],
            ["invertCheck", "'invert(' + $(\"#InvertFil\").val() + '%)'"],
            ["sepiaCheck", "'sepia(' + $(\"#sepiaFil\").val() + '%)'"],
            ["brightnessCheck", "'brightness(' + $(\"#brightnessFil\").val() + '%)'"],
            ["contrastCheck", "'contrast(' + $(\"#contrastFil\").val() + '%)'"],
            ["saturateCheck", "'saturate(' + $(\"#saturateFil\").val() + '%)'"],
            ["blurCheck", "'blur(' + $(\"#blurFil\").val() + 'px)'"],
            ["opacityCheck", "'opacity(' + $(\"#opacityFil\").val() + '%)'"]];

            let i, filtrosAplicar = '', mult = 0;
            for (i = 0; i < filtros.length; i++) {
                if (eval(filtros[i][0] + '.checked')) {
                    filtrosAplicar += eval(filtros[i][1] + ' ');
                    mult += 1;
                }
            }

            if (mult == 0) {
                context.filter = 'none';
            } else {
                context.filter = filtrosAplicar;
            }

        } else {
            context.filter = 'none';
        }

        //context.fillText(text, x - n, y - n);
        context.fillText(text, x, y);
        // efecto 3D
        //this.efectos3D(context, tipo, capas, text, x, y);

        // efecto 3D
        if (!efect1.checked && !efect2.checked && !efect3.checked) {
            this.efectos3D(context, tipo, capas, text, x, y, false);
        }

        // efecto text overlaid
        if (textOverlaidCheck.checked) {
            context.fillText(text, x, y);
            let img = document.createElement("img");
            img.src = this.texturaOverlaid;
            img.onload = function () {
                elinvTitBonitos.overlaidText(img, context);
                return;
            }

            return;
        }
    },

    /* función para obtener las sombras */
    sombras: function (context) {
        /* Color Gradiente */
        var color;
        if (textGradient1.checked) {
            if (textGradHorVert.checked) {
                color = context.createLinearGradient(0, 0, 0, textTranslateGradient.value);
            } else {
                color = context.createLinearGradient(0, 0, textTranslateGradient.value, 0);
            }
            color.addColorStop("0.0", $('#gradientInicial').val());
            color.addColorStop("0.5", $('#gradientMedio').val());
            color.addColorStop("1.0", $('#gradientFinal').val());
        } else {
            /* Solo un color  */
            color = $('#textColor').val();
        }
        // guardamos el estado por defecto
        //context.save();
        // Restaurar el estado por defecto
        //context.restore();

        // draw top layer with shadow casting over
        // bottom layers            

        context.fillStyle = color;
        context.shadowColor = $('#shadowColor').val();
        context.shadowBlur = $('#sombrasBlur').val();
        context.shadowOffsetX = $('#sombrasX').val();
        context.shadowOffsetY = $('#sombrasY').val();
        return context;
    },

    // creación efectos 3D
    efectos3D: function (context, tipo, capas, text, x, y, uncheck) {
        var n;
        if (!uncheck) {
            for (n = 0; n < capas; n++) {
                context.fillText(text, x, y);
            }
        }
        // draw bottom layers
        if (tipo = 1 && efect1.checked) {
            for (n = 0; n < capas; n++) {
                context.fillText(text, x + capas, y);
            }
        }
        if (tipo = 2 && efect2.checked) {
            for (n = 0; n < capas; n++) {
                context.fillText(text, x, y + capas);
            }
        }
    },

    // creación efectos overlaidText
    overlaidText: function (img, context, getFile) {

        // backup -> imagen general y backup arriba
        var backCanvas = document.createElement('canvas');
        backCanvas.width = this.cvs.width;
        backCanvas.height = this.cvs.height;
        var backCtx = backCanvas.getContext('2d');

        // texto ingresado por formulario
        let texto1 = $('#textLinea1').val();
        let texto2 = $('#textLinea2').val();
        let texto3 = $('#textLinea3').val();
        let texto4 = $('#textLinea4').val();
        let texto5 = $('#textLinea5').val();
        let texto6 = $('#textLinea6').val();

        // font que utilizaremos.
        backCtx.font = $('#sizeFont').val() + 'px ' + $('#fonts option:selected').text()

        // align text horizontally center
        backCtx.textAlign = "center";
        // align text vertically center
        backCtx.textBaseline = "middle";
        let separacion = $('#separLineas').val();

        let topPrimerLinea = 150;

        backCtx.fillText(texto1, this.cvs.width / 2, topPrimerLinea);
        backCtx.fillText(texto2, this.cvs.width / 2, separacion * 1 + topPrimerLinea);
        backCtx.fillText(texto3, this.cvs.width / 2, separacion * 2 + topPrimerLinea);
        backCtx.fillText(texto4, this.cvs.width / 2, separacion * 3 + topPrimerLinea);
        backCtx.fillText(texto5, this.cvs.width / 2, separacion * 4 + topPrimerLinea);
        backCtx.fillText(texto6, this.cvs.width / 2, separacion * 5 + topPrimerLinea);

        // use compositing to draw the background image
        // only where the text has been drawn
        backCtx.beginPath();
        // source-atop source-in source-over source-out 
        // destination-atop destination-in destination-over     destination-out
        // lighter copy xor
        backCtx.globalCompositeOperation = "source-in";

        if (getFile == 'getfile') {
            /* textura en texto en canvas secundario*/
            backCtx.drawImage(img, $('#OverXOrigenGet').val(), $('#OverYOrigenGet').val(), $('#Ancho_OrigenGet').val(), $('#Alto_OrigenGet').val(), $('#OverXDestinoGet').val(), $('#OverYDestinoGet').val(), $('#Ancho_DestinoGet').val(), $('#Alto_DestinoGet').val());
        } else {
            /* textura en texto en canvas secundario*/
            backCtx.drawImage(img, $('#OverXOrigen').val(), $('#OverYOrigen').val(), $('#Ancho_Origen').val(), $('#Alto_Origen').val(), $('#OverXDestino').val(), $('#OverYDestino').val(), $('#Ancho_Destino').val(), $('#Alto_Destino').val());
        }

        // Imagen texture local a variable global a nivel del objeto.
        this.imgTextureLocal = img;

        //Sobre imprimimos la textura.
        context.drawImage(backCanvas, 0, 0);
    }
}

// funcionalidad herramientas tabs
$(function () {

    /* Controlador del tab menu */
    $("#tabs-nav a").click(function (event) {
        event.preventDefault();
        $("#tabs-nav a").removeClass("tabs-menu-active");
        $(this).addClass("tabs-menu-active");
        $(".tabs-panel").removeClass("animated-tabs bounceIn").hide();
        var tab_id = $(this).data("target");
        $("#" + tab_id).addClass("animated-tabs bounceIn").show();
    });

});

// Incluir porciones html externa
$(document).ready(function () {
    $("div[data-includeHTML]").each(function () {
        $(this).load($(this).attr("data-includeHTML"));
    });

    /* Boton para asignar color prefijado y actualizar canvas */
    $("#butAsignColorPref").click(function () {

        // controlar check radios colores prefijados
        const rBPrefColor = document.querySelectorAll('input[name="prefijColor"]');
        var selPrefColor;
        for (const radioButton of rBPrefColor) {
            if (radioButton.checked) {
                selPrefColor = radioButton.value;
                break;
            }
        }
        if (selPrefColor) {
            //alert(`Ha seleccionado ${selPrefColor}`);
        } else {
            alert(`Aun no ha seleccionado ninguna color prefijado.`);
            return;
        }

        // controlar check radios para destino de colores
        const rBAsignColor = document.querySelectorAll('input[name="prefijColorAsign"]');
        var asigPrefColor;
        for (const radioButton of rBAsignColor) {
            if (radioButton.checked) {
                asigPrefColor = radioButton.value;
                break;
            }
        }
        if (asigPrefColor) {
            //alert(`Ha seleccionado ${asigPrefColor}`);
        } else {
            alert(`Aun no ha seleccionado destino del color prefijado.`);
            return;
        }
        /* asignamos color al input color superior
        y refrescamos el canvas */
        let color;
        switch (asigPrefColor) {
            case 'asignTextColor':
                color = document.getElementById(selPrefColor).value;
                document.getElementById("textColor").value = color;
                break;
            case 'asignShadowColor':
                color = document.getElementById(selPrefColor).value;
                document.getElementById("shadowColor").value = color;
                break;
            case 'asignBgColor':
                color = document.getElementById(selPrefColor).value;
                document.getElementById("backgroundColor").value = color;
                break;
            default:
                break;
        }
        elinvTitBonitos.setEntorno();
    });

    /* Salvamos setting colores prefijados. */
    $("#butSaveColorPref").click(function () {
        // recogemos los colores configurados por el usuario.
        let index, color = '';
        for (index = 1; index <= 8; index++) {
            color += document.getElementById('colorPrefijado' + index).value + '|';
        }
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
                var filesColor = arr.filter(function (file) {
                    return file.indexOf('.color') !== -1;
                });
                //console.log(filesColor);
                //asignamos información
                $(".modal-title").html('Presets colores creados!');
                $("#dialTitleCuestion").html("Reescriba o cree un nuevo setting?");
                // bucle por los archivos colectados.
                let botones = '';
                for (const files in filesColor) {
                    if (Object.hasOwnProperty.call(filesColor, files)) {
                        if (filesColor[files] != 'undefined') {
                            botones += '<button type="button" class="btn btn-primary savePresetColor" style="margin-top: 10px; margin-left: 10px;">' + filesColor[files] + '</button>';
                        }
                    }
                }
                botones += '<button type="button" class="btn btn-success savePresetColor" style="margin-top: 10px; margin-left: 10px;">Nuevo preset de color</button>';

                botones += '<input class="form-control text-primary" style="margin-top: 10px; width: 350px;" type="text" id="newNamePresetColor" name="newNamePresetColor" placeholder="nuevo preset colores preconfigurados.">';

                botones += '<input class="form-control text-primary" type="hidden" id="hiddenColores" name="hiddenColores" value="' + color + '">';


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


    /* Restaurar setting colores prefijados. */
    $("#butRestoreColorPref").click(function () {
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
                var filesColor = arr.filter(function (file) {
                    return file.indexOf('.color') !== -1;
                });
                //console.log(filesColor);
                //asignamos información
                $(".modal-title").html('Restaurar presets colores preconfigurados');
                $("#dialTitleCuestion").html("Seleccione setting a restaurar?");
                // bucle por los archivos colectados.
                let botones = '';
                for (const files in filesColor) {
                    if (Object.hasOwnProperty.call(filesColor, files)) {
                        if (filesColor[files] != 'undefined') {
                            botones += '<button type="button" class="btn btn-primary restorePresetColor" style="margin-left: 10px;">' + filesColor[files] + '</button>';
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

    // despliega el modal dialog
    function showModal(params) {
        $("#myModal").modal('show');
    }

    // ejecuta button creado dinamico para restaurar preset colores
    $(document).on("click", ".restorePresetColor", function () {
        var parametros = {
            nameFile: $(this).html()
        };
        $.ajax({
            data: parametros,
            url: './php/colorCFGRestore.php',
            type: 'post',
            beforeSend: function () {
                console.log("Procesando, espere por favor...");
            },
            success: function (response) {
                //let respuesta = JSON.parse(response);
                reasigColorFileLoad(response);
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
    function reasigColorFileLoad(coloresLeidos) {
        const arrColores = coloresLeidos.split("|");
        let cont = 1;
        arrColores.forEach(element => {
            if (cont > 8) return;
            document.getElementById('colorPrefijado' + cont).value = element;
            cont++;
        });
    }

    // ejecuta button creado dinamico para restaurar preset colores
    $(document).on("click", ".savePresetColor", function () {
        // si se sobreescribe un archivo o se crea uno nuevo
        let nameFile = '';
        if ($(this).html() == 'Nuevo preset de color') {
            if ($('#newNamePresetColor').val() == '') {
                alert('No ha ingresado nombre del nuevo archivo de configuración!');
                return;
            }
            nameFile = $('#newNamePresetColor').val();
        } else {
            nameFile = $(this).html();
        }
        let color = $('#hiddenColores').val();
        //alert(color);
        // grabar los cambios o en nuevo archivo
        $.ajax({
            type: "POST",
            url: './php/colorCFGSave.php',
            data: {
                colores: color,
                nameFile: nameFile
            },
            success: function (data) {
                mensaje = "Configuración de colores guardada correctamente!.";
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

    // button save canvas image
    download.addEventListener('click', function (e) {
        // creamos el download de la imagen
        const link = document.createElement('a');
        //name file aleatorio
        let newDate = new Date();
        let name =  
        newDate.getFullYear() + '_' +
        parseInt(newDate.getMonth()+1) + '_' +
        newDate.getDate() + '_' +
        newDate.getTime();
        // descargamos.
        link.download = `${name}.png`;
        link.href = elinvTitBonitos.cvs.toDataURL();
        link.click();
        link.delete;
    });

    // button reset textbox form
    reset.addEventListener('click', function (e) {
        // creamos el download de la imagen
        let index = 0;
        for (index = 0; index <= 6; index++) {
            $('#textLinea'+index).val('');
        }
    }); 

});



