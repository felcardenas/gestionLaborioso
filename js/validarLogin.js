function formatoRut(){
    var rut = document.getElementById("rut").value;
    var password = document.getElementById("password").value;

    var regEx = /^[1-9]{1,2}[0-9]{3}[0-9]{3}\-[0-9Kk]{1}$/;
    //console.log("hola");
    
    /*if(!regEx.test(rut)){
        alert("Debe ingresar el RUT con el formato 11111111-1");
        return false;
    }else{
        alert("OK");
        return true;
    }*/
}



/* EXPRESION REGULAR CONTRASEÑA Y SU EXPLICACIÓN 
  regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  
  (?=.*\d)          // should contain at least one digit
  (?=.*[a-z])       // should contain at least one lower case
  (?=.*[A-Z])       // should contain at least one upper case
  [a-zA-Z0-9]{8,}   // should contain at least 8 from the mentioned characters
*/


function formateaRut(rut) {

    if (rut.value.length >= 2) {

        rut = rut.value;
        var actual = rut.replace(/^0+/, "");
        if (actual != '' && actual.length > 1) {
            var sinPuntos = actual.replace(/\./g, "");
            var actualLimpio = sinPuntos.replace(/-/g, "");
            var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
            var rutPuntos = "";
            var i = 0;
            var j = 1;
            for (i = inicio.length - 1; i >= 0; i--) {
                var letra = inicio.charAt(i);
                rutPuntos = letra + rutPuntos;
                if (j % 3 == 0 && j <= inicio.length - 1) {
                    rutPuntos = "." + rutPuntos;
                }
                j++;
            }
            var dv = actualLimpio.substring(actualLimpio.length - 1);
            rutPuntos = rutPuntos + "-" + dv;
        }
        document.getElementById("rut").value = rutPuntos;
    }


}




function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
}

function validarRut(){
 
    var rut = document.getElementById('rut').value;
    alert(rut);


    /* if(rut == ''){
        mensajeEnPantalla("Error","Campo RUT vacío","error");
        return false;
    }
    
    if(rut.length < 11){
        mensajeEnPantalla("Error","","error");
        return false;
    }

    
    if(rut.length == 11 && rut.length != 12 ){
        mensajeEnPantalla("Error","El campo debe tener 8 a 9 dígitos","error");
        return false;
    }
    
    if(!validarRegExp(rut)){
        mensajeEnPantalla("Error","El campo solo puede tener números, puntos y guión","error");
        return false;
    }
 */
    //return true;
}


function mensajeEnPantalla(titulo, mensaje, icono) {
    Swal.fire(
        titulo,
        mensaje,
        icono
    )
}

function validarRegExp(texto) {
    var regEx = /^[1-9]{1,2}[0-9]{3}[0-9]{3}\-[0-9Kk]{1}$/;

    if (regEx.test(texto)) {
        return true;
    } else {
        return false;
    }

}

/*function validarRUT(){
    var rut = document.getElementById("rut").value;
    console.log(rut);

        
    if(rut.length > 0 && rut.length <= 3){

    }else if{

    }


    return false;
}*/


