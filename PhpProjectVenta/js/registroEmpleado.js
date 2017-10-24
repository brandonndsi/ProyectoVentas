

function cambiarCheckActivo() {

    if (document.getElementById("activo").checked) {

        document.getElementById("inactivo").checked = false;
    }

}
function cambiarCheckInactivo() {

    if (document.getElementById("inactivo").checked) {

        document.getElementById("activo").checked = false;
    }

}
