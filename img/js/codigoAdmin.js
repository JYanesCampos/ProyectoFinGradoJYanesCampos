"use strict";


document.querySelector("#btnIniciarSesionAdmin").addEventListener("click",function() {iniciarSesionAdmin();},false);


function iniciarSesionAdmin(){
    let admin = 
    {
        email: frmInicioSesionAdmin.emailIniciarSesionAdmin.value.trim(),
        password: frmInicioSesionAdmin.passwordIniciarSesionAdmin.value.trim(),
        mantenerSesion: frmInicioSesionAdmin.checkboxMantenerSesionAdmin.value,
        formulario: "frmInicioSesionAdmin",
    }

    let sAdmin = JSON.stringify(admin);
    let sParametros = "datos=" + sAdmin;

    buscarAdmin(sParametros);
}

function buscarAdmin(sParametros){
    $.post("./php/iniciarAdmin.php", sParametros, procesoRespuestaInicioPagina, "json");
}
