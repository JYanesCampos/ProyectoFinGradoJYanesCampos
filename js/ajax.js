
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
    reservas.forEach(function(reserva) {
        console.log(reserva.fecha_entrada);
        console.log(reserva.fecha_salida);
    /*
        //console.log("Fecha de entrada: "+reserva.fecha_entrada+"\nFecha de salida: "+reserva.fecha_salida);
        //console.log(reserva.fecha_entrada==reserva.fecha_salida);
        let fechaEntrada = Date.parse(reserva.fecha_entrada);
        let fechaSalida = Date.parse(reserva.fecha_salida);

        //date.setDate(date.getDate() + 1)
        //fechaEntrada.setDate(fechaEntrada.getDate() + 1)

        console.log(reserva.fecha_entrada);
        console.log(Date.parse(reserva.fecha_entrada));
    */

        //  SEPARO EN VARIABLES CADA DATO
        let arrayFechaEntrada = reserva.fecha_entrada.split("-");
        console.log(arrayFechaEntrada);

        let arrayFechaSalida = reserva.fecha_salida.split("-");
        console.log(arrayFechaSalida);

        let diaEntrada = arrayFechaEntrada[2];
        let mesEntrada = arrayFechaEntrada[1];
        let annoEntrada = arrayFechaEntrada[0];

        let diaSalida = arrayFechaSalida[2];
        let mesSalida = arrayFechaSalida[1];
        let annoSalida = arrayFechaSalida[0];
        
        console.log("COMPARACIONES WHILE");
        console.log(diaEntrada != diaSalida);
        console.log(mesEntrada != mesSalida);
        console.log(annoEntrada != annoSalida);

        //  MIENTRAS QUE LAS FECHAS NO SEAN IGUALES
        while(diaEntrada != diaSalida
            || mesEntrada != mesSalida
            || annoEntrada != annoSalida)
        {
            console.log("ENTRA EN EL WHILE");
            //document.querySelector('[rel="'+annoEntrada+'-'+mesEntrada+'-'+diaEntrada+'"]').style.backgroundColor = "red";

            //  PARA PARSEAR Y AUMENTAR LA CANTIDAD A UNA VARIABLE
            let auxAumentar;
            
            //  AUMENTAMOS LA CANTIDAD DE LAS VARIABLES PARA IR PINTANDO EN EL CALENDARIO LOS DÍAS RESERVADOS
            if((parseInt(mesEntrada) % 2) != 0){
                if(mesEntrada=="02"){
                    if(diaEntrada=="28"){
                        diaEntrada="01";
                        auxAumentar = parseInt(mesEntrada);
                        auxAumentar++;
                        mesEntrada = "0"+auxAumentar.toString;
                    }else{
                        auxAumentar = parseInt(diaEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            diaEntrada = "0"+auxAumentar.toString;
                        }else{
                            diaEntrada = auxAumentar.toString;
                        }
                    } 
                }else{
                    if(diaEntrada=="30"){
                        diaEntrada="01";
                        auxAumentar = parseInt(mesEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            mesEntrada = "0"+auxAumentar.toString;
                        }else{
                            mesEntrada = auxAumentar.toString;
                        }
                    }else{
                        auxAumentar = parseInt(diaEntrada);
                        auxAumentar++;
                        if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                            diaEntrada = "0"+auxAumentar.toString;
                        }else{
                            diaEntrada = auxAumentar.toString;
                        }
                    } 
                }
            }else{
                if(diaEntrada=="31"){
                    diaEntrada="01";
                    auxAumentar = parseInt(mesEntrada);
                    auxAumentar++;
                    if(auxAumentar<10){         //  SI EL MES ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                        mesEntrada = "0"+auxAumentar.toString;
                    }else{
                        mesEntrada = auxAumentar.toString;
                    }
                }else{
                    auxAumentar = parseInt(diaEntrada);
                    auxAumentar++;
                    if(auxAumentar<10){     //  SI EL DIA ES MENOR QUE 10, DEBERÁ TENER UN 0 DELANTE.
                        diaEntrada = "0"+auxAumentar.toString;
                    }else{
                        diaEntrada = auxAumentar.toString;
                    }
                } 
            }
        }

        //  ULTIMA FECHA DE LA RESERVA
        document.querySelector('[rel="'+annoEntrada+'-'+mesEntrada+'-'+diaEntrada+'"]').style.backgroundColor = "red";

    });

}