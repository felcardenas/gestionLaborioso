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



function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
}



/*function validarRUT(){
    var rut = document.getElementById("rut").value;
    console.log(rut);

        
    if(rut.length > 0 && rut.length <= 3){

    }else if{

    }


    return false;
}*/


