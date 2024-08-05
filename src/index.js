var temp; // múltiples usos
var indMLetra = 0;
var avance = 0;

// Variables globales
// Audio elemento
var audioElv = document.getElementById("audio1");
// Display mostramos velocidad
var ratedisplay = document.getElementById("rate");
// Velocidad de reproducción
var playRate = parseFloat(document.getElementById("idvelocidad").value);
// Hook al evento ratechange y muestra
// la tasa de reproducción actual después de cada cambio
audioElv.addEventListener(
    "ratechange",
    function () {
        ratedisplay.innerHTML = "Rate: " + audioElv.playbackRate.toFixed(2);
    },
    false
);

function playAudio(audioElv) {
    // Set button text == Pause
    document.getElementById("playbutton").innerHTML = "Pause";
    // Obtener el archivo del cuadro de texto
    // y asignarlo a la fuente del elemento de audio
    audioElv.src = document.getElementById("audioFile").value;
    audioElv.play();
    audioElv.playbackRate = 1; //parseFloat(playRate);
    setTimeout(function () {
        actualizaTimeRate();
    }, 1500);
}

function actualizaTimeRate() {
    audioElv.playbackRate = parseFloat(playRate);
}

function pauseAudio(audioElv) {
    // Set button text == Play
    document.getElementById("playbutton").innerHTML = "play";
    audioElv.pause();
}

// Incrementa velocidad
function aumentarVelocidad() {
    playRate += 0.05;
    audioElv.playbackRate = parseFloat(playRate);
    document.getElementById("idvelocidad").value =
        parseFloat(playRate).toFixed(2);
}

// Reducir la velocidad de reproducción a la mitad
function bajarVelocidad() {
    playRate -= 0.05;
    audioElv.playbackRate = parseFloat(playRate);
    document.getElementById("idvelocidad").value =
        parseFloat(playRate).toFixed(2);
}

$("#fileUpload").change(function (event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    audioElv.src = tmppath;
    audioElv.play();
    audioElv.playbackRate = 1; //parseFloat(playRate);
    setTimeout(function () {
        actualizaTimeRate();
    }, 1500);
});

// si hemos realizado una pausa o nos equivocamos y queremos rebobinar
function sigLinea() {
    var tALetra = document.getElementById("letraSubtit");
    // Pasamos a un array las lineas del textarea que tiene la letra
    var arrayLetra = tALetra.value.split("\n");
    // solo si el array tiene información válida
    if (arrayLetra.length > 1) {
        // lo mostramos para ayuda visual
        mostrarArray(arrayLetra);
        butCaptura;
        // Reacomodamos el indice para seguir insertando estrofas sincronizadas
        var iestro = document.getElementById("iEstrofa");
        // Si es null asignamos el primer elemento de la matriz
        if (iestro.value == "") {
            iestro.value = 0;
        }
        // Nos posicionamos en ese elemento y lo mostramos.
        avance = parseInt(iestro.value);
        // Mostramos el indice actual y su texto
        var estro = document.getElementById("estrofa");
        estro.value = arrayLetra[avance];
        next.innerHTML = arrayLetra[avance];
    }
    butCaptura.focus();
    filas = parseInt(iestro.value) + 1;
}
parseInt
// Función para ir sincronizando la letra con el audio.
let filas = parseInt(iEstrofa.value) + 1;
let linea = 1;
function captura() {
    // Si no ha sido cargado el reproductor de video
    if (document.getElementById("audio1").src.search("blob") == -1) {
        alert("No se ha cargado ningún audio o video");
        audio1.focus();
        return -1;
        // Si se cargo el video o el audio
    } else {
        if (letraSubtit.value == "") {
            alert("No ha cargado lineas de texto para generar subtítulos.");
            letraSubtit.focus();
            return -1;
        }
        if (arraySubtit.value == "") {
            alert("No ha generado la matriz para control de Subtítulos.");
            butSigLinea.focus();
            return -1;
        }
        if (estrofa.value == "") {
            alert("No ha generado la matriz para control de Subtítulos.");
            butSigLinea.focus();
            return -1;
        }
        if (arraySubtit.value == "") {
            alert("No ha generado la matriz para control de Subtítulos.");
            butSigLinea.focus();
            return -1;
        }
        let valTime = document.getElementById("tiempoActual").innerHTML;
        let horaMinSeg = sToTime(valTime);
        // Donde mostramos la info
        var tASyncro = document.getElementById("srtCreator");
        var tALetra = document.getElementById("letraSubtit");
        if (linea == 1) {
            tASyncro.value += filas + "\n";
            tASyncro.value += horaMinSeg + " --> ";
            linea = 2;
            tASyncro.scrollTop = 2200;
            tALetra.scrollTop = tASyncro.scrollTop + 100;
            return;
        }

        if (linea == 2) {
            // Mostramos la creación del srt
            tASyncro.value += horaMinSeg + "\n";
            tASyncro.value += document.getElementById("estrofa").value + "\n\n";
            linea = 1;
            filas += 1;
            // Pasamos a un array las lineas del textarea que tiene la letra
            var arrayLetra = tALetra.value.split("\n");
            // solo si el array tiene información válida
            if (arrayLetra.length > 1) {
                // lo mostramos para ayuda visual
                mostrarArray(arrayLetra);
                // Tiempo actual
                var tActual = document.getElementById("tiempoActual").innerHTML;
                // Donde mostramos la info
                var tASyncro = document.getElementById("srtCreator");
                arrayLetra[avance++];
                tASyncro.scrollTop = 30000;
                tALetra.scrollTop = tASyncro.scrollTop + 100;
                // Mostramos el indice actual y su texto
                var iestro = document.getElementById("iEstrofa");
                var estro = document.getElementById("estrofa");
                iestro.value = avance;
                estro.value = arrayLetra[avance];
                // Title del documento con la frase venidera.
                document.title = document.getElementById("estrofa").value;
                next.innerHTML = document.title;
            }
        }
    }
}

// cargar array en textarea para información
function mostrarArray(arrayLetra) {
    //var msg = arrayLetra.join("\n");
    //info.value= msg;
    var info = document.getElementById("arraySubtit");
    var i = 0;
    var i;
    info.value = "Linea:\testrofa:\n";
    info.value += "------\t--------\n";
    if (arrayLetra.length == 1 && arrayLetra[0] == "") {
        info.value = "";
    } else {
        for (i = 0; i < arrayLetra.length; i++) {
            info.value += i + "\t" + arrayLetra[i] + "\n";
        }
    }
}

function sToTime(num) {
    let entero = num.toString().split(".")[0];
    let decimal = num.toString().split(".")[1].substr(0, 3);
    //Obtenemos la hora
    let hora = Math.floor(entero / (60 * 60)) % 24;
    if (hora.toString().replace(".", "").length == 1) {
        hora = "0" + hora;
    }
    // Obtenemos los minutos
    let minutos = Math.floor(entero / 60) % 60;
    if (minutos.toString().replace(".", "").length == 1) {
        minutos = "0" + minutos;
    }
    let segundos = entero % 60;
    if (segundos.toString().replace(".", "").length == 1) {
        segundos = "0" + segundos;
    }
    return hora + ":" + minutos + ":" + segundos + "," + decimal;
}

// Teclas de acceso rápido
// Para la captura del tiempo de inicio fin y texto
// Alt + x
document.addEventListener("keydown", function (event) {
    if (event.altKey && event.code === "KeyX") {
        captura();
        event.preventDefault();
    }
});

// Pone el orden de la estrofa a cero
iEstrofa.addEventListener("dblclick", function () {
    iEstrofa.value = 0;
});

// Limpia textarea srt
srtCreator.addEventListener("dblclick", function () {
    if (srtCreator.value == "") {
        next.innerHTML = "No existe ningún subtítulo.";
        return 0;
    }
    let text = "Desea limpiar los subtítulos generados?\n OK o Cancel.";
    if (confirm(text) == true) {
        srtCreator.value = "";
        next.innerHTML = "Subtítulos limpiados";
    } else {
        next.innerHTML = "Limpieza cancelada!";
    }
});
// ---------------------------------------------

// ---------------------------------------------
// salvar a disco contenido de textarea srt como SRT y VTT
// ---------------------------------------------
function saveTextAreaAsFile() {
    try {
        // posibles...
        // name.files.item(0).name;
        // name.files.item(0).size;
        // name.files.item(0).type;
        let firstLine = fileUpload.files.item(0).name.split(".")[0];
        //título del archivo
        // let titFile = document.getElementById("srtCreator").value.split('\n');
        // let firstLine = titFile[0];
        // Contenido del archivo para grabar a disco como SRT
        let textcontentSRT = document.getElementById("srtCreator").value;
        // Contenido del archivo para grabar a disco como SRT
        let textcontentVTT =
            "WEBVTT FILE\n" + document.getElementById("srtCreator").value;
        textcontentVTT = textcontentVTT.replaceAll(",", ".");

        let downloadableLink = document.createElement("a");
        downloadableLink.setAttribute(
            "href",
            "data:text/plain;charset=utf-8," +
                encodeURIComponent(textcontentSRT)
        );
        downloadableLink.download = firstLine + ".srt";
        document.body.appendChild(downloadableLink);
        downloadableLink.click();
        document.body.removeChild(downloadableLink);

        downloadableLink = document.createElement("a");
        downloadableLink.setAttribute(
            "href",
            "data:text/plain;charset=utf-8," +
                encodeURIComponent(textcontentVTT)
        );
        downloadableLink.download = "subtitulo.vtt";
        document.body.appendChild(downloadableLink);
        downloadableLink.click();
        document.body.removeChild(downloadableLink);
    } catch (error) {
        console.log(`Error: ${error}`);
    }
}
// ---------------------------------------------

// ---------------------------------------------
// salvar a disco contenido de textarea srt como SRT y VTT
// ---------------------------------------------
function saveTextAreaAsFileTXT() {
    try {
        let firstLine = fileUpload.files.item(0).name.split(".")[0];
        // Contenido del archivo para grabar a disco como TXT
        let textcontentSRT = document.getElementById("letraSubtit").value;
        let downloadableLink = document.createElement("a");
        downloadableLink.setAttribute(
            "href",
            "data:text/plain;charset=utf-8," +
                encodeURIComponent(textcontentSRT)
        );
        downloadableLink.download = firstLine + ".txt";
        document.body.appendChild(downloadableLink);
        downloadableLink.click();
        document.body.removeChild(downloadableLink);
    } catch (error) {
        console.log(`Error: ${error}`);
    }
}
// ---------------------------------------------

// ---------------------------------------------
// Temporizador que se ejecuta una sola vez
// al cargarse todos los elementos de la pagina
// y establece un zoom determinado
// si la pantalla es menor a 1400,
// como en el caso de mi tv hdmi -> segunda pantalla
// ---------------------------------------------
window.onload = function () {
    setTimeout(() => {
        //reset zoom
        var scale = "scale(1)";
        document.body.style.webkitTransform = scale; // Chrome, Opera, Safari
        document.body.style.msTransform = scale; // IE 9
        document.body.style.transform = scale; // General
        document.body.style.zoom = window.innerWidth / window.outerWidth;
        // en pantallas mas chicas o de tv
        let zoomAct = Math.round(window.devicePixelRatio * 100);
        let size = screen.width;
        if (size <= 1400 && zoomAct >= 70) {
            document.body.style.zoom = "65%";
        }
        // Refresca al rate play utlimamente usado.
        ratedisplay.textContent = "Rate: " + playRate;
        // Carga el estado del Checbox de ayuda
        loadStckBox();
    }, 2000);
};
// ---------------------------------------------

// ---------------------------------------------
// Checkbox cargar el estado en el inicio
// ---------------------------------------------
function loadStckBox() {
    var cbEstado = JSON.parse(localStorage.getItem("ckHelp"));
    document.getElementById("ckHelp").checked = cbEstado;
    helpEstado();
}
// Mostrar u ocultar ayuda
function helpEstado() {
    let cbEstado = document.getElementById("ckHelp").checked;
    const collect = document.getElementsByClassName("tooltipOut");
    // Si el checkbox es false
    if (cbEstado == false) {
        while (collect.length > 0) {
            collect[0].classList.remove("tooltipOut");
            // Ocultamos icono de interrogacion de ayuda
            repVideoAudio.style.display = "none";
        }
        repVideoAudio.style.display = "none";
        // Si el checkbox es true
    } else if (cbEstado == true) {
        let arrElem = [
            "lineaTiempo",
            "infoTimer",
            "repVideoAudio",
            "masVel",
            "menVel",
            "outSrt",
            "outTxt",
            "outMatriz",
            "codeHtmlReprod",
        ];
        arrElem.forEach((element) => {
            document.getElementById(element).classList.add("tooltipOut");
        });
        // mostramos icono de interrogacion de ayuda
        repVideoAudio.style.display = "block";
        repVideoAudio.style.position = "absolute";
        repVideoAudio.style.left = "40em";
        repVideoAudio.style.top = "27em";
    }
}
//this.style.display='none';"
// ---------------------------------------------
