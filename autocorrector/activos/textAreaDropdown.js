$(function () {
    $("textarea").on("keyup", function (evt) {
        var pos = getCaretCoordinates(this, this.selectionEnd);
        $("div.sinonimos").css({
            position: "absolute",
            top: this.offsetTop - this.scrollTop + 15 + pos.top + "px",
            left: this.offsetLeft - this.scrollLeft + pos.left + "px",
        });
        $("ul.dropdown-menu").css({
            height: "300px",
        });

        $("div.palabras").css({
            position: "absolute",
            top: this.offsetTop - this.scrollTop + 25 + pos.top + "px",
            left: this.offsetLeft - this.scrollLeft + pos.left + 180 + "px",
        });
        $("ul.dropdownWord-menu").css({
            height: "300px",
        });
    });
});

var properties = [
    "boxSizing",
    "width",
    "height",
    "overflowX",
    "overflowY",

    "borderTopWidth",
    "borderRightWidth",
    "borderBottomWidth",
    "borderLeftWidth",

    "paddingTop",
    "paddingRight",
    "paddingBottom",
    "paddingLeft",

    "fontStyle",
    "fontVariant",
    "fontWeight",
    "fontStretch",
    "fontSize",
    "lineHeight",
    "fontFamily",

    "textAlign",
    "textTransform",
    "textIndent",
    "textDecoration",

    "letterSpacing",
    "wordSpacing",
];

var isFirefox = !(window.mozInnerScreenX == null);
var mirrorDiv, computed, style;

getCaretCoordinates = function (element, position) {
    // clon del textarea en forma de div
    mirrorDiv = document.getElementById(element.nodeName + "--mirror-div");
    if (!mirrorDiv) {
        mirrorDiv = document.createElement("div");
        mirrorDiv.id = element.nodeName + "--mirror-div"; //TEXTAREA--mirror-div
        document.body.appendChild(mirrorDiv);
    }

    style = mirrorDiv.style;
    //obtenemos las propiedades del textarea
    computed = getComputedStyle(element);

    // estilos por default
    style.whiteSpace = "pre-wrap";
    // only for textarea-s
    style.wordWrap = "break-word";

    // position off-screen
    style.position = "absolute"; // required to return coordinates properly
    style.top = element.offsetTop + parseInt(computed.borderTopWidth) + "px";
    style.left = element.offsetLeft + parseInt(computed.borderLeftWidth) + "px";
    style.visibility = "hidden"; // no necesitamos que sea visible

    // transferir las propiedades al div
    properties.forEach(function (prop) {
        style[prop] = computed[prop];
    });

    if (isFirefox) {
        style.width = parseInt(computed.width) - 2 + "px";
        // Firefox adds 2 pixels to the padding -
        // https://bugzilla.mozilla.org/show_bug.cgi?id=753662
        // Firefox lies about the overflow property for textareas:
        // https://bugzilla.mozilla.org/show_bug.cgi?id=984275
        if (element.scrollHeight > parseInt(computed.height))
            style.overflowY = "scroll";
    } else {
        style.overflow = "hidden";
        // for Chrome to not render a scrollbar; IE keeps overflowY = 'scroll'
    }

    mirrorDiv.textContent = element.value.substring(0, position);
    if (element.nodeName === "INPUT")
        mirrorDiv.textContent = mirrorDiv.textContent.replace(/\s/g, "\u00a0");

    var span = document.createElement("span");
    span.textContent = element.value.substring(position) || ".";
    // obtenemos los valores del textarea y los escribimos en caso que se encuentre texto por delante dentro del span para obtener la posision exacta
    span.style.backgroundColor = "lightgrey";
    mirrorDiv.appendChild(span);

    var coordinates = {
        top: span.offsetTop + parseInt(computed["borderTopWidth"]),
        left: span.offsetLeft + parseInt(computed["borderLeftWidth"]),
    };

    return coordinates;
};

$(document).ready(function () {
    var pos = getCaretCoordinates(tAC, tAC.selectionEnd);
    $("div.sinonimos").css({
        position: "absolute",
        top: tAC.offsetTop - tAC.scrollTop + 15 + pos.top + "px",
        left: tAC.offsetLeft - tAC.scrollLeft + pos.left + 30 + "px",
    });

    $("div.palabras").css({
        position: "absolute",
        top: tAC.offsetTop - tAC.scrollTop + 25 + pos.top + "px",
        left: tAC.offsetLeft - tAC.scrollLeft + pos.left + 180 + "px",
    });

    // Cargar diccionarios
    loadXMLtoOBJECT("./agradecimientos.xml");
    loadXMLtoOBJECT("./diccionario.xml");
    
    // Control + Z => undo
    function undoRedoRun() {
        var origValue = document.getElementById("tAC").value;
        tArr.push(origValue);

        //ctrl-z
        document.getElementById("pCont").onkeyup = function () {
            var zKey = 26;
            const key = event.key.toLowerCase();
            if (event.ctrlKey && key === "z") {
                deshacerTexto();
            }
            if (event.ctrlKey && key === "y") {
                rehacerTexto();
            }
        };

        //Rehacer Ctl+y
        function rehacerTexto() {
            if (posTArr < tArr.length - 1) {
                posTArr += 1;
                if (tArr[posTArr] !== "undefined") {
                    document.getElementById("tAC").value = tArr[posTArr];
                } else {
                    document.getElementById("tAC").value = "";
                }
            }
        }

        //Deshacer Ctl+z
        function deshacerTexto() {
            if (tArr.length > 1) {
                //tArr.pop();
                if (posTArr >= 1) {
                    posTArr -= 1;
                    if (tArr[posTArr] !== "undefined") {
                        document.getElementById("tAC").value = tArr[posTArr];
                    } else {
                        document.getElementById("tAC").value = "";
                    }
                }
            }
        }
    }
    undoRedoRun();
});
