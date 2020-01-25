
//CERRAR MENÚ
$("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#menu-toggle").val("CERRAR MENÚ");
    $("#wrapper").toggleClass("toggled");
  });
  var nombre;
  var pagina;
  
//ABRIR PAGINAS MENÚ
  $(document).ready(function(){
    
            $("#inicio").click(function(){
                nombre = "inicio";
                pagina = "bienvenida.php";
                confirmar(nombre, pagina);
            });
            
            $("#ingresarEmpresa").click(function(){
                nombre = "Ingresar empresa";
                pagina = "ingresarEmpresa.php";
                confirmar(nombre, pagina);
            });
            
            $("#ingresarTrabajador").click(function(){
                nombre = "Ingresar Trabajador";
                pagina = "ingresarTrabajador.php";
                confirmar(nombre, pagina);
            });
            
            $("#nuevoExamen").click(function(){
                nombre = "Nuevo Exámen";
                pagina = "nuevoExamen.php";
                confirmar(nombre, pagina);
            });
            
            $("#revisarExamen").click(function(){
                nombre = "Revisar Exámen";
                pagina = "revisarExamen.php";
                confirmar(nombre, pagina);
            });
            
            $("#interconsulta").click(function(){
                nombre = "Interconsulta";
                pagina = "interconsulta.php";
                confirmar(nombre, pagina);
                
            });
    
            
            

  });

  function confirmar(nombre, pagina){
    r = true;
    //r = confirm("¿Desea ir a "+nombre+"? Podría perder la información que está ingresando");
    if(r==true){
        $("#contenido").load(pagina);      
    }
  }

function limpiarNumero(obj){
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
}


function limpiarRut(obj){

    if(validarRegExp(obj.value,/\D/g)){
        if(obj.value.substr(-1,1) == 'k' || obj.value.substr(-1,1) == 'K'){

        }else{
            obj.value = obj.value.replace(/\D/g,'');
        }
    }
}

function validarFormularioIngresarEmpresa(){
   var valido = false;
   var rutEmpresa = document.getElementById("rutEmpresa").value;
   var dvEmpresa = document.getElementById("dvEmpresa").value; 
   var rutRepresentante = document.getElementById("rutRepresentante").value;
   var dvRepresentante = document.getElementById("dvRepresentante").value;
   var nombreEmpresa = document.getElementById("nombreEmpresa").value;
   var nombreRepresentante = document.getElementById("nombreRepresentante").value;
   var direccionEmpresa = document.getElementById("direccionEmpresa").value;
   var emailEmpresa = document.getElementById("emailEmpresa").value;
   var telefonoEmpresa = document.getElementById("telefonoEmpresa").value;

/*REGEX CAMPOS

nombreEmpresa = ^[a-zA-ZáéíóúÁÉÍÓÚ0-9\s]*$ //El campo puede contener solo letras, números o espacios //
rutEmpresa = ^\d{7,9}$ //El campo debe contener solo números
nombreRepresentante = ^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$//El campo puede contener solo letras y espacios
rutRepresentante =  //^\d{7,9}$ //El campo puede contener solo números
dirección = ^[a-zA-ZáéíóúÁÉÍÓÚ0-9\s]*$ //El campo puede contener solo letras, números o espacios
correoElectronico = ^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$ //El campo debe tener formato de correo. Ej: "correo@correo.cl".
telefono = ^\d{9}$ // El campo debe contener solo números

*/



//VALIDACIONES NOMBRE EMPRESA
if(!validarBlanco(nombreEmpresa)){
    mensajeEnPantalla("Error","Debe completar campo nombre empresa","error");
    return valido;
}

if(nombreEmpresa.length > 128){
    mensajeEnPantalla("Error","Nombre empresa no puede tener más de 128 caracteres","error");
    return valido;
}

if(!validarRegExp(nombreEmpresa,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/) ){
    mensajeEnPantalla("Error","El campo nombre empresa solo puede contener letras, números y/o espacios","error");
    return valido;
}



//VALIDACIONES RUT EMPRESA
if(!validarBlanco(rutEmpresa)){
    mensajeEnPantalla("Error","Debe completar campo rut empresa","error");
    return valido;
}

if(rutEmpresa.length < 7 || rutEmpresa.length > 9 ){
    mensajeEnPantalla("Error","RUT empresa debe tener entre 7 y 9 números","error");
    return valido;
}


if(!validarRegExp(rutEmpresa,/^\d{7,9}$/)){
    mensajeEnPantalla("Error","El campo Rut Empresa solo puede contener números","error");
    return valido;
}

if(!validarRegExp(dvEmpresa,/^[0-9K]{1}$/)){
    mensajeEnPantalla("Error","El campo DV solo puede ser de 0 a 9 o K","error");
    return valido;
}

if(!formulaRut(rutEmpresa,dvEmpresa)){
    mensajeEnPantalla("Error","Rut empresa inválido","error");
    return valido;    
}






//VALIDACIONES NOMBRE REPRESENTANTE

if(!validarBlanco(nombreRepresentante)){
    mensajeEnPantalla("Error","Debe completar campo nombre representante","error");
    return valido;
}

if(nombreRepresentante.length > 128){
    mensajeEnPantalla("Error","Nombre representante no puede tener más de 128 caracteres","error");
    return valido;
}

if(!validarRegExp(nombreRepresentante,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/) ){
    mensajeEnPantalla("Error","El campo nombre representante solo puede contener letras y/o espacios","error");
    return valido;
}






//VALIDACIONES RUT REPRESENTANTE

if(!validarBlanco(rutRepresentante)){
    mensajeEnPantalla("Error","Debe completar campo rut representante","error");
    return valido;
}

if(rutRepresentante.length < 7 || rutRepresentante.length > 9 ){
    mensajeEnPantalla("Error","RUT representante debe tener entre 7 y 9 números","error");
    return valido;
}

if(!validarRegExp(rutRepresentante,/^\d{7,9}$/)){
    mensajeEnPantalla("Error","El campo Rut Representante solo puede contener letras, números y/o espacios","error");
    return valido;
}

if(!validarRegExp(dvRepresentante,/^[0-9K]{1}$/)){
    mensajeEnPantalla("Error","El campo DV solo puede ser de 0 a 9 o K","error");
    return valido;
}

if(!formulaRut(rutRepresentante,dvRepresentante)){
    mensajeEnPantalla("Error","Rut representante inválido","error");
    return valido;
}


//VALIDACIONES DIRECCION EMPRESA (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
 if(validarBlanco(direccionEmpresa)){
    if(direccionEmpresa.length > 64){
        mensajeEnPantalla("Error","Dirección empresa no puede tener más de 64 caracteres","error");
        return valido;
    }
    
    if(!validarRegExp(direccionEmpresa,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)){
        mensajeEnPantalla("Error","El campo Dirección empresa solo puede contener letras, números y espacios","error");
        return valido;
    }
} 

//VALIDAR EMAIL-TELEFONO
if(!validarBlanco(emailEmpresa) && !validarBlanco(telefonoEmpresa)){
    mensajeEnPantalla("Error","Debe completar al menos uno de los campos email o teléfono.","error");
    return valido;
}else{
    
    if(validarBlanco(emailEmpresa)){
    //VALIDACIONES EMAIL EMPRESA
        if(!validarRegExp(emailEmpresa,/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)){
            mensajeEnPantalla("Error","El campo Correo electrónico debe tener el formato 'correo@correo.cl'","error");
            return valido;
        }
        if(emailEmpresa.length > 64){
            mensajeEnPantalla("Error","Email empresa no puede tener más de 64 caracteres","error");
            return valido;
        }
    }

    //VALIDACIONES TELEFONO EMPRESA

    if(validarBlanco(telefonoEmpresa)){
        if(!validarRegExp(telefonoEmpresa,/^\d{7,9}$/)){
            mensajeEnPantalla("Error","El campo Teléfono empresa debe contenter solo números","error");
            return valido;
        }

        if(telefonoEmpresa.length != 9){
            mensajeEnPantalla("Error","El campo telefono empresa debe tener 9 caracteres","error");
            return valido;
        }
    }
    

}

var tituloConfirmacion = "Confirmación de la operacion";
var textoConfirmacion = "Desea agregar los siguientes datos?<br> Nombre empresa:"+nombreEmpresa+"<br> RUT EMPRESA: "+rutEmpresa+"<br>";

/* if(mensajeConfirmacion(tituloConfirmacion,textoConfirmacion)){

} */

/*
var datos = "consulta=empresaExiste&rutEmpresa=".$rutEmpresa;

    $.ajax({
        type:"POST",
        url:"../consultas/insert.php",
        data:datos,
        success:function(r){
            if(r=='empresaExiste'){
                empresaExiste = true;
            }else if(r=='empresaNoExiste'){
                empresaExiste = false;
            }
        }
    }); 


if(!empresaExiste){
     var datos = $('#formNuevoExamen').serialize();

    $.ajax({
        type:"POST",
        url:"../consultas/insert.php",
        data:datos,
        success:function(r){
            if(r==1){
                valido = true;
                mensajeEnPantalla("Éxito","RUT correcto","success");
                
            }else if(r==0){
                mensajeEnPantalla("Error","RUT no existe","error")
            }
        }
    });  
    mensajeEnPantalla("Éxito","Empresa no existe","success");
}else{
    mensajeEnPantalla("Error","Rut de empresa ya se encuentra en uso","error");
}*/



 var datos = $('#formIngresarEmpresa').serialize();
    $.ajax({
        type:"POST",
        url:"../consultas/insert.php",
        data:datos,
        success:function(r){
            if(r==1){
                valido = true;
                mensajeEnPantalla("Éxito","Agregado correctamente","success");
            }else if(r==2){
                mensajeEnPantalla("Error","Rut de empresa ya se encuentra en uso","error");
            }else if(r==0){
                mensajeEnPantalla("Error","No se ha podido agregar la empresa","error")
            }
        }
    });  
}

function validarFormularioIngresarTrabajador(){s
    var valido = false;
    var nombreTrabajador = document.getElementById("nombreTrabajador").value;
    var apellidosTrabajador = document.getElementById("apellidosTrabajador").value;
    var rutTrabajador = document.getElementById("rutTrabajador").value;
    var dvTrabajador = document.getElementById("dvTrabajador").value;     
    var fechaNacimientoTrabajador = document.getElementById("fechaNacimientoTrabajador").value;
    var sexoTrabajador = document.getElementById("sexoTrabajador").value
    var direccionTrabajador = document.getElementById("direccionTrabajador").value;
    var emailTrabajador = document.getElementById("emailTrabajador").value;
    var telefonoTrabajador = document.getElementById("telefonoTrabajador").value;
    var fechaFormateadaNacimientoTrabajador = new Date(fechaNacimientoTrabajador);
    var fechaMinima = new Date("1940-01-01");
    var fechaMaxima = new Date("2002-12-31");    
    var fecha = new Date();

    //VALIDAR CAMPO NOMBRE TRABAJADOR
    if(!validarBlanco(nombreTrabajador)){
        mensajeEnPantalla("Error","Debe completar el campo nombre trabajador","error");
        return valido;        
    }

    if(!validarRegExp(nombreTrabajador,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/) ){
        mensajeEnPantalla("Error","El campo nombre trabajador solo puede contener letras y/o espacios","error");
        return valido;
    }

    if(nombreTrabajador.length > 40){
        mensajeEnPantalla("Error","Nombre empresa no puede tener más de 40 caracteres","error");
        return valido;
    }

    //VALIDAR CAMPO APELLIDOS TRABAJADOR
    if(!validarBlanco(apellidosTrabajador)){
        mensajeEnPantalla("Error","Debe completar el campo apellidos trabajador","error");
        return valido;        
    }

    if(!validarRegExp(apellidosTrabajador,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/) ){
        mensajeEnPantalla("Error","El campo apellidos trabajador solo puede contener letras y/o espacios","error");
        return valido;
    }

    if(apellidosTrabajador.length > 64){
        mensajeEnPantalla("Error","Apellidos trabajador no puede tener más de 64 caracteres","error");
        return valido;
    }


    //VALIDAR CAMPO RUT
    if(!validarBlanco(rutTrabajador)){
        mensajeEnPantalla("Error","Debe completar campo RUT trabajador","error");
        return valido;
    }
    
    if(rutTrabajador.length < 7 || rutTrabajador.length > 9 ){
        mensajeEnPantalla("Error","RUT trabajador debe tener entre 7 y 9 números","error");
        return valido;
    }
    
    if(!validarRegExp(rutTrabajador,/^\d{7,9}$/)){
        mensajeEnPantalla("Error","El campo RUT trabajador puede números","error");
        return valido;
    }
    
    if(!validarRegExp(dvTrabajador,/^[0-9K]{1}$/)){
        mensajeEnPantalla("Error","El campo DV solo puede ser de 0 a 9 o K","error");
        return valido;
    }
    
    if(!formulaRut(rutTrabajador,dvTrabajador)){
        mensajeEnPantalla("Error","Rut trabajador inválido","error");
        return valido;    
    }

    //VALIDAR FECHA
    if(existeFecha(fechaNacimientoTrabajador)){
        mensajeEnPantalla("Error","Fecha no existe o no es válida","error");
        return valido;   
    }

    if(fechaFormateadaNacimientoTrabajador < fechaMinima || fechaFormateadaNacimientoTrabajador > fechaMaxima){
        mensajeEnPantalla("Error","Ingrese una fecha entre 1940-01-01 y 2002-12-31","error");
        return valido;
    }



    //VALIDAR CAMPO SEXO
    if(sexoTrabajador != "Femenino"){
        if(sexoTrabajador != "Masculino"){
            if(sexoTrabajador != "No especifica"){
                mensajeEnPantalla("Error","No me trates de engañar","error"); 
                return valido;  
            }else{
                sexoTrabajador = "3";
            }
        }else{
            sexoTrabajador = "2";
        }
    }else{
        sexoTrabajador = "1";    
    }

    //VALIDACIONES DIRECCION TRABAJADOR (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
    if(validarBlanco(direccionTrabajador)){
        if(direccionTrabajador.length > 64){
            mensajeEnPantalla("Error","Dirección trabajador no puede tener más de 64 caracteres","error");
            return valido;
        }
        
        if(!validarRegExp(direccionTrabajador,/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)){
            mensajeEnPantalla("Error","El campo Dirección empresa solo puede contener letras, números y espacios","error");
            return valido;
        }
    } 




    
//VALIDAR EMAIL-TELEFONO
if(!validarBlanco(emailTrabajador) && !validarBlanco(telefonoTrabajador)){
    mensajeEnPantalla("Error","Debe completar al menos uno de los campos email o teléfono.","error");
    return valido;
}else{
    
    if(validarBlanco(emailTrabajador)){
    //VALIDACIONES EMAIL EMPRESA
        if(!validarRegExp(emailTrabajador,/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)){
            mensajeEnPantalla("Error","El campo Correo electrónico debe tener el formato 'correo@correo.cl'","error");
            return valido;
        }
        if(emailTrabajador.length > 64){
            mensajeEnPantalla("Error","Email trabajador no puede tener más de 64 caracteres","error");
            return valido;
        }
    }

    //VALIDACIONES TELEFONO EMPRESA

    if(validarBlanco(telefonoTrabajador)){
        if(!validarRegExp(telefonoTrabajador,/^\d*$/)){
            mensajeEnPantalla("Error","El campo Teléfono empresa debe contener solo números","error");
            return valido;
        }

        if(telefonoTrabajador.length != 9){
            mensajeEnPantalla("Error","El campo telefono empresa debe tener 9 caracteres","error");
            return valido;
        }
    }
}


var datos = $('#formIngresarTrabajador').serialize();
    $.ajax({
        type:"POST",
        url:"../consultas/insert.php",
        data:datos,
        success:function(r){
            if(r==1){
                valido = true;
                mensajeEnPantalla("Éxito","Agregado correctamente","success");
            }else if(r==2){
                mensajeEnPantalla("Error","Rut de trabajador ya se encuentra en uso","error");
            }else if(r==0){
                mensajeEnPantalla("Error","No se ha podido agregar al trabajador","error")
            }/* else{
                mensajeEnPantalla("Error",r,"error");
            } */
        }
    }); 

return valido;
}

function validarFormularioNuevoExamen(){
    
    valido = false;
    var rutTrabajador = document.getElementById("rutTrabajador").value;
    
    //VALIDAR CAMPO
    if(!validarBlanco(rutTrabajador)){
        mensajeEnPantalla("Error","Debe completar campo RUT","error");
        return valido;
    }

    if(rutTrabajador.length > 13){
        mensajeEnPantalla("Error","El campo no debe tener más de 12 caracteres contando puntos y guión","error");
    }

    if(!validarRegExp(rutTrabajador,/^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)){
        mensajeEnPantalla("Error","Formato no válido.","error");
        return valido;
    }

    
    
return valido;

    mensajeEnPantalla(rutTrabajador,rutTrabajador,"success");
    //formateaRut(rutTrabajador);
    //mensajeEnPantalla("hola","hola");
    return valido;
    
}


//SE APLICA LA FÓRMULA DE RUT CHILENO
function formulaRut(rut,dv){

    //SI EL LARGO DEL RUT ES 7 SE AGREGAN DOS 0 Y SI ES 8 SE AGREGA 1. SI EL LARGO ES 9 SE DEJA IGUAL.
    switch(rut.length){
        case 7:
            rut = "00"+rut;
        break;

        case 8:
            rut = "0"+rut;
        break;

        case 9:
            rut = rut;
        break;
    }

    //SECUENCIA PARA MULTIPLICAR POR DIGITOS DEL RUT
    var valores = [4,3,2,7,6,5,4,3,2];
    //SE INICIALIZA LA SUMA
    var suma = 0;
    
    //SE ITERA PARA MULTIPLICAR EL RUT POR LA SECUENCIA ANTERIOR
    for(i=0;i<rut.length;i++){
        suma += (valores[i]*parseInt(rut.substr(i,1)));
    }

    //SE DIVIDE SUMA EN 11 Y SE OBTIENE EL RESTO (SUMA%11). A 11 SE LE RESTA EL RESTO
    calculodv=11-(suma%11); 

    // SI EL RESTO ES 10 EL DV ES K Y SI ES 11 EL DV ES 0
    switch(calculodv){
        case 10:
            calculodv = 'K'; 
        break;

        case 11:
            calculodv = 0;
        break;
        default:;
    }

    //SI DV Y CALCULO DV SON IGUALES SE RETORNA TRUE O FALSE Y SE PUEDE AVANZAR;
    if(calculodv == dv){
        return true;
    }else{
        return false;
    }

}

//VALIDAR CAMPOS EN BLANCO
function validarBlanco(texto){
    var valido = true;
    
    if(texto==""){
        valido = false;
    }else{
        valido = true;
    }
    return valido;    
}

//MOSTRAR MENSAJES SWEETALERT2
function mensajeEnPantalla(titulo,mensaje,icono){
    Swal.fire(
        titulo,
        mensaje,
        icono
    )
}

function mensajeConfirmacion(tituloConfirmacion, textoConfirmacion){
    Swal.fire({
        title: tituloConfirmacion,
        text: textoConfirmacion,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            valido = true
        }else{
            valido = false
        }

        return valido
      })


}


//VALIDAR EXPRESIONES REGULARES
function validarRegExp(texto,regEx){

    if(regEx.test(texto)){
        return true;
    }else{
        return false;
    }

}

//VALIDAR SI EXISTE FECHA
function existeFecha(fecha){
    var fechaf = fecha.split("-");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year,month,'0');
    if((day-0)>(date.getDate()-0)){
          return false;
    }
    return true;
}

//FORMATEA EL RUT
function formateaRut(rut){

    
    if(rut.value.length >= 2){

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
        document.getElementById("rutTrabajador").value = rutPuntos;
    }
 
    
}
