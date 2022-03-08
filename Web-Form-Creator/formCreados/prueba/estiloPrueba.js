const captcha = document.querySelector(".captcha"),
    reloadBtn = document.querySelector(".reload-btn"),
    inputField = document.querySelector(".input-area input"),
    checkBtn = document.querySelector(".check-btn"),
    statusTxt = document.querySelector(".status-text");

//storing all captcha characters in array
let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
    'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

//aleatorio entre dos numeros
function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}

function getCaptcha() {
    const rndInt = randomIntFromInterval(2, 7)
    for (let i = 0; i < rndInt; i++) {
        let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
        captcha.innerText += ` ${randomCharacter}`;
    }
}
getCaptcha();
reloadBtn.addEventListener("click", () => {
    removeContent();
    getCaptcha();
});

checkBtn.addEventListener("click", e => {
    e.preventDefault();
    statusTxt.style.display = "block";
    let inputVal = inputField.value.split('').join(' ');
    if (inputVal == captcha.innerText) {
        statusTxt.style.color = "#4db2ec";
        statusTxt.innerHTML = "Gracias!<br>Que pases una excelente jornada!.<br>Derivándote a la página de muestras.";
        setTimeout(() => {
            removeContent();
            getCaptcha();
            // tratamos de salvar el nuevo formulario
            salvarNuevoFormulario();
            // ocultamos la prueba elinv
            $("#pruebaElinv").hide();
        }, 4000);
    } else {
        statusTxt.style.color = "#ff0000";
        statusTxt.innerText = "No son iguales. Por favor prueba de nuevo!";
    }
});

function removeContent() {
    inputField.value = "";
    captcha.innerText = "";
    statusTxt.style.display = "none";
}

// Función para salvar el nuevo formulario creado
function salvarNuevoFormulario() {
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
}