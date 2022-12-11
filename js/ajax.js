function procesoRespuestaFormulario(oDatos, sStatus, oXHR) 
{
    //BORRAR
    //console.log(oDatos);

    if (oDatos.error) 
    {
        alert(oDatos.mensaje);
    } 
    else 
    {
        /*
        if(oDatos.formulario == "frmInicioSesion")
            mostrarNavBarLogueado();
        
        alert(oDatos.mensaje);
        document.getElementById(oDatos.formulario).reset();
        mostrarArea(oDatos.area);
        mostrarNavBarLogueado();
        */
        oUsuarioLogueado = oDatos.usuario;
        if(frmInicioSesion.checkboxMantenerSesion){
            setCookie("usuario", oDatos.usuario, 30);
        }
    }
}

function procesoRespuestaInicioPagina(oDatos, sStatus, oXHR) {

    //BORRAR
    console.log(oDatos);

    if(oDatos==undefined || oDatos==null)
    {  
        
    }
    else if (oDatos.admin)
    {
        //LOGUEAR Y COOKIES
        oUsuarioLogueado = oDatos.usuario;
        if(frmInicioSesionAdmin.checkboxMantenerSesionAdmin){
            setCookie("usuario", oDatos.usuario, 30);
        }

        //REDIRECCION A LA PAGINA PRINCIPAL
        location.replace("http://localhost/proyecto/proyecto/");

        //MOSTRAR LAS OPCIONES DE UN ADMIN


    }
    else
    {
        oUsuarioLogueado = oDatos.usuario;
        if(frmInicioSesion.checkboxMantenerSesion){
            setCookie("usuario", oDatos.usuario, 30);
        }
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

