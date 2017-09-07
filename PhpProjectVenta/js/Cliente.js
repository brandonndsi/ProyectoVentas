
//Nombramos la función
function validarEnvia(){

//Definimos los caracteres permitidos en una dirección de correo electrónico
var regexp = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;

//Validamos el campo de nombre.
if (document.form.personanombre.value.length==0){
alert("Tiene que escribir su nombre")
document.form.personanombre.focus()
//return 0;
}

//Validamos un campo de apellido1 de cliente.
if (document.form.personaapellido1.value.length==0){
alert("Tiene que escribir el primer apellido.")
document.form.personaapellido1.focus()
//return 0;
}

//Validamos un campo de apellido2 de cliente.
if (document.form.personaapellido2.value.length==0){
alert("Tiene que escribir el segundo apellido.")
document.form.personaapellido2.focus()
//return 0;
}

//Validamos un campo de telefono de cliente.personacorreo
if (document.form.personatelefono.value.length==0){
alert("Tiene que escribir telefono.")
document.form.personatelefono.focus()
//return 0;
}

//Validamos un campo de cliente de cliente.
if (document.form.personacorreo.value.length==0){
alert("Tiene que escribir el correo.")
document.form.personacorreo.focus()
//return 0;
}

//Validamos un campo de descuento clienteacumulado
if (document.form.clientedescuento.value.length==0){
alert("Tiene que escribir el descuento.")
document.form.clientedescuento.focus()
//return 0;
}

//Validamos un campo de acumulado  zonaid
if (document.form.clienteacumulado.value.length==0){
alert("Tiene que escribir el acumulado.")
document.form.clienteacumulado.focus()
//return 0;
}

//Validamos un campo de zonaid clienteestado
if (document.form.zonaid.value.length==0){
alert("Tiene que escribir la zona.")
document.form.zonaid.focus()
//return 0;
}

//Validamos un campo de estado  clientedireccionexacta
if (document.form.clienteestado.value.length==0){
alert("Tiene que escribir el estado.")
document.form.clienteestado.focus()
//return 0;
}

//Validamos un campo de direccion exacta
if (document.form.clientedireccionexacta.value.length==0){
alert("Tiene que escribir la direccion exacta.")
document.form.clientedireccionexacta.focus()
//return 0;
}

//___________________________________________________________
//Validamos un campo o área de texto, por ejemplo el campo dirección
/*if (document.form.direccion.value.length==0){
alert("Tiene que escribir su dirección")
document.form.direccion.focus()
return 0;
}

//Validamos un campo o área de texto, por ejemplo el campo localidad
if (document.form.localidad.value.length==0){
alert("Tiene que escribir su localidad")
document.form.localidad.focus()
return 0;
}

//Validamos un campo de lista/menú, por ejemplo el campo provincia
if (document.form.provincia.selectedIndex==0){
alert("Tiene que seleccionar su provincia")
document.form.provincia.focus()
return 0;
}

//Validamos un campo de texto como numérico, por ejemplo el campo código postal de 5 dígitos
valor = document.form.cp.value;
if( !(/^\d{5}$/.test(valor)) ) {
alert("Tiene que escribir su código postal (5 dígitos)");
document.form.cp.focus();
return 0;
}

//Validamos un campo de texto como numérico, por ejemplo el campo teléfono de 9 dígitos
valor = document.form.telefono.value;
if( !(/^\d{9}$/.test(valor)) ) {
alert("Tiene que escribir un teléfono de 9 dígitos");
document.form.telefono.focus();
return 0;
}

//Validamos un campo de texto como email
if ((regexp.test(document.form.email.value) == 0) || (document.form.email.value.length = 0)){
alert("Introduzca una dirección de email válida");
document.form.email.focus();
return 0;
} else {
var c_email=true;
}

//Validamos un campo de tipo checkbox, por ejemplo condiciones
if (document.form.condiciones.checked==0){
alert("Debe aceptar las condiciones")
document.form.condiciones.focus()
return 0;
}
*/
//Si todos los campos han validado correctamente, se envía el formulario
document.form.submit();
}

//Cerramos el Script