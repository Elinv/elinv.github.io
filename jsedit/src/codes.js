// getElementById acceso
const $id = e => document.getElementById(e);

// Base de datos de snippets personales
let snipp = [
	"console.log\n\tconsole.log(\"$1\")",
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