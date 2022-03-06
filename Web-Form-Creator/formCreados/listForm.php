<?php
// Listar archivos del directorio
function newest($a, $b)
{
    return filemtime($a) - filemtime($b);
}
// put all files in an array 
$dir = glob('./modelos/*');
// sort the array by calling newest() 
natsort($dir);
$dir = array_reverse($dir);
//print_r ($dir); 
//Pasamos a un array js
?>
<script>
    var filesElinvArray = <?php echo json_encode($dir); ?>;
    var avance = 2;
</script>
<!DOCTYPE html>
<html lang=es>
<head>
<title>👥 Design 💚 Form 👀 Elinv 👥</title>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel=stylesheet href=./modelos/scr/bootstrap.min.css>
<link rel="shortcut icon" href=# />
<style>.recuadro,.container{position:relative;background-color:#942b2b;border:1px solid black;margin:auto}footer{background-color:#555;color:white;padding:15px}legend{color:white;padding:5px 10px;margin-left:auto;margin-right:auto;text-align:center}input{margin:15px}textarea{font-family:monospace;text-rendering:auto;color:-internal-light-dark(black,white);letter-spacing:normal;word-spacing:normal;line-height:normal;text-indent:0;display:flex;resize:auto;cursor:text;white-space:pre-wrap;overflow-wrap:break-word;background-color:-internal-light-dark(#ffffff,#3b3b3b);column-count:initial!important;margin:0;border-width:1px;padding:2px;background:-webkit-gradient(linear,left top,left 25,from(#FFFFFF),color-stop(4%,#FFCEE7),to(#FFFFFF));background:-moz-linear-gradient(top,#FFFFFF,#FFCEE7 1px,#FFFFFF 25px);box-shadow:rgb(0 0 0 / 10%) 0 0 8px;-moz-box-shadow:rgba(0,0,0,0.1) 0 0 8px;-webkit-box-shadow:rgb(0 0 0 / 10%) 0 0 8px}form,label,p{color:white!important}#wrapper{margin:auto}body{background-color:aqua;width:100%}</style>
</head>
<img style=position:absolute;top:0;left:0;border:0;z-index:4 width=110px src=./img/elinvycloudflare.png alt="Certificado calidad Elinv y Cloudflare">
<header class="container-fluid text-center">
<div class=text-center>
<img alt=US src=./img/DesignFormElinv.png width=390px>
</div>
</header>
<noscript>
<div class="container-fluid d-flex justify-content-center div_contenedor">
<div class="row content">
<div class="col-md-8 p-2 bg-dark">
<h4>
<small>POSTS <strong> e l i n v </strong></small>
</h4>
<p>
<span class=badge>10</span> Bienvenido a mi vivo!.
<h5>
<span class="label label-danger" style=font-size:x-large>No tienes javascript habilitado</span>
<hr>
<span class="label label-warning">para ver mas</span>
<span class="label label-success">habilitalo</span>
<span class="label label-primary">Elinv</span>
</h5>
</p>
<img src=./images/elinv.png class="img-responsive center-block" alt="Elinv 4 x 4">
<h2 class=titulo>
<i class="glyphicon glyphicon-text-size" style=color:chartreuse></i>
Aquí subiendo nuestra historia en el momento.
</h2>
<h5>
<span class="glyphicon glyphicon-time" style=color:coral;font-size:21px></span>
<b class=post>By Elinv,
Habilitando Javascript verás todo lo que hemos subido hasta ahora!
</b>
</h5>
<p class=textoAlPie>
<i class="glyphicon glyphicon-heart" style=color:darkturquoise;font-size:24px></i>
Pensamientos, videos, imagenes, fotos, audios.
</p>
<h5>
<span class="label label-danger">
Gracias Señor!
</span>
<span class="label label-primary">
Elinv
</span>
</h5>
</div>
</div>
</div>
<hr noshade=noshade width=75% style=height:5px;border-width:0;color:gray;background-color:gray />
</noscript>
<div class=recuadro>
<div id=wrapper style=width:400px;text-align:center>
<div id=updateDinamico style=position:relative;top:8px;left:2px;display:inline-block;margin-left:auto;margin-right:auto;margin-bottom:auto>
</div>
</div>
</div>
<footer class style=bottom:0>
<h2 class="container-fluid text-center" style=cursor:pointer>
<button id=vermas type=button class="btn btn-info"> 🔭 Leer mas ➕ ... ✅</button>
</h2>
</footer>
<div class="modal fade" id=sinMasForm role=dialog>
<div class=modal-dialog>
<div class=modal-content>
<div class=modal-header>
<button type=button class=close data-dismiss=modal>&times;</button>
<h4 class=modal-title style=font-size:62px>Elinv</h4>
</div>
<div class=modal-body>
<p id=error>Es todo por ahora!</p>
</div>
<div class=modal-footer>
<button type=button class="btn btn-default" data-dismiss=modal>Cerrar</button>
</div>
</div>
</div>
</div>
<div class=modal id=exportHtmlForm tabindex=-1 role=dialog>
<div class=modal-dialog role=document>
<div class=modal-content>
<div class=modal-header>
<h5 class=modal-title>Creador de formularios Elinv</h5>
<button type=button class=close data-dismiss=modal aria-label=Close>
<span aria-hidden=true>&times;</span>
</button>
</div>
<div class=modal-body>
<p>Código fuente del formulario.</p>
<textarea class=form-control id=id_t_a_Result name=Name_textarea placeholder="Placeholder al textarea" rows=16 cols=40></textarea>
<div class=container-fluid id=vistaWeb style=height:725px>
</div>
</div>
<div class=modal-footer style=margin:auto>
<button type=button style=z-index:6 class="btn btn-primary">Contenido en el portapapeles.</button>
<button type=button style=z-index:6 class="btn btn-primary" data-dismiss=modal> Close</button>
</div>
</div>
</div>
</div>
<script src=./modelos/scr/jquery-3.6.0.js></script>
<script src=./modelos/scr/bootstrap.min.js></script>
<script>$(document).ready(function(){const element=filesElinvArray.length;let total=6;if(element<=5){total=element;}
for(avance;avance<total;avance++){const element=filesElinvArray[avance];$.get(element,function(addFileFormHtml){$("#updateDinamico").append(addFileFormHtml+`<button type="button"title="Exportar formulario"class="btn btn-success"onclick="exportarFormularioAHtml('${element}');">Exportar</button><hr>`);});}});$("#vermas").click(function(){let verMas=avance+4;let actual=avance;for(avance=actual;avance<verMas;avance++){const element=filesElinvArray[avance];if(element===undefined){$('#sinMasForm').modal("show");return-1;}else{$.get(element,function(addFileFormHtml){$("#updateDinamico").append(addFileFormHtml+`<button type="button"title="Exportar formulario"class="btn btn-success"onclick="exportarFormularioAHtml('${element}');">Exportar</button><hr>`);});}}});function exportarFormularioAHtml(dirFileName){$.get(dirFileName,function(addFileFormHtml){$.get("./base/modelHead.php",function(addFileHead){$.get("./base/modelFoot.php",function(addFileFoot){let sourceFinal=addFileHead+addFileFormHtml+addFileFoot;$('#exportHtmlForm').modal("show");$(id_t_a_Result).val(sourceFinal);document.getElementById("vistaWeb").innerHTML=sourceFinal;copyTextToClipboard(sourceFinal);});});});}
function fallbackCopyTextToClipboard(text){var textArea=document.createElement("textarea");textArea.value=text;document.body.appendChild(textArea);textArea.focus();textArea.select();let msg;try{let successful=document.execCommand('copy');msg=successful?config.msg.success:config.msg.unsucess;msg=config.msg.copyToClipb+msg;msgNotif(config.msg.titulo+"\r\n",msg)}catch(err){msg=config.msg.errCopyToClipb+err;msgNotif(config.msg.titulo+"\r\n",msg);}
document.body.removeChild(textArea);}
function copyTextToClipboard(text){if(!navigator.clipboard){fallbackCopyTextToClipboard(text);return;}
let msg;navigator.clipboard.writeText(text).then(function(){msg=config.msg.copyToClipbExitosa+'\r\n \r\n => '+text;msgNotif(config.msg.titulo+"\r\n",msg);},function(err){msg=config.msg.copyToClipbErr+err;msgNotif(config.msg.titulo+"\r\n",msg);});}</script>
</body>
</html>
