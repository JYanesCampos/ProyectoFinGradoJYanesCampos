
"use strict";

function procesoRespuestaFormulario(oDatos, sStatus, oXHR) 
{

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
        
        if(oDatos.formulario == "frmInicioSesion")
        {
            oUsuarioLogueado = oDatos.usuario;
            if(oDatos.mantenerSesion){                
                let sUsuario = JSON.stringify(oDatos.usuario);
                setCookie("usuario", sUsuario, 30);
            }
            
            document.getElementById(oDatos.formulario).reset();

            mostrarArea("containerHome");
            mostrarNavBarLogueado();
            alert(oDatos.mensaje);
        }

        if(oDatos.formulario == "frmRegistroUsuario")
        {
            mostrarArea("containerIniciarSesion");
            document.getElementById(oDatos.formulario).reset();
            alert(oDatos.mensaje);
        }
    }
}

/*
function procesoRespuestaInicioPagina(oDatos, sStatus, oXHR) {

    //BORRAR

    if(oDatos==undefined || oDatos==null)
    {  
        
    }
    else if (oDatos.admin)
    {
        //LOGUEAR Y COOKIES
        oUsuarioLogueado = oDatos.usuario;
        if(frmInicioSesionAdmin.checkboxMantenerSesionAdmin){
            setCookie("usuario", oDatos.usuario, 30);
            setCookie("admin", true, 30);
        }

        //REDIRECCION A LA PAGINA PRINCIPAL
        location.replace("http://localhost/proyecto/proyecto/");

        //MOSTRAR LAS OPCIONES DE UN ADMIN
        mostrarNavBarLogueado();
        
    }
    else
    {
        oUsuarioLogueado = oDatos.usuario;
        if(frmInicioSesion.checkboxMantenerSesion){
            setCookie("usuario", oDatos.usuario, 30);
        }
    }
}
*/

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

//  PINTAR EL CALENDARIO MEDIANTE UN JSON CON LAS FECHAS DE LAS RESERVAS.
function procesoReservasCalendario(reservas){

    //  POR CADA RESERVA
    reservas.forEach(function(reserva) 
    {
        //  SEPARO EN VARIABLES CADA DATO
        let fechaEntrada = reserva.fecha_entrada;
        let fechaSalida = reserva.fecha_salida;

        let arrayFechaEntrada = fechaEntrada.split("-");

        let arrayFechaSalida = fechaSalida.split("-");

        let diaEntrada = arrayFechaEntrada[2];
        let mesEntrada = arrayFechaEntrada[1];
        let annoEntrada = arrayFechaEntrada[0];

        /*
        let diaSalida = arrayFechaSalida[2];
        let mesSalida = arrayFechaSalida[1];
        let annoSalida = arrayFechaSalida[0];
        */

        //  MIENTRAS QUE LAS FECHAS NO SEAN IGUALES
        while(fechaEntrada!=fechaSalida)
        {
            document.querySelector('[rel="'+fechaEntrada+'"]').style.backgroundColor = "red";

            //  PARA PARSEAR Y AUMENTAR LA CANTIDAD A UNA VARIABLE
            let auxAumentar;
            
            //  AUMENTAMOS LA CANTIDAD DE LAS VARIABLES PARA IR PINTANDO EN EL CALENDARIO LOS DÍAS RESERVADOS
            if( !(parseInt(mesEntrada) % 2)){
                if(mesEntrada=="02"){
                    if(diaEntrada=="28"){
                        diaEntrada="01";
                        auxAumentar = parseInt(mesEntrada);
                        auxAumentar++;
                        mesEntrada = "0"+auxAumentar.toString();
                    }else{
                        auxAumentar = parseInt(diaEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            diaEntrada = "0"+auxAumentar.toString();
                        }else{
                            diaEntrada = auxAumentar.toString();
                        }
                    } 
                }else{
                    if(diaEntrada=="30"){
                        diaEntrada="01";
                        auxAumentar = parseInt(mesEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            mesEntrada = "0"+auxAumentar.toString();
                        }else{
                            mesEntrada = auxAumentar.toString();
                        }
                    }else{
                        auxAumentar = parseInt(diaEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            diaEntrada = "0"+auxAumentar.toString();
                        }else{
                            diaEntrada = auxAumentar.toString();
                        }
                    } 
                }
            }else{
                if(diaEntrada=="31"){
                    diaEntrada="01";
                    auxAumentar = parseInt(mesEntrada);
                    auxAumentar++;
                    if(auxAumentar<10){         //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                        mesEntrada = "0"+auxAumentar.toString();
                    }else{
                        mesEntrada = auxAumentar.toString();
                    }
                }else{
                    auxAumentar = parseInt(diaEntrada);
                    auxAumentar++;
                    if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                        diaEntrada = "0"+auxAumentar.toString();
                    }else{
                        diaEntrada = auxAumentar.toString();
                    }
                } 
            }

            fechaEntrada = annoEntrada+"-"+mesEntrada+"-"+diaEntrada;
        }

        //  ULTIMA FECHA DE LA RESERVA
        document.querySelector('[rel="'+fechaSalida+'"]').style.backgroundColor = "red";

    });

}

function procesoReservaFechas(oDatos){
    if(oDatos.error){
        mensaje(oDatos.mensaje);
    }else{
        mensaje(oDatos.mensaje);
        document.getElementById("reservaFechaInicio").value = "";
        document.getElementById("reservaFechaFinal").value = "";
        pintarReservasCalendario();
    }
}