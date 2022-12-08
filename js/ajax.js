function procesoRespuestaFormulario(oDatos, sStatus, oXHR) 
{

    console.log("datos:");
    console.log(oDatos);

    if (oDatos.error) 
    {
        alert(oDatos.mensaje);
    } 
    else 
    {
        if(oDatos.inicioSesion !== undefined)
        {
            oUsuarioLogueado = oDatos.inicioSesion;
            //mostrarNavBar(oUsuarioLogueado.admin);
            if(frmInicioSesion.checkboxMantenerSesion.checked)
            {
                let sUsuarioLogueado = JSON.stringify(oUsuarioLogueado);
                localStorage.setItem("usuarioLogueado",sUsuarioLogueado);
            }
        }
        alert(oDatos.mensaje);
        oDatos.formulario.reset();
        $("#"+oDatos.area).hide("normal");
    }
}

function pedirAjax(url){
    // Creamos un objeto XHR.
    oAjax = objetoXHR();
    oAjax.open("GET",url, true);
    oAjax.addEventListener("readystatechange",procesarRespuesta,false);
    oAjax.send(null);
}

function procesarRespuesta()
{

    if (this.readyState == 4 && this.status == 200) 
    {
        listado(JSON.parse(oAjax.responseText));
    }
}

function objetoXHR() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        var versionesIE = new Array('Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'Msxml2.XMLHTTP.3.0', 'Msxml2.XMLHTTP', 'Microsoft.XMLHTTP');
        for (var i = 0; i < versionesIE.length; i++) {
            try {
                return new ActiveXObject(versionesIE[i]);
            } catch (errorControlado) {} //Capturamos el error,
        }
    }
    throw new Error("No se pudo crear el objeto XMLHttpRequest");
}