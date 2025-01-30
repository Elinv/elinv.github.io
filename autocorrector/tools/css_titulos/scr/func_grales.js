//sin innerHTML
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
var sombraImg = '<div class="sombra"></div>';
var somb = sombraImg.toDOM();
//Agregamos a la pagina en el div puntual
//document.getElementById("img-out").appendChild(somb);