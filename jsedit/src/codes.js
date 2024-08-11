// getElementById acceso
const $id = e => document.getElementById(e);

// Base de datos de snippets personales
/** 
 * Uso:	
 * 1°	Label Snippets					ej: console.log\n\t
 * 2°	Comando inserta					ej:	console.log(\"$1\")
 * 3°	Tipo editor donde se insertará	ej: javascript | html | css
*/
let snipp = [
	["console.log\n\tconsole.log(\"$1\")","javascript"],
	["innerHTML\n\tinnerHTML", "html"],
];

const head = `&lt;!DOCTYPE html&gt;<br>
&lt;html lang="es"&gt;<br>
&lt;head&gt;<br><br>
	&lt;meta charset="UTF-8" /&gt;<br>
	&lt;meta name="viewport" content="width=device-width, initial-scale=1.0" /&gt;<br>
	&lt;title&gt;JavaScript IDE Elinv&lt;/title&gt;<br>
	&lt;meta name="description"
		content="No soy lo que ustedes creen!, y no creen lo que soy! Todo lo que necesitamos es Dios! La música y la literatura aquí expresada por Elinv, es solamente fantástica! Y el sano juicio así debe asumirla." /&gt;<br>
	&lt;meta name="author" content="Elinv" /&gt;<br>
	&lt;meta name="keywords" content="'música, rock, pop, alma, sentimientos'"&gt;<br>
	&lt;meta name="language" content="Spanish"&gt;<br>
	&lt;!-- Favicon--&gt;<br>
	&lt;link rel="icon" type="image/x-icon" href="./activos/favicon.svg" /&gt;<br>
    `;

const headPostStyle  = `<br>
&lt;/head&gt;<br>
&lt;body style="background-color: #011f4b;"&gt;<br>`;

const bodyEnd = `
&lt;/body&gt;<br>
<br>
&lt;/html&gt;<br>`;


// Función full screen 
function fullScreenEdit(that) {
	if (that.innerHTML == 'Full'){
		editCode.classList.add('full');
		jsTab.classList.add('fullTC');
		editorContainer.classList.add('fullWIN');
		htmlTab.classList.add('fullTC');
		htmlEditor.classList.add('fullWIN');
		cssTab.classList.add('fullTC');
		cssEditor.classList.add('fullWIN');		
		that.innerHTML='Exit';
	}else{
		editCode.classList.remove('full'); 
		editCode.classList.remove('full');
		jsTab.classList.remove('fullTC');
		editorContainer.classList.remove('fullWIN');
		htmlTab.classList.remove('fullTC');
		htmlEditor.classList.remove('fullWIN');
		cssTab.classList.remove('fullTC');
		cssEditor.classList.remove('fullWIN');
		that.innerHTML='Full';
	}
}

function fullScreenView(that) {
	if (that.innerHTML == 'Full'){
		viewOut.classList.add('full');
		consola.classList.add('fullTC');
		consoleOutputContainer.classList.add('fullWIN');
		Wysick.classList.add('fullTC');
		consoleOutputContainerviewhtml.classList.add('fullWIN');
		viewHtml.classList.add('fullTC');
		consoleOutputContainerCodeHtml.classList.add('fullWIN');		
		that.innerHTML='Exit';
	}else{
		viewOut.classList.remove('full');
		consola.classList.remove('fullTC');
		consoleOutputContainer.classList.remove('fullWIN');
		Wysick.classList.remove('fullTC');
		consoleOutputContainerviewhtml.classList.remove('fullWIN');
		viewHtml.classList.remove('fullTC');
		consoleOutputContainerCodeHtml.classList.remove('fullWIN');
		that.innerHTML='Full';
	}
}




