let info = (valor) => {
    document.getElementById("nav-blog").innerHTML = "";
    loadXMLtoOBJECT("./agradecimientos.xml");
    loadXMLtoOBJECT("./diccionario.xml");
};

async function envBut(pag, frm) {
    const opciones = {
        method: "POST",
        body: new FormData(document.getElementById(frm)),
    };
    try {
        const fetchResp = await fetch(pag, opciones);
        const retorna = await fetchResp.text();
        return retorna;
    } catch (e) {
        return e;
    }
}
