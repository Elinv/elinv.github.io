// Variable global elemento zindex
var zindexElemId = '';
// Variable global textarea
var textAreaId = '';
// Variable global img
var imgPos = '';
// Variable global Button
var butPosId = '';

/**------------------------------------------------------------ 
 * FUNCION PARA ABRIR DIALOGO MODAL PARA LA CREACIÓN DE BOTONES
    TIPOS BUTTON, RESET, SUBMIT */
$('#crearButtonResetSubmitModal').on('show.bs.modal', function (event) {
    let textoBotonVar = $(event.relatedTarget).data('textoalboton');
    $("#textoBoton").val(textoBotonVar);

    let nameBotonVar = $(event.relatedTarget).data('namealboton');
    $("#nameBoton").val(nameBotonVar);

    let titleBotonVar = $(event.relatedTarget).data('titlealboton');
    $("#titleBoton").val(titleBotonVar);

    let idBotonVar = $(event.relatedTarget).data('idalboton');
    $("#idBoton").val(idBotonVar);
    $("#idContenedorBotonHidden").val(idBotonVar);

    $("#idCrearBotones").show();
    $("#idEditarBotones").hide();
    $("#idEliminarBotones").hide();
})
/** FUNCION PARA LA CREACIÓN DE BOTONES
    TIPOS BUTTON, RESET, SUBMIT */
function crearButton(...params) {
    // html que insertaremos
    let id = randId();
    let frag = `<div id="${id}" style="margin: auto;"><button type="${$('#SelectButtonType option:selected').val()}" id="${$("#idBoton").val()}" name="${$("#nameBoton").val()}" title="${$("#titleBoton").val()}" class="btn ${$('#SelectButtonStyle option:selected').val()}">${$("#textoBoton").val()}</button></div>`.toDOM();

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // establecemos el max-width del div contenedor del botón
    // obtenemos el div contenedor
    let divElement = document.getElementById(id);
    // el boton
    let boton = document.getElementById(id).children;
    // cambiamos el ancho del div igualándono al del boton
    divElement.style.width = boton[0].offsetWidth + 'px';

    /** lo hacemos arrastrable con jquery solamente
     * no funciona en plataformas móviles */
    //$( "#"+id ).draggable();
    /** Lo hacemos arrastrable con jquery y draganddrop.js
     * funciona en plataformas móviles */
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        asigValoresDialogModalButton(id);
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            asigValoresDialogModalButton(id);
        }
        e.preventDefault()
    });
}
// recoger valores del control y asignarlo al dialogo
function asigValoresDialogModalButton(idElem) {
    // obtenemos valor del elemento        
    let elemen = document.getElementById(idElem).children;
    //mostramos el dialogo
    $("#crearButtonResetSubmitModal").modal("show");
    //le asignamos los datos
    $("#textoBoton").val(elemen[0].textContent)
    $("#nameBoton").val(elemen[0].name)
    $("#titleBoton").val(elemen[0].title)
    $("#idBoton").val(elemen[0].id)
    // id del div contenedor
    $("#idContenedorBotonHidden").val(idElem);
    // ocultamos el botón crear del dialogo modal
    $("#idCrearBotones").hide();
    $("#idEditarBotones").show();
    $("#idEliminarBotones").show();
}
// FUNCION PARA EDITAR ELEMENTOS BUTTON
function editarButton() {
    let idVarOld = $("#idContenedorBotonHidden").val();
    //let idVarNew = $("#idBoton").val()
    let elemen = document.getElementById(idVarOld).children;
    elemen[0].id = $("#idBoton").val();
    elemen[0].name = $("#nameBoton").val();
    elemen[0].title = $("#titleBoton").val();
    elemen[0].textContent = $("#textoBoton").val();
    // cambiando estilos
    $("#" + elemen[0].id).removeClass();
    $("#" + elemen[0].id).addClass("btn " + $('#SelectButtonStyle option:selected').val());
    // tipo del botón
    elemen[0].type = $('#SelectButtonType option:selected').val();
}
// FUNCION PARA ELIMINAR EL BOTON
function eliminarButton(){
    // assign the current id to the modal
    let id = $("#idContenedorBotonHidden").val();
    $('#confirDelete').data('id', id).modal('show');
}
/**------------------------------------------------------------ */


/**------------------------------------------------------------ 
 * FUNCION PARA ABRIR DIALOGO MODAL PARA LA CREACIÓN DE FIELDSET-LEGEND */
$('#crearFieldsetLegendModal').on('show.bs.modal', function (event) {
    let textoFLegend = $(event.relatedTarget).data('textoalfieldsetlegend')
    $("#textoFieldsetLegend").val(textoFLegend)

    let nameFLegend = $(event.relatedTarget).data('namealfieldsetlegend')
    $("#nameFieldsetLegend").val(nameFLegend)

    let titleFLegend = $(event.relatedTarget).data('titlealfieldsetlegend')
    $("#titleFieldsetLegend").val(titleFLegend)

    let idFLegend = $(event.relatedTarget).data('idalfieldsetlegend')
    $("#idFieldsetLegend").val(idFLegend)

    let idWidthFLegend = $(event.relatedTarget).data('idwidthfl')
    $("#idWidthFL").val(idWidthFLegend)

    let idHeightFLegend = $(event.relatedTarget).data('idheightfl')
    $("#idHeightFL").val(idHeightFLegend)

    $("#idCrearFieldset").show();
    $("#idEditarFieldset").hide();
    $("#idEliminarFieldset").hide();
})
// FUNCION DE CREACIÓN DE FIELDSET
function crearFieldset() {
    // html que insertaremos
    let id = randId();
    let frag = `<div id="${id}" style="margin: auto;">
                    <fieldset class="border p-2" 
                        style="border-radius: 4px; width: ${$("#idWidthFL").val()}px; height: ${$("#idHeightFL").val()}px">
                        <legend class="w-auto"
                            title="${$("#titleFieldsetLegend").val()}" 
                            id="${$("#idFieldsetLegend").val()}" 
                            name="${$("#nameFieldsetLegend").val()}">
                            ${$("#textoFieldsetLegend").val()}
                        </legend>
                    </fieldset>
                </div>`.toDOM();

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // establecemos el max-width del div contenedor del fieldset
    // obtenemos el div contenedor
    let divElement = document.getElementById(id);
    // el boton
    let fieldsetLegend = document.getElementById(id).children;
    // cambiamos el ancho del div igualándono al del boton
    divElement.style.width = fieldsetLegend[0].offsetWidth + 'px';

    /** lo hacemos arrastrable con jquery solamente
     * no funciona en plataformas móviles */
    //$( "#"+id ).draggable();
    /** Lo hacemos arrastrable con jquery y draganddrop.js
     * funciona en plataformas móviles */
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        asigValoresDialogModalFieldset(id);
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            asigValoresDialogModalFieldset(id);
        }
        e.preventDefault()
    });
}
// recogemos datos del control y lo asignamos al dialogo editor
function asigValoresDialogModalFieldset(idElem) {
    // Ancho y alto del Fieldset        
    let elemen = document.getElementById(idElem).children;
    $("#crearFieldsetLegendModal").modal("show");
    // Texto del element Legend
    $("#textoFieldsetLegend").val(elemen[0].textContent.trim());
    //---------------
    let legend = elemen[0].children;
    // Name
    $("#nameFieldsetLegend").val(legend[0].getAttribute('name'));
    // Title
    $("#titleFieldsetLegend").val(legend[0].title);
    // id
    $("#idFieldsetLegend").val(legend[0].id);
    //--------------
    // id del div contenedor
    $("#idContenedorFieldsetLegendHidden").val(idElem);
    // Ancho del Fieldset
    let ancho = elemen[0].style.width.slice(0, -2);
    $("#idWidthFL").val(ancho);
    // Alto del Fieldset
    let alto = elemen[0].style.height.slice(0, -2);
    $("#idHeightFL").val(alto);

    // ocultamos el botón crear del dialogo modal
    $("#idCrearFieldset").hide();
    $("#idEditarFieldset").show();
    $("#idEliminarFieldset").show();
}
// Editar el control fieldset con los nuevos valores
function editarFieldset() {
    let idVarOld = $("#idContenedorFieldsetLegendHidden").val();
    let elemen = document.getElementById(idVarOld).children;
    let legend = elemen[0].children;
    // reasignamos valores
    legend[0].id = $("#idFieldsetLegend").val();
    legend[0].title = $("#titleFieldsetLegend").val();
    legend[0].textContent = $("#textoFieldsetLegend").val();
    legend[0].setAttribute('name', $("#nameFieldsetLegend").val());
    // dimensiones
    elemen[0].style.width = $("#idWidthFL").val() + "px";
    elemen[0].style.height = $("#idHeightFL").val() + "px";
}
// FUNCION PARA ELIMINAR EL BOTON
function eliminarFieldset(){
    // assign the current id to the modal
    let id = $("#idContenedorFieldsetLegendHidden").val();
    $('#confirDelete').data('id', id).modal('show');
}
/**------------------------------------------------------------ */




/**------------------------------------------------------------ 
 * FUNCION PARA ABRIR DIALOGO MODAL PARA LA CREACIÓN DE UN TEXTAREA */

/* FUNCION PARA ABRIR DIALOGO MODAL PARA LA CREACIÓN DE LABEL */
$('#crearTextareaModal').on('show.bs.modal', function (event) {
    // recogemos los datos que nos envía el link y los enviamos al dialogo
    $("#idTextarea").val($(event.relatedTarget).data('idaltextarea'))
    $("#nameTextarea").val($(event.relatedTarget).data('namealtextarea'))
    $("#placeholderTextarea").val($(event.relatedTarget).data('placeholderaltextarea'))
    $("#rowTextarea").val($(event.relatedTarget).data('rowaltextarea'))
    $("#colsTextarea").val($(event.relatedTarget).data('colsaltextarea'))
    // mostramos y escondemos el boton que interesa en estos momentos
    $("#idCrearTextarea").show();
    $("#idEditarTextarea").hide();
    $("#deshabilitarDraggable").hide();
    $("#habilitarDraggable").hide();
    $("#idEliminarTextarea").hide();
})
// FUNCIÓN DE CREACIÓN DE TEXTAREA
function funcCrearTextarea(params) {
    // html que insertaremos
    let id = randId();
    let frag = `<div id="${id}" style="margin: auto;"><textarea class="form-control" id="${$("#idTextarea").val()}" name="${$("#nameTextarea").val()}" placeholder="${$("#placeholderTextarea").val()}" rows="${$("#rowTextarea").val()}" cols="${$("#colsTextarea").val()}"></textarea></div>`.toDOM();

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // establecemos el max-width del div contenedor del textarea
    // obtenemos el div contenedor
    let divElement = document.getElementById(id);
    // el boton
    let textareaControl = document.getElementById(id).children;
    // cambiamos el ancho del div igualándono al del boton
    divElement.style.width = textareaControl[0].offsetWidth + 'px';

    /** lo hacemos arrastrable con jquery solamente
     * no funciona en plataformas móviles */
    //$( "#"+id ).draggable();
    /** Lo hacemos arrastrable con jquery y draganddrop.js
     * funciona en plataformas móviles */
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc    
    $("#" + id).bind('dblclick', function () {
        //asigValoresDialogModalFieldset(id);
        asigValoresDialogModalTextarea(id);
        //$("#" + id).draggable( "destroy" );
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            asigValoresDialogModalTextarea(id);
        }
        e.preventDefault()
    });
}
// recogemos datos del control y lo asignamos al dialogo editor
function asigValoresDialogModalTextarea(idElem) {
    // Ancho y alto del Fieldset        
    let elemen = document.getElementById(idElem).children;
    $("#crearTextareaModal").modal("show");
    //le asignamos los datos
    $("#idTextarea").val(elemen[0].id)
    $("#nameTextarea").val(elemen[0].name)
    $("#placeholderTextarea").val(elemen[0].placeholder)
    $("#rowTextarea").val(elemen[0].rows)
    $("#colsTextarea").val(elemen[0].cols)
    // id del div contenedor
    $("#idContenedorTextareaHidden").val(idElem);
    // ocultamos el botón crear del dialogo modal
    $("#idCrearBotones").hide();
    $("#idEditarBotones").show();

    // ocultamos el botón crear del dialogo modal
    $("#idCrearTextarea").hide();
    $("#idEditarTextarea").show();
    $("#deshabilitarDraggable").show();
    $("#habilitarDraggable").show();
    $("#idEliminarTextarea").show();
}
// Funciones para habilitar y deshabilitar draggable
function deshabilitarDraggable() {
    let idContTA = $("#idContenedorTextareaHidden").val();
    $("#" + idContTA).draggable("destroy");
}
function habilitarDraggable() {
    let idContTA = $("#idContenedorTextareaHidden").val();
    $('#' + idContTA).draggable({
        addClasses: false
    });
}
// actualiza los datos del dialogo al control
function funcEditarTexarea() {
    let idVarOld = $("#idContenedorTextareaHidden").val();
    let elemen = document.getElementById(idVarOld).children;
    // reasignamos valores
    elemen[0].id = $("#idFieldsetLegend").val();
    elemen[0].name = $("#titleFieldsetLegend").val();
    elemen[0].placeholder = $("#placeholderTextarea").val();
    elemen[0].rows = $("#rowTextarea").val();
    elemen[0].cols = $("#colsTextarea").val();
}
// FUNCION PARA ELIMINAR EL BOTON
function eliminarTextarea(){
    // assign the current id to the modal
    let id = $("#idContenedorTextareaHidden").val();
    $('#confirDelete').data('id', id).modal('show');
}
/**------------------------------------------------------------ */



/**------------------------------------------------------------ 
 * FUNCION PARA LA CREACIÓN DE UN LABEL DESDE EL CUADRO DE DIALOGO */
function crearLabel(params) {
    // Control de errores si no ha ingresado texto al nuevo control
    if ($("#textoLabel").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    }
    // html que insertaremos
    let id = randId();
    let estilo = $('#estiloLabel option:selected').val();
    let tipo = $('#opcionesDialCrearTexto option:selected').val();
    let frag = `<${tipo} class="${estilo}" style="margin: auto;justify-content: center;text-align: center;" id="${id}">${$("#textoLabel").val()}</${tipo}>`.toDOM();

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // establecemos el max-width del label
    let labelElement = document.getElementById(id);
    labelElement.style.width = labelElement.offsetWidth + 'px';
    // lo hacemos arrastrable con jquery solamente

    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        //$("#" + id).remove();
        // assign the current id to the modal
        $('#confirDelete').data('id', id).modal('show');
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            $('#confirDelete').data('id', id).modal('show');
        }
        e.preventDefault()
    });
}
/**------------------------------------------------------------ */




/**------------------------------------------------------------ */
/* Si se presiona si se borra el elemento 
    sobre el cual se hizo doble click */
$('#btnDelete').click(function () {
    // handle deletion here
    var id = $('#confirDelete').data('id');
    $("#" + id).remove();
    // hide modal
    $('#confirDelete').modal('hide');
});
/**------------------------------------------------------------ */



/**------------------------------------------------------------ 
 * FUNCION PARA LA CREACIÓN DE UN INPUT DESDE EL CUADRO DE DIALOGO */
/* FUNCION PARA ABRIR DIALOGO MODAL PARA LA CREACIÓN DE LABEL */
$('#crearInputsModal').on('show.bs.modal', function (event) {
    /* Habilitamos el botón crear 
        deshabilitamos el resto*/
    $("#idCrearInputs").show();
    $("#idEditarInputs").hide();
    $("#idEliminarInputs").hide(); 
})

function crearInputs(params) {
    // Control de errores si no ha ingresado texto al nuevo control
    if ($("#textoInput").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    }
    // html que insertaremos
    let id = randId();
    let tipo = $('#opcionesDialCrearInputs option:selected').val();

    let evento = $('#asignarEventoCrearInputs option:selected').val();
    let frag = `<input class="form-control ${$('#estiloCrearInputs').val()}" style="margin:0px auto; display:block; width:${$('#anchoInput').val()}px;" type="${tipo}" id="${id}" name="${id}" placeholder="${$('#textoInput').val()}" value="${$('#textoInput').val()}" ${evento}="null" />`.toDOM();

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);
    
    // establecemos el max-width del inputs
    let inputsElement = document.getElementById(id);
    inputsElement.style.width = inputsElement.offsetWidth + 'px';
    
    // lo hacemos arrastrable con jquery solamente
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");
    // incluimos evento para edición doble click pc

    $("#" + id).bind('dblclick', function () {
        // assign the current id to the modal
        asigValoresDialogModalInputs(id);
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            asigValoresDialogModalInputs(id);
        }
        e.preventDefault()
    });
}

// recoger valores del control y asignarlo al dialogo
function asigValoresDialogModalInputs(idElem) {
    // obtenemos valor del elemento        
    let elemen = document.getElementById(idElem);
    //mostramos el dialogo
    $("#crearInputsModal").modal("show");
    //le asignamos los datos
    $("#idContenedorInputsHidden").val(idElem);
    $("#codFuenteInputs").val(elemen.outerHTML)
    $("#anchoInput").val(elemen.style.width.slice(0, -1));
    $('#opcionesDialCrearInputs option:selected').val(elemen.type)
    $('#estiloCrearInputs option:selected').val($("#" + idElem).attr("class").split(" ")[1].trim());
    /* ocultamos el botón crear del dialogo modal */
    $("#idCrearInputs").hide();
    $("#idEditarInputs").show();
    $("#idEliminarInputs").show();    
}

// Función para editar cualquier inputs
function editarInputs() {
    let idVarOld = $("#idContenedorInputsHidden").val();
    let elemen = document.getElementById(idVarOld);
    elemen.value = $("#textoInput").val();
    // reasignamos valores
    elemen.style.width = $("#anchoInput").val() + "px";
    // cambiar el estilo en la clase
    classAnterior = $("#" + idVarOld).attr("class");
    // la removemos del documento a esta clase
    $("#" + idVarOld).removeClass(classAnterior);
    // estilos tenidos en cuenta
    let find = ["text-primary", "text-secondary", "text-success", "text-danger", "text-warning", "text-info", "text-light", "bg-dark", "text-dark", "text-muted", "text-white", "bg-dark"];
    // clase nueva a agregar
    classNueva = $('#estiloCrearInputs option:selected').val();
    // reemplazamos en el texto la clase anterior por la nueva
    find.forEach((value, index) => {
        classAnterior = classAnterior.replace(new RegExp(value, 'g'), classNueva)
    })
    // agregamos la clase al documento html
    $("#" + idVarOld).addClass(classAnterior);

    // cambiar el tipo de control
    elemen.type = $('#opcionesDialCrearInputs option:selected').val();
    //var events = $._data($("#" + idVarOld)[0], "events");
    //console.log(events);
    // eliminar evento
    $("#" + idVarOld).removeAttr('onclick');
    $("#" + idVarOld).removeAttr('onchange');
    $("#" + idVarOld).removeAttr('onmouseover');
    $("#" + idVarOld).removeAttr('onmouseout');
    $("#" + idVarOld).removeAttr('onmousedown');
    $("#" + idVarOld).removeAttr('onmouseup');
    $("#" + idVarOld).removeAttr('onfocus');
    $("#" + idVarOld).removeAttr('onfocusout');
    // agregar nuevo evento.
    $("#" + idVarOld).attr($('#asignarEventoCrearInputs option:selected').val(), 'null');
}
// FUNCION PARA ELIMINAR EL BOTON
function eliminarInputs(){
    // assign the current id to the modal
    let id = $("#idContenedorInputsHidden").val();
    $('#confirDelete').data('id', id).modal('show');
}
/**------------------------------------------------------------ */



/**------------------------------------------------------------ 
 * FUNCION PARA EXPORTAR EL FORMULARIO A UNA BASE DE DATOS */
var sourceCodeAnt = "";
function exportFormulario() {    
    // si no se ha ingresado ningun control salimos.
    if ($('#contenedor1').html().trim() == "") {
        return -1;
    };
    // Prueba elinv antes de grabar el nuevo formulario
    $("#pruebaElinv").show();

/*
    //Código fuente del nuevo formulario
    var sourceCode = $('#contenedor1').parent().html();
    // si es igual al formulario anterior... o es nulo
    if (sourceCodeAnt == sourceCode) {
        //alert('son iguales');
        return -1;
    } else {
        sourceCodeAnt = sourceCode;
    }
    // por ajax lo pasamos a php
    var parametros = {
        "codigoFuente": sourceCode
    };
    // lo hacemos efectivo
    $.ajax({
        data: parametros,
        url: './formCreados/genModel.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            //console.log(response);
            //$("#resultado").html(response);
            //window.location.href = "./formCreados/listForm.php";
            window.open('./formCreados/listForm.php', '_blank');
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText
            //$("#resultado").html(errorMessage);
        }
    });
    //Desde aquí mostrariamos la pagina
*/
}

/**------------------------------------------------------------ */



/**------------------------------------------------------------ 
 * FUNCION PARA LA CREACIÓN DE UN CONTROL DE VIDEO|VIDEO SUBTITULADO|AUDIO DESDE EL CUADRO DE DIALOGO */
function crearMedia(params) {
    let control, ancho, alto, frag;
    // Control de errores si no ha ingresado ancho del nuevo control
    if ($("#anchoMedia").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    } else {
        ancho = $("#anchoMedia").val();
    }
    // Control de errores si no ha ingresado alto del nuevo control
    if ($("#altoMedia").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    } else {
        alto = $("#altoMedia").val();
    }
    // tipo de control
    control = $('#opcionesDialCrearMedia option:selected').val();
    // html que insertaremos
    let id = randId();
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Video') {
        // fragmento de código a agregar
        frag = `<video width="${ancho}" height="${alto}" id="${id}" name="${id}" controls><source src="./formCreados/media/mov_bbb.mp4" type="video/mp4"><source src="./formCreados/media/mov_bbb.ogg" type="video/ogg">Your browser does not support the video tag.</video>`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Video_subtitulado') {
        // fragmento de código a agregar
        frag = `<video width="${ancho}" height="${alto}" id="${id}" name="${id}" controls> <source src="./formCreados/media/mov_bbb.mp4" type="video/mp4"> <source src="./formCreados/media/mov_bbb.ogg" type="video/ogg"> <track src="fgsubtitles_en.vtt" kind="subtitles" srclang="en" label="English"> <track src="fgsubtitles_no.vtt" kind="subtitles" srclang="no" label="Norwegian"> Your browser does not support the video tag. </video> `.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Audio') {
        // fragmento de código a agregar
        frag = `<div id="${id}" style="margin: auto;"><audio style="margin: 0 auto; display: block;" width="${ancho}" height="${alto}" controls> <source src="./formCreados/media/horse.ogg" type="audio/ogg"><source src="./formCreados/media/horse.mp3" type="audio/mpeg"> Your browser does not support the audio element.</audio></div>`.toDOM();
    }

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // lo hacemos arrastrable con jquery solamente
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        //$("#" + id).remove();
        // assign the current id to the modal
        $('#confirDelete').data('id', id).modal('show');
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            $('#confirDelete').data('id', id).modal('show');
        }
        e.preventDefault()
    });

}
/**------------------------------------------------------------ */




/**------------------------------------------------------------ 
 * FUNCION PARA LA CREACIÓN DE UN CONTROL DE IMAGE|SVG|FIGURE DESDE EL CUADRO DE DIALOGO */
function crearImageSvgFigure(params) {
    let control, ancho, alto, frag;
    // Control de errores si no ha ingresado ancho del nuevo control
    if ($("#anchoImage").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    } else {
        ancho = $("#anchoImage").val();
    }
    // Control de errores si no ha ingresado alto del nuevo control
    if ($("#altoImage").val().length == 0) {
        alert('No ha ingresado texto al nuevo control.');
        return -1;
    } else {
        alto = $("#altoImage").val();
    }
    // tipo de control
    control = $('#opcionesDialCrearImageSvgFigure option:selected').val();
    // html que insertaremos
    let id = randId();
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Image') {
        // fragmento de código a agregar
        frag = `<img src="./formCreados/media/elinv.jpg" alt="Elinv @ 2022" width="${ancho}" height="${alto}" id="${id}" name="${id}" >`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Svg') {
        // fragmento de código a agregar
        let cxSvg = ancho / 2;
        let cySvg = alto / 2;
        let rSvg = alto / 2 -10;
        frag = `<svg width="${ancho}" height="${alto}" id="${id}" name="${id}"><circle cx="${cxSvg}" cy="${cySvg}" r="${rSvg}" stroke="green" stroke-width="4" fill="yellow" />Sorry, your browser does not support inline SVG.</svg>`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Picture') {
        // fragmento de código a agregar
        frag = `<picture id="${id}" name="${id}"><source media="(min-width:${ancho}px)" srcset="./formCreados/media/elinv.jpg"><source media="(min-width:${alto}px)" srcset="./formCreados/media/elinv.jpg"><img src="./formCreados/media/elinv.jpg" alt="Elinv 2022" style="width:auto;"></picture>`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Figure') {
        // fragmento de código a agregar
        frag = `<figure id="${id}" name="${id}"><img src="./formCreados/media/elinv.jpg" alt="Trulli" style="width:${ancho}px"><figcaption>Elinv @ 2022.</figcaption></figure>`.toDOM();
    }

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // lo hacemos arrastrable con jquery solamente
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        //$("#" + id).remove();
        // assign the current id to the modal
        $('#confirDelete').data('id', id).modal('show');
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            $('#confirDelete').data('id', id).modal('show');
        }
        e.preventDefault()
    });

}
/**------------------------------------------------------------ */




/**------------------------------------------------------------ 
 * FUNCION PARA LA CREACIÓN DE UN CONTROL DE IMAGE|SVG|FIGURE DESDE EL CUADRO DE DIALOGO */
 function crearSelectDatalist(params) {
    let control, ancho, alto, frag;
    // tipo de control
    control = $('#opcionesselectDatalist option:selected').val();
    // html que insertaremos
    let id = randId();
    // de acuerdo al tipo de control -Si es Video
    let labelAdd = "";
    if (control == 'Select') {
        // Si agregará el label
        if ($('#incluirLabel').is(':checked')==true){
            labelAdd = `<label for="autos">Elija su auto:</label>`;
        }
        // agregamos el fragmento
        frag = `<div id="${id}" style="margin: auto;">
            ${labelAdd}
            <select name="autos" id="autos" class="form-select form-select-sm">  
            <option value="ford">Ford</option><option value="fiat">Fiat</option><option value="mercedes Benz">Mercedes Benz</option><option value="audi">Audi</option></select></div>`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
     if (control == 'Datalist_Text') {
         // fragmento de código a agregar
         frag = `<div id="${id}" style="margin: auto;"><input type="text" id="${id}" name="${id}" list="lenguajes"/>
            <datalist id="lenguajes" class="form-select form-select-sm"><option value="JavaScript"></option><option value="Python"></option><option value="Java"></option><option value="HTML">Stop being a troll</option></datalist></div>`.toDOM();
    }
    // de acuerdo al tipo de control -Si es Video
    if (control == 'Datalist_Color') {
        // Si agregará el label
        if ($('#incluirLabel').is(':checked')==true){
            labelAdd = `<label for="autos">Elija color:</label>`;
        }        
        // fragmento de código a agregar
        frag = `<div id="${id}" style="margin: auto;">
            ${labelAdd}
            <input type="color" id="pick_color" list="colors"/><datalist id="colors" class="form-select form-select-sm"><option value="#155AF0"></option><option value="#F107BA"></option><option value="#2B2B2B"></option></datalist></div>`.toDOM();
    }

    // lo agregamos al area de trabajo
    document.getElementById("contenedor1").appendChild(frag);

    // establecemos el max-width del inputs
    let inputsElement = document.getElementById(id);
    inputsElement.style.width = '240px';

    // lo hacemos arrastrable con jquery solamente
    $("#" + id).draggable({ addClasses: false });
    // le agregamos estilo
    $("#" + id).addClass("claseArrastrable");

    // incluimos evento para edición doble click pc
    $("#" + id).bind('dblclick', function () {
        //$("#" + id).remove();
        // assign the current id to the modal
        $('#confirDelete').data('id', id).modal('show');
    });

    // doble click en telefonos
    var tapped = false
    $("#" + id).on("touchstart", function (e) {
        if (!tapped) {
            tapped = setTimeout(function () {
                //single_tap()
                tapped = null
            }, 300); //wait 300ms
        } else {
            clearTimeout(tapped);
            tapped = null
            $('#confirDelete').data('id', id).modal('show');
        }
        e.preventDefault()
    });

}
/**------------------------------------------------------------ */
