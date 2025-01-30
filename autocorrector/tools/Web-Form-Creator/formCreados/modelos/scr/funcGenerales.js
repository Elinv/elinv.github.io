// si es nulo o vacío
function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}

// Prototitpo para anexar elementos
String.prototype.toDOM = function () {
    var htmlCode = document.createElement('div'),
        frag = document.createDocumentFragment();
    htmlCode.innerHTML = this;
    frag.appendChild(htmlCode.firstChild);
    return frag;
};

// random id
function randId() {
    return Math.random().toString(36).replace(/[^a-z]+/g, '').substr(2, 10);
}

// -------------------------------------