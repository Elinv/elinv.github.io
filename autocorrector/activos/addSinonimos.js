let cuantos = 1;
let salir = false;

function addSin(arrSin, id, dictWord, word) {
    // aquí agregamos sinonimos
    //const ul = document.getElementById("asesor");
    const ul = document.getElementById(id);
    // console.log(arrSin.twoDIndexOf(dictWord));
    // console.log(arrSin.twoDIndexOf(word));
    if (arrSin.twoDIndexOf(dictWord) != -1 || arrSin.twoDIndexOf(word) != -1) {  
        ul.innerHTML += `<li class="list-group-item list-group-item-warning"><a href="#">Sinónimos</a></li>`;
        ul.innerHTML += `<li role="separator" class="divider"></li>`;
        for (const key in arrSin[0]) {
            if (Object.hasOwnProperty.call(arrSin[0], key)) {
                const element = arrSin[0][key];
                ul.innerHTML += `<li class="selectable" onclick="pegarTA(this);"><a href="#">${element}</a></li>`;
            }
        }
        ul.innerHTML += `<li role="separator" class="divider"></li>`;
        ul.innerHTML += `<li class="list-group-item list-group-item-danger"><a href="#">Antónimos</a></li>`;
        ul.innerHTML += `<li role="separator" class="divider"></li>`;

        for (const key in arrSin[1]) {
            if (Object.hasOwnProperty.call(arrSin[1], key)) {
                const element = arrSin[1][key];
                ul.innerHTML += `<li class="selectable" onclick="pegarTA(this);"><a href="#">${element}
                </a></li>`;
            }
        }
        ul.innerHTML += `<li role="separator" class="divider"></li>`;
        
        // para salir despues de esta cantidad de resultados
        if (cuantos++ > 2){
          salir = true;  
        } 
    }
}

function addPalabra(arrSin, id) {
    // aquí agregamos sinonimos
    const ul = document.getElementById(id);
    //console.log(arrSin);
    // límite
    let lim = 10;
    //recomendaciones
    ul.innerHTML = `<li class="list-group-item list-group-item-warning"><a href="#">Recomendaciones</a></li>`;
    ul.innerHTML += `<li role="separator" class="divider"></li>`;
    for (const key in arrSin) {
        if (Object.hasOwnProperty.call(arrSin, key)) {
            const element = arrSin[key];
            ul.innerHTML += `<li class="selectable" onclick="pegarTA1(this);"><a href="#">${element}</a></li>`;
            if (key >= lim){
                break;
            }
        }
    }
    ul.innerHTML += `<li role="separator" class="divider"></li>`;
}
