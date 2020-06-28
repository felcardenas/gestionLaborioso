
$(document).ready(function() {
    $('.selectpicker').selectpicker();
 });

//CERRAR MENÚ
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#menu-toggle").val("CERRAR MENÚ");
    $("#wrapper").toggleClass("toggled");
});
var nombre;
var pagina;

//ABRIR PAGINAS MENÚ
$(document).ready(function () {

    $("#inicio").click(function () {
        nombre = "inicio";
        pagina = "bienvenida.php";
        confirmar(nombre, pagina);
    });

    $("#btnMenuEmpresa").click(function () {
        nombre = "Ingresar empresa";
        pagina = "menuEmpresa.php";
        confirmar(nombre, pagina);
    });

    $("#btnMenuTrabajador").click(function () {
        nombre = "Ingresar Trabajador";
        pagina = "menuTrabajador.php";
        confirmar(nombre, pagina);
    });

    $("#nuevoExamen").click(function () {
        nombre = "Nuevo Exámen";
        pagina = "nuevoExamen.php";
        confirmar(nombre, pagina);
    });

    $("#revisarExamen").click(function () {
        nombre = "Revisar Exámen";
        pagina = "revisarExamen.php";
        confirmar(nombre, pagina);
    });

    $("#interconsulta").click(function () {
        nombre = "Interconsulta";
        pagina = "interconsulta.php";
        confirmar(nombre, pagina);

    });

    $("#informes").click(function () {
        nombre = "Interconsulta";
        pagina = "informes.php";
        confirmar(nombre, pagina);

    });

    

});





function nuevoExamen(){
        $("#contenido").load("nuevoExamen.php");
}

function confirmar(nombre, pagina) {
    r = true;
    //r = confirm("¿Desea ir a "+nombre+"? Podría perder la información que está ingresando");
    if (r == true) {
        $("#contenido").load(pagina);
    }
}

function validarFormularioIngresarEmpresa() {
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
    if (!validarBlanco(nombreEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo nombre empresa", "error");
        return valido;
    }

    if (nombreEmpresa.length > 128) {
        mensajeEnPantalla("Error", "Nombre empresa no puede tener más de 128 caracteres", "error");
        return valido;
    }

    if (!validarRegExp(nombreEmpresa, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre empresa solo puede contener letras, números y/o espacios", "error");
        return valido;
    }



    //VALIDACIONES RUT EMPRESA
    if (!validarBlanco(rutEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo rut empresa", "error");
        return valido;
    }

    if (rutEmpresa.length < 7 || rutEmpresa.length > 9) {
        mensajeEnPantalla("Error", "RUT empresa debe tener entre 7 y 9 números", "error");
        return valido;
    }


    if (!validarRegExp(rutEmpresa, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo Rut Empresa solo puede contener números", "error");
        return valido;
    }

    if (!validarRegExp(dvEmpresa, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutEmpresa, dvEmpresa)) {
        mensajeEnPantalla("Error", "Rut empresa inválido", "error");
        return valido;
    }






    //VALIDACIONES NOMBRE REPRESENTANTE

    if (!validarBlanco(nombreRepresentante)) {
        mensajeEnPantalla("Error", "Debe completar campo nombre representante", "error");
        return valido;
    }

    if (nombreRepresentante.length > 128) {
        mensajeEnPantalla("Error", "Nombre representante no puede tener más de 128 caracteres", "error");
        return valido;
    }

    if (!validarRegExp(nombreRepresentante, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre representante solo puede contener letras y/o espacios", "error");
        return valido;
    }






    //VALIDACIONES RUT REPRESENTANTE

    if (!validarBlanco(rutRepresentante)) {
        mensajeEnPantalla("Error", "Debe completar campo rut representante", "error");
        return valido;
    }

    if (rutRepresentante.length < 7 || rutRepresentante.length > 9) {
        mensajeEnPantalla("Error", "RUT representante debe tener entre 7 y 9 números", "error");
        return valido;
    }

    if (!validarRegExp(rutRepresentante, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo Rut Representante solo puede contener letras, números y/o espacios", "error");
        return valido;
    }

    if (!validarRegExp(dvRepresentante, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutRepresentante, dvRepresentante)) {
        mensajeEnPantalla("Error", "Rut representante inválido", "error");
        return valido;
    }


    //VALIDACIONES DIRECCION EMPRESA (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
    if(!validarBlanco(direccionEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo Dirección empresa", "error");
        return valido;
    }
        
    if (direccionEmpresa.length > 64) {
            mensajeEnPantalla("Error", "Dirección empresa no puede tener más de 64 caracteres", "error");
            return valido;
    }

    if (!validarRegExp(direccionEmpresa, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
        mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
         return valido;
    }
    

    //VALIDAR EMAIL-TELEFONO
   

        if (!validarBlanco(emailEmpresa)) {
            mensajeEnPantalla("Error", "Debe completar campo Email empresa", "error");
            return valido;
        }
            if (!validarRegExp(emailEmpresa, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailEmpresa.length > 64) {
                mensajeEnPantalla("Error", "Email empresa no puede tener más de 64 caracteres", "error");
                return valido;
            }
        

        //VALIDACIONES TELEFONO EMPRESA

        if (!validarBlanco(telefonoEmpresa)) {
            mensajeEnPantalla("Error", "Debe completar campo teléfono", "error");
            return valido;
        }
            if (!validarRegExp(telefonoEmpresa, /^\d{7,9}$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contenter solo números", "error");
                return valido;
            }

            if (telefonoEmpresa.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
        

        /* if (!validarBlanco(emailEmpresa) && !validarBlanco(telefonoEmpresa)) {
            mensajeEnPantalla("Error", "Debe completar al menos uno de los campos email o teléfono.", "error");
            return valido;
        } else {
    } */

    var tituloConfirmacion = "Confirmación de la operacion";
    var textoConfirmacion = "Desea agregar los siguientes datos?<br> Nombre empresa:" + nombreEmpresa + "<br> RUT EMPRESA: " + rutEmpresa + "<br>";

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
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 1) {
                valido = true;
                mensajeEnPantalla("Éxito", "Agregado correctamente", "success");
            } else if (r == 2) {
                mensajeEnPantalla("Error", "Rut de empresa ya se encuentra en uso", "error");
            } else if (r == 0) {
                mensajeEnPantalla("Error", "No se ha podido agregar la empresa", "error")
            }
        }
    });
}

function validarRutEmpresa(){
    var datos = $('#formIngresarEmpresa').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/validarRut.php",
        data: datos,
        success: function (r) {
            if (r == 2) {
                mensajeEnPantalla("Error", "Rut de empresa ya se encuentra en uso", "error");
            }
        }
    });
}

function validarFormularioIngresarTrabajador() {
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
    if (!validarBlanco(nombreTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar el campo nombre trabajador", "error");
        return valido;
    }

    if (!validarRegExp(nombreTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre trabajador solo puede contener letras y/o espacios", "error");
        return valido;
    }

    if (nombreTrabajador.length > 40) {
        mensajeEnPantalla("Error", "Nombre empresa no puede tener más de 40 caracteres", "error");
        return valido;
    }

    //VALIDAR CAMPO APELLIDOS TRABAJADOR
    if (!validarBlanco(apellidosTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar el campo apellidos trabajador", "error");
        return valido;
    }

    if (!validarRegExp(apellidosTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo apellidos trabajador solo puede contener letras y/o espacios", "error");
        return valido;
    }

    if (apellidosTrabajador.length > 64) {
        mensajeEnPantalla("Error", "Apellidos trabajador no puede tener más de 64 caracteres", "error");
        return valido;
    }


    //VALIDAR CAMPO RUT
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT trabajador", "error");
        return valido;
    }

    if (rutTrabajador.length < 7 || rutTrabajador.length > 9) {
        mensajeEnPantalla("Error", "RUT trabajador debe tener entre 7 y 9 números", "error");
        return valido;
    }

    if (!validarRegExp(rutTrabajador, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo RUT trabajador puede números", "error");
        return valido;
    }

    if (!validarRegExp(dvTrabajador, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutTrabajador, dvTrabajador)) {
        mensajeEnPantalla("Error", "Rut trabajador inválido", "error");
        return valido;
    }

    //VALIDAR FECHA
    if (existeFecha(fechaNacimientoTrabajador)) {
        mensajeEnPantalla("Error", "Fecha no existe o no es válida", "error");
        return valido;
    }

    if (fechaFormateadaNacimientoTrabajador < fechaMinima || fechaFormateadaNacimientoTrabajador > fechaMaxima) {
        mensajeEnPantalla("Error", "Ingrese una fecha entre 1940-01-01 y 2002-12-31", "error");
        return valido;
    }



    //VALIDAR CAMPO SEXO
    if (sexoTrabajador != "Femenino") {
        if (sexoTrabajador != "Masculino") {
            if (sexoTrabajador != "No especifica") {
                mensajeEnPantalla("Error", "No me trates de engañar", "error");
                return valido;
            } else {
                sexoTrabajador = "3";
            }
        } else {
            sexoTrabajador = "2";
        }
    } else {
        sexoTrabajador = "1";
    }

    //VALIDACIONES DIRECCION TRABAJADOR (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
    if (!validarBlanco(direccionTrabajador)){
        mensajeEnPantalla("Error", "Debe completar campo Dirección trabajador ", "error");
        return valido;
    }
        if (direccionTrabajador.length > 64) {
            mensajeEnPantalla("Error", "Dirección trabajador no puede tener más de 64 caracteres", "error");
            return valido;
        }

        if (!validarRegExp(direccionTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
            mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
            return valido;
        }
    

    



    //VALIDAR EMAIL-TELEFONO
    
        if (!validarBlanco(emailTrabajador)) {
            mensajeEnPantalla("Error", "Debe completar campo Email trabajador ", "error");
            return valido;
        }
            //VALIDACIONES EMAIL EMPRESA
            if (!validarRegExp(emailTrabajador, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailTrabajador.length > 64) {
                mensajeEnPantalla("Error", "Email trabajador no puede tener más de 64 caracteres", "error");
                return valido;
            }
        

        //VALIDACIONES TELEFONO EMPRESA

        if(!validarBlanco(telefonoTrabajador)) {
            mensajeEnPantalla("Error", "Debe completar campo Teléfono trabajador ", "error");
            return valido;
        }
            if (!validarRegExp(telefonoTrabajador, /^\d*$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contener solo números", "error");
                return valido;
            }

            if (telefonoTrabajador.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
        
    


    var datos = $('#formIngresarTrabajador').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 1) {
                valido = true;
                mensajeEnPantalla("Éxito", "Agregado correctamente", "success");
            } else if (r == 2) {
                mensajeEnPantalla("Error", "Rut de trabajador ya se encuentra en uso", "error");
            } else if (r == 0) {
                mensajeEnPantalla("Error", "No se ha podido agregar al trabajador", "error")
            }/* else{
                mensajeEnPantalla("Error",r,"error");
            } */
        }
    });

    return valido;
}

function funcionesRutEmpresa(valor){
    limpiarNumero(valor);
    validarRutEmpresa();
}

function validarRutTrabajador(){
    var datos = $('#formIngresarTrabajador').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/validarRut.php",
        data: datos,
        success: function (r) {
            if (r == 2) {
                mensajeEnPantalla("Error", "Rut de trabajador ya se encuentra en uso", "error");
            }
        }
    });
}

function funcionesRutTrabajador(valor){
    limpiarNumero(valor);
    validarRutTrabajador();
}


function validarFormularioNuevoExamen() {

    valido = false;
    var rutTrabajador = document.getElementById("rutTrabajador").value;

    //VALIDAR CAMPO
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT", "error");
        return valido;
    }

    if (rutTrabajador.length > 13) {
        mensajeEnPantalla("Error", "El campo no debe tener más de 12 caracteres contando puntos y guión", "error");
    }

    if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    }

    var datos = $('#formNuevoExamen').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.location.replace("nuevoexamen");
            } else if (r == 'false') {
                mensajeEnPantalla("Trabajador no existe", "Seleccione 'Ingresar trabajador' en el menú de la izquierda para agregar un nuevo trabajador", "error");
            }
            //alert(r);
        }
    });

    return valido;
}

function validarFormularioRevisarExamen(){
    valido = false;
    var rutTrabajador = document.getElementById("rutTrabajador").value;

    //VALIDAR CAMPO
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT", "error");
        return valido;
    }

    if (rutTrabajador.length > 13) {
        mensajeEnPantalla("Error", "El campo no debe tener más de 12 caracteres contando puntos y guión", "error");
    }

    if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    }

    var datos = $('#formRevisarExamen').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.location.replace("revisarexamen");
            } else if (r == 'false') {
                mensajeEnPantalla("Trabajador no existe", "Debe ingresar un nuevo trabajador (opción 'Nuevo trabajador') y realizar un examen (opción 'Nuevo exámen')", "error");
            }
        }
    });

    return valido;if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    }

    var datos = $('#formRevisarExamen').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.location.replace("revisarexamen");
            } else if (r == 'false') {
                mensajeEnPantalla("Trabajador no existe", "Debe ingresar un nuevo trabajador (opción 'Nuevo trabajador') y realizar un examen (opción 'Nuevo exámen')", "error");
            }
        }
    });

    return valido;
}

function validarFormularioInformes(){
    valido = false;
    var rutTrabajador = document.getElementById("rutTrabajador").value;

    //VALIDAR CAMPO
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT", "error");
        return valido;
    }

    if (rutTrabajador.length > 13) {
        mensajeEnPantalla("Error", "El campo no debe tener más de 12 caracteres contando puntos y guión", "error");
    }

    if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    }
    

    var datos = $('#formInformes').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.location.replace("informes");
            } else if (r == 'false') {
                mensajeEnPantalla("Trabajador no existe", "Debe ingresar un nuevo trabajador (opción 'Nuevo trabajador') y realizar un examen (opción 'Nuevo exámen')", "error");
            }
            alert(r);
        }
    });

    return valido;if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    }

    var datos = $('#formRevisarExamen').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.location.replace("revisarexamen");
            } else if (r == 'false') {
                mensajeEnPantalla("Trabajador no existe", "Debe ingresar un nuevo trabajador (opción 'Nuevo trabajador') y realizar un examen (opción 'Nuevo exámen')", "error");
            }
        }
    });

    return valido;
}

function validarEmpresaYCargo(){
    
    var cargoTrabajador = document.getElementById('cargoTrabajador').value;
    var nombreEmpresa = document.getElementById('nombreEmpresa').value;

    if(!validarBlanco(cargoTrabajador)){
        mensajeEnPantalla("Campo cargo es obligatorio","","error");
        return false;
    }

    if(!validarBlanco(nombreEmpresa)){
        mensajeEnPantalla("Campo empresa no puede estar en blanco");
        return false;
    }

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {        
            var datos = $('#formEmpresaYCargo').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    
                    if (r == 'true') {
                        window.location.replace("signosvitales.php");
                        
                    }
                    
                }
            });
        
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
})
  
    
} 


function validarSignosVitales() {
    var valido = false;

    var pulso = document.getElementById("pulso").value;
    var tensionDiastolica = document.getElementById("tensionDiastolica").value;
    var tensionSistolica = document.getElementById("tensionSistolica").value;
    var peso = document.getElementById("peso").value;
    var altura = document.getElementById("altura").value;




    //VALIDACIONES CAMPO PULSO
    if (!validarBlanco(pulso)) {
        mensajeEnPantalla("Debe rellenar el campo pulso", "", "error");
        return valido;
    }

    if (!validarRegExp(pulso, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo pulso debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (pulso > 200 || pulso < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo pulso", "", "error");
        return valido;
    }

    //VALIDACIONES CAMPO TENSION DIASTÓLICA
    if (!validarBlanco(tensionDiastolica)) {
        mensajeEnPantalla("Debe rellenar el campo tensión diastólica", "", "error");
        return valido;
    }

    if (!validarRegExp(tensionDiastolica, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo tensión diastólica debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (tensionDiastolica > 300 || tensionDiastolica < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo tensión diastólica", "", "error");
        return valido;
    }



    //VALIDACION CAMPO TENSION SISTÓLICA
    if (!validarBlanco(tensionSistolica)) {
        mensajeEnPantalla("Debe rellenar el campo tensión sistólica", "", "error");
        return valido;
    }

    if (!validarRegExp(tensionSistolica, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo tensión sistólica debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (tensionSistolica > 300 || tensionSistolica < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo tensión sistólica", "", "error");
        return valido;
    }


    //VALIDACIONES CAMPO PESO
    if (!validarBlanco(peso)) {
        mensajeEnPantalla("Debe rellenar el campo peso", "", "error");
        return valido;
    }

    if (!validarRegExp(peso, /^\d{1,3}\.{0,1}\d{1}$/)) {
        mensajeEnPantalla("Campo peso debe ser rellenado con un número entero o un número con un decimal separado por un punto. <br><br><br><br>Ej:'100.1'", "", "error");
        return valido;
    }


    if (peso > 300 || peso < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo peso", "", "error");
        return valido;
    }



    //VALIDACIONES CAMPO ALTURA
    if (!validarBlanco(altura)) {
        mensajeEnPantalla("Debe rellenar el campo altura", "", "error");
        return valido;
    }

    if (!validarRegExp(altura, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo altura debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (altura > 300 || altura < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo altura", "", "error");
        return valido;
    }

    pregunta = "¿Segur@ que desea ingresar los siguientes datos?";
    texto = "Pulso: " + pulso + " - Tensión diastólica: " + tensionDiastolica + " - Tensión sistólica: " + tensionSistolica + "- Peso: " + peso + "- Altura: " + altura;

    Swal.fire({
        title: pregunta,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            confirmacion = true;

        } else {
            confirmacion = false;
        }

        if (confirmacion) {

            //mensajeEnPantalla("Se ingresaron los datos","","success");

            var datos = $('#formSignosVitales').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    if (r == 'true') {
                        //document.getElementById("formSignosVitales").submit(); 
                        window.location.replace("seleccionexamenes.php");
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    } else if( r== 'maxSignosVitales'){
                        mensajeEnPantalla("Se ha llegado al límite de ingreso de Signos Vitales (3)")
                    }
                    //alert(r);
                }
            });



        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
            return false;
        }

    })




    /*  */

    /*alert(confirmacion);

    if(confirmacion == true){
        mensajeEnPantalla("ok","ok","success");
    }else{
        mensajeEnPantalla("no ok","no ok","error");
    } */





    /* if(mensajeConfirmacion(pregunta,texto)==true){
        alert("a");
    }else{
        alert("b");
    } */




}

function examenSignosVitales() {
    var valido = false;

    var pulso = document.getElementById("pulso").value;
    var tensionDiastolica = document.getElementById("tensionDiastolica").value;
    var tensionSistolica = document.getElementById("tensionSistolica").value;
    var peso = document.getElementById("peso").value;
    var altura = document.getElementById("altura").value;




    //VALIDACIONES CAMPO PULSO
    if (!validarBlanco(pulso)) {
        mensajeEnPantalla("Debe rellenar el campo pulso", "", "error");
        return valido;
    }

    if (!validarRegExp(pulso, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo pulso debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (pulso > 200 || pulso < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo pulso", "", "error");
        return valido;
    }

    //VALIDACIONES CAMPO TENSION DIASTÓLICA
    if (!validarBlanco(tensionDiastolica)) {
        mensajeEnPantalla("Debe rellenar el campo tensión diastólica", "", "error");
        return valido;
    }

    if (!validarRegExp(tensionDiastolica, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo tensión diastólica debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (tensionDiastolica > 300 || tensionDiastolica < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo tensión diastólica", "", "error");
        return valido;
    }



    //VALIDACION CAMPO TENSION SISTÓLICA
    if (!validarBlanco(tensionSistolica)) {
        mensajeEnPantalla("Debe rellenar el campo tensión sistólica", "", "error");
        return valido;
    }

    if (!validarRegExp(tensionSistolica, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo tensión sistólica debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (tensionSistolica > 300 || tensionSistolica < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo tensión sistólica", "", "error");
        return valido;
    }


    //VALIDACIONES CAMPO PESO
    if (!validarBlanco(peso)) {
        mensajeEnPantalla("Debe rellenar el campo peso", "", "error");
        return valido;
    }

    if (!validarRegExp(peso, /^\d{1,3}\.{0,1}\d{1}$/)) {
        mensajeEnPantalla("Campo peso debe ser rellenado con un número entero o un número con un decimal separado por un punto. <br><br><br><br>Ej:'100.1'", "", "error");
        return valido;
    }


    if (peso > 300 || peso < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo peso", "", "error");
        return valido;
    }



    //VALIDACIONES CAMPO ALTURA
    if (!validarBlanco(altura)) {
        mensajeEnPantalla("Debe rellenar el campo altura", "", "error");
        return valido;
    }

    if (!validarRegExp(altura, /^\d{1,3}$/)) {
        mensajeEnPantalla("Campo altura debe ser rellenado con un número entero", "", "error");
        return valido;
    }

    if (altura > 300 || altura < 1) {
        mensajeEnPantalla("Ingrese un valor valido en el campo altura", "", "error");
        return valido;
    }

    pregunta = "¿Segur@ que desea ingresar los siguientes datos?";
    texto = "Pulso: " + pulso + " - Tensión diastólica: " + tensionDiastolica + " - Tensión sistólica: " + tensionSistolica + "- Peso: " + peso + "- Altura: " + altura;

    Swal.fire({
        title: pregunta,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            confirmacion = true;

        } else {
            confirmacion = false;
        }

        if (confirmacion) {

            //mensajeEnPantalla("Se ingresaron los datos","","success");

            var datos = $('#formSignosVitales').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    
                    if (r == 'true') {
                        
                        //document.getElementById("formSignosVitales").submit(); 
                        //window.location.replace("seleccionexamenes.php");
                        //mensajeEnPantalla("Se han ingresado los datos", "", "success");
                        location.reload();
                        mostrarSignosVitales();
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    }else if( r== 'maxSignosVitales'){
                        mensajeEnPantalla("Se ha llegado al límite de ingreso de Signos Vitales (3)","","error");
                    }
                    
                }
            });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
            return false;
        }

    })




    /*  */

    /*alert(confirmacion);

    if(confirmacion == true){
        mensajeEnPantalla("ok","ok","success");
    }else{
        mensajeEnPantalla("no ok","no ok","error");
    } */





    /* if(mensajeConfirmacion(pregunta,texto)==true){
        alert("a");
    }else{
        alert("b");
    } */




}

function guardarPerfilLipidico() {
    valido = false;

    var colesterolTotal = document.getElementById("colesterolTotal").value;
    var colesterolHDL = document.getElementById("colesterolHDL").value;
    var colesterolLDL = document.getElementById("colesterolLDL").value;
    var colesterolVLDL = document.getElementById("colesterolVLDL").value;
    var indiceCol = document.getElementById("indiceCol").value;
    var trigliceridos = document.getElementById("trigliceridos").value;
    var observaciones = document.getElementById("observaciones").value;
    var estado = document.getElementById("estado").value;
    var regexp = /^\d{1,3}\.{0,1}\d{1}$/;

    //VALIDAR CAMPO

     if (estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto') {
         mensajeEnPantalla("Error", "No modifiques el select!", "error");
         return valido;
     } 

    if (!validarBlanco(colesterolTotal) || !validarBlanco(colesterolHDL) || !validarBlanco(colesterolLDL) || !validarBlanco(colesterolVLDL) || !validarBlanco(indiceCol) || !validarBlanco(trigliceridos)) {
        mensajeEnPantalla("Error", "Debe completar los campos. Observaciones puede quedar en blanco", "error");
        return valido;
    }

    if (colesterolTotal.length > 5 || colesterolHDL.length > 5 || colesterolLDL.length > 5 || colesterolVLDL.length > 5 || indiceCol.length > 5 || trigliceridos.length > 5) {
        mensajeEnPantalla("Error", "Los campos no pueden tener más de 5 caracteres.", "error");
        return valido;
    }

    /*  if (observaciones.length > 315) {
         mensajeEnPantalla("Error", "Campo observaciones no puede tener más de 215 caracteres", "error");
         return valido;
     } */


    if (!validarRegExp(colesterolTotal, regexp) || !validarRegExp(colesterolHDL, regexp) || !validarRegExp(colesterolLDL, regexp) || !validarRegExp(colesterolVLDL, regexp) || !validarRegExp(indiceCol, regexp) || !validarRegExp(trigliceridos, regexp)) {
        mensajeEnPantalla("Campo deben ser rellenado con un número entero o un número con un decimal separado por un punto. <br><br><br><br>Ej:'100.1'", "", "error");
        return valido;
    }


    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            var datos = $('#formIngresarPerfilLipidico').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    if (r == 'true') {

                        mensajeEnPantalla("Se han ingresado los datos", "", "success");
                        /* document.getElementById('estado').setAttribute("disabled",true);
                        document.getElementById("btnPerfilLipidico").setAttribute("disabled", true);
                        document.getElementById("colesterolTotal").setAttribute("disabled", true);
                        document.getElementById("colesterolHDL").setAttribute("disabled", true);
                        document.getElementById("colesterolLDL").setAttribute("disabled", true);
                        document.getElementById("colesterolVLDL").setAttribute("disabled", true);
                        document.getElementById("indiceCol").setAttribute("disabled", true);
                        document.getElementById("trigliceridos").setAttribute("disabled", true);
                        document.getElementById("observaciones").setAttribute("disabled",true); */

                        //document.getElementById("btnMostrarPerfilLipidico").setAttribute("disabled", true);
                        //document.getElementById("btnGuardarPerfilLipidico").setAttribute("disabled", true);
                        mostrarPerfilLipidico();
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    }
                }
            });
        } else {
            return false;
        }
    })




    



    /* } else {
        mensajeEnPantalla("No se han ingresado los datos", "", "error");
        return false;
    } 

}) */



}
/*

function mostrarPerfilLipidico() {

    var datos = $('#formIngresarPerfilLipidico').serialize();
    $.ajax({
        type: "POST",
        url: "consultas/mostrardatos.php",
        data: datos,
        success: function (r) {
            var js = JSON.parse(r);

            document.getElementById("colesterolTotal").value = js[0].VALOR_PARAMETRO;
            document.getElementById("colesterolHDL").value = js[1].VALOR_PARAMETRO;
            document.getElementById("colesterolLDL").value = js[2].VALOR_PARAMETRO;
            document.getElementById("colesterolVLDL").value = js[3].VALOR_PARAMETRO;
            document.getElementById("indiceCol").value = js[4].VALOR_PARAMETRO;
            document.getElementById("trigliceridos").value = js[5].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[6].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[7].VALOR_PARAMETRO;
            //document.getElementById("colesterolTotal").value = "12345";
        }
    });
    //document.getElementById("colesterolHDL").value = "12345";



}*/

function riesgoADiezAnios() {

    var valor = document.getElementById('valorIndiceDeFramingham').value;
    var texto;


    //limpiarNumero(valor);

    if (!isNumeric(valor)) {
        texto = "INVÁLIDO";
    } else if (valor < 1 || valor > 99) {
        texto = 'INVÁLIDO';
    } else if (valor >= 10) {
        texto = "ALTO";
    } else if (valor >= 5 && valor <= 9) {
        texto = "MODERADO";
    } else if (valor < 5) {
        texto = "BAJO";
    } else if (!isNumeric(valor)) {
        texto = "INVÁLIDO";
    } else if (valor = "") {
        texto = " ";
    }

    document.getElementById("riesgoDiezAnios").value = texto;

}

function guardarIndiceDeFramingham() {

    var valorIndiceDeFramingham = document.getElementById('valorIndiceDeFramingham').value;
    var riesgoDiezAnios = document.getElementById('riesgoDiezAnios').value;
    //var observaciones = document.getElementById('observaciones').value;

    if (!validarBlanco(valorIndiceDeFramingham)) {
        mensajeEnPantalla("Debe completar el campo valor", "", "error");
        return false;
    }

    if (riesgoDiezAnios == 'INVÁLIDO') {
        mensajeEnPantalla("Riesgo a 10 años no puede ser inválido", "", "error");
        return false;
    } else if (riesgoDiezAnios != 'ALTO' && riesgoDiezAnios != 'MODERADO' && riesgoDiezAnios != 'BAJO') {
        mensajeEnPantalla("Campo riesgo a 10 años debe contener un texto válido", "", "error");
        return false;
    }

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            
            var datos = $('#formIngresarIndiceDeFramingham').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    if (r == 'true') {
                        /* document.getElementById("observaciones").setAttribute("disabled", true);
                        document.getElementById("valorIndiceDeFramingham").setAttribute("disabled", true);
                        document.getElementById("riesgoDiezAnios").setAttribute("disabled", true);
                        document.getElementById("btnMostrarIndiceDeFramingham").setAttribute("disabled", true);
                        document.getElementById("btnGuardarIndiceDeFramingham").setAttribute("disabled", true);
                        document.getElementById("btnIndiceDeFramingham").setAttribute("disabled", true); */
                        mensajeEnPantalla("Se han ingresado los datos", "", "success");
                        mostrarIndiceDeFramingham();
                        
                        
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    }
                }
            });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })



    /*  
      */

}

function guardarTestDeRuffier(){
    var P1 = document.getElementById('P1').value;
    var P2 = document.getElementById('P2').value;
    var P3 = document.getElementById('P3').value;
    var valoracion = document.getElementById('valoracion').value;
    var valoracionTexto = document.getElementById('valoracionTexto').value;
    var observaciones = document.getElementById('observaciones').value;

    if(!validarBlanco(P1) || !validarBlanco(P2) || !validarBlanco(P3) || !validarBlanco(valoracion)){
        mensajeEnPantalla("Campos no pueden estar en blanco","","error");
        return false;
    }

    if(!isNumeric(P1) || !isNumeric(P2) || !isNumeric(P3) || !isNumeric(valoracion)){
        mensajeEnPantalla("Campos deben ser numéricos","","error");
        return false;
    }

    if(valoracionTexto == 'INVÁLIDO'){
        mensajeEnPantalla("Valoración no puede ser inválida","","error");
        return false;
    }

    if(valoracionTexto != 'MALO' && valoracionTexto != 'MEDIO' && valoracionTexto != 'BUENO' &&valoracionTexto != 'INSUFICIENTE' && valoracionTexto != 'EXCELENTE'){
        mensajeEnPantalla("Valoración tiene texto distinto a lo preestablecido","","error");
        return false;
    }

    
    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarTestDeRuffier').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* document.getElementById("P1").setAttribute("disabled", true);
                                document.getElementById("P2").setAttribute("disabled", true);
                                document.getElementById("P3").setAttribute("disabled", true);
                                document.getElementById("valoracion").setAttribute("disabled", true);
                                document.getElementById("valoracionTexto").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnTestDeRuffier").setAttribute("disabled", true); */
                                mostrarTestDeRuffier();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
      

}

function guardarElectrocardiograma(){
    
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarElectrocardiograma').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarElectrocardiograma").setAttribute("disabled", true);
                                document.getElementById("btnElectrocardiograma").setAttribute("disabled", true); */
                                mostrarElectrocardiograma();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
 


}

function guardarGlicemia(){
    var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    }

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarGlicemia').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarGlicemia").setAttribute("disabled", true);
                                document.getElementById("btnGlicemia").setAttribute("disabled", true); */
                                mostrarGlicemia();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos"+" "+r, "", "error");
                                
                            }
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })




}


function guardarCreatinina(){
    var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    }

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarCreatinina').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarCreatinina").setAttribute("disabled", true);
                                document.getElementById("btnCreatinina").setAttribute("disabled", true); */
                                mostrarCreatinina();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarHemoglobina(){
    var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    }

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarHemoglobina').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarHemoglobina").setAttribute("disabled", true);
                                document.getElementById("btnHemoglobina").setAttribute("disabled", true); */
                                mostrarHemoglobina();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarRxTorax(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarRxTorax').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /*document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarRxTorax").setAttribute("disabled", true);
                                document.getElementById("btnRxTorax").setAttribute("disabled", true); */
                                mostrarRxTorax();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })

}

function guardarEncuestaDeLakeLouis(){
    
    //var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

   /*  if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    } */

    var dolorDeCabeza = document.getElementById('dolorDeCabeza').value;
    var disminucionDeApetito = document.getElementById('disminucionDeApetito').value;
    var fatigaDebilidad = document.getElementById('fatigaDebilidad').value;
    var mareoVertigo = document.getElementById('mareoVertigo').value;
    var dificultadParaDormir = document.getElementById('dificultadParaDormir').value;


    if(dolorDeCabeza != 1 && dolorDeCabeza !=2 && dolorDeCabeza !=3){
        mensajeEnPantalla("No se puede ingresar","","error");    
        return false;
    }

    if(disminucionDeApetito != 1 && disminucionDeApetito !=2 && disminucionDeApetito !=3){
        mensajeEnPantalla("No se puede ingresar","","error");    
        return false;
    }

    if(fatigaDebilidad != 1 && fatigaDebilidad !=2 && fatigaDebilidad !=3){
        mensajeEnPantalla("No se puede ingresar","","error");    
        return false;
    }

    if(mareoVertigo != 1 && mareoVertigo !=2 && mareoVertigo !=3){
        mensajeEnPantalla("No se puede ingresar","","error");    
        return false;
    }

    if(dificultadParaDormir != 1 && dificultadParaDormir !=2 && dificultadParaDormir !=3){
        mensajeEnPantalla("No se puede ingresar","","error");    
        return false;
    }
    



    
    

     Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarEncuestaDeLakeLouis').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                //document.getElementById("valor").setAttribute("disabled", true);
                                //document.getElementById("estado").setAttribute("disabled", true);
                                //document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                //document.getElementById("btnGuardarEncuestaDeLakeLouis").setAttribute("disabled", true);
                                //document.getElementById("btnEncuestaDeLakeLouis").setAttribute("disabled", true);
                                mostrarEncuestaDeLakeLouis();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }

                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    }) 
}

function guardarCultivoNasal(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarCultivoNasal').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                //document.getElementById("valor").setAttribute("disabled", true);
                                /* document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarCultivoNasal").setAttribute("disabled", true);
                                document.getElementById("btnCultivoNasal").setAttribute("disabled", true); */
                                mostrarCultivoNasal();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarCultivoFaringeo(){
     //var valor = document.getElementById('valor').value;
     var estado = document.getElementById('estado').value;
     var observaciones = document.getElementById('observaciones').value;
 
    /*  if(!isNumeric(valor)){
         mensajeEnPantalla("Valor debe ser numérico","","error");
         return false;
     } */
 
     if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
         mensajeEnPantalla("No se puede modificar","","error");
         return false;
     }
 
     
 
     Swal.fire({
         title: "Confirmación",
         text: "¿Desea ingresar los datos?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Avanzar',
         cancelButtonText: 'Cancelar'
     }).then((result) => {
         if (result.value) {
     
                 var datos = $('#formIngresarCultivoFaringeo').serialize();
                     $.ajax({
                         type: "POST",
                         url: "../../consultas/insert.php",
                         data: datos,
                         success: function (r) {
                             if (r == 'true'){
                                 mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                 /* //document.getElementById("valor").setAttribute("disabled", true);
                                 document.getElementById("estado").setAttribute("disabled", true);
                                 document.getElementById("observaciones").setAttribute("disabled", true);
                                 //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                 document.getElementById("btnGuardarCultivoFaringeo").setAttribute("disabled", true);
                                 document.getElementById("btnCultivoFaringeo").setAttribute("disabled", true); */
                                 mostrarCultivoFaringeo();
                             }
                             if (r == 'false') {
                                 mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                 
                             }
                             
                             
                             
                             
                         }
                     });
         } else {
             mensajeEnPantalla("No se han ingresado los datos", "", "error");
         }
     })
}

function guardarCultivoLechoUngueal(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarCultivoLechoUngueal').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarCultivoLechoUngueal").setAttribute("disabled", true);
                                document.getElementById("btnCultivoLechoUngueal").setAttribute("disabled", true); */
                                mostrarCultivoLechoUngueal();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarAltSgpt(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarAltSgpt').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarAltSgpt").setAttribute("disabled", true);
                                document.getElementById("btnAltSgpt").setAttribute("disabled", true); */
                                mostrarALTSGPT();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarAstSgot(){
    
    
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarAstSgot').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                mostrarASTSGOT();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarOptometria(){
    //var valor = document.getElementById('valor').value;


    var ojoDerechoLejos = document.getElementById("ojoDerechoLejos").value; 
    var ojoIzquierdoLejos = document.getElementById("ojoIzquierdoLejos").value;
    var ambosOjosLejos = document.getElementById("ambosOjosLejos").value;
    var ojoDerechoCerca = document.getElementById("ojoDerechoCerca").value;
    var ojoIzquierdoCerca = document.getElementById("ojoIzquierdoCerca").value;
    var ambosOjosCerca = document.getElementById("ambosOjosCerca").value;
    var figuras = document.getElementById("figuras").value;
    var animalesA = document.getElementById("animalesA").value;
    var animalesB = document.getElementById("animalesB").value;
    var animalesC = document.getElementById("animalesC").value;
    var coloresPrimarios = document.getElementById("coloresPrimarios").value;
    var encandilamiento = document.getElementById("encandilamiento").value;
    var recuperacionEncandilamiento = document.getElementById("recuperacionEncandilamiento").value;
    var visionNocturna = document.getElementById("visionNocturna").value
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    //alert(ojoDerechoLejos + ojoIzquierdoLejos + ambosOjosLejos);
    //alert(ojoDerechoCerca + ojoIzquierdoCerca + ambosOjosCerca);
    //return false;
/* 
    if(!validarBlanco(OjoDerechoLejos) || !validarBlanco(ojoIzquierdoLejos) || !validarBlanco(ambosOjosLejos) || !validarBlanco(ojoDerechoCerca) || !validarBlanco(ojoIzquierdoCerca) || !validarBlanco(ambosOjosCerca) ||!validarBlanco(animalesA) || !validarBlanco(animalesB) || !validarBlanco(animalesC){

        
    } */
   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

  

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarOptometria').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                mostrarOptometria();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                        //alert(r);    
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    }) 
}


function guardarAudiometria(){

    var VAOD125 = document.getElementById('VAOD125').value;
    var VAOD250 = document.getElementById('VAOD250').value;
    var VAOD500 = document.getElementById('VAOD500').value;
    var VAOD1000 = document.getElementById('VAOD1000').value;
    var VAOD2000 = document.getElementById('VAOD2000').value;
    var VAOD3000 = document.getElementById('VAOD3000').value;
    var VAOD4000 = document.getElementById('VAOD4000').value;
    var VAOD6000 = document.getElementById('VAOD6000').value;
    var VAOD8000 = document.getElementById('VAOD8000').value;
    var VAOI125 = document.getElementById('VAOI125').value;
    var VAOI250 = document.getElementById('VAOI250').value;
    var VAOI500 = document.getElementById('VAOI500').value;
    var VAOI1000 = document.getElementById('VAOI1000').value;
    var VAOI2000 = document.getElementById('VAOI2000').value;
    var VAOI3000 = document.getElementById('VAOI3000').value;
    var VAOI4000 = document.getElementById('VAOI4000').value;
    var VAOI6000 = document.getElementById('VAOI6000').value;
    var VAOI8000 = document.getElementById('VAOI8000').value;
    var VOOD125 = document.getElementById('VOOD125').value;
    var VOOD250 = document.getElementById('VOOD250').value;
    var VOOD500 = document.getElementById('VOOD500').value;
    var VOOD1000 = document.getElementById('VOOD1000').value;
    var VOOD2000 = document.getElementById('VOOD2000').value;
    var VOOD3000 = document.getElementById('VOOD3000').value;
    var VOOD4000 = document.getElementById('VOOD4000').value;
    var VOOD6000 = document.getElementById('VOOD6000').value;
    var VOOD8000 = document.getElementById('VOOD8000').value;
    var VOOI125 = document.getElementById('VOOI125').value;
    var VOOI250 = document.getElementById('VOOI250').value;
    var VOOI500 = document.getElementById('VOOI500').value;
    var VOOI1000 = document.getElementById('VOOI1000').value;
    var VOOI2000 = document.getElementById('VOOI2000').value;
    var VOOI3000 = document.getElementById('VOOI3000').value;
    var VOOI4000 = document.getElementById('VOOI4000').value;
    var VOOI6000 = document.getElementById('VOOI6000').value;
    var VOOI8000 = document.getElementById('VOOI8000').value;
    /* var OBSERVACION = document.getElementById('OBSERVACION').value;*/
    var estado = document.getElementById('estado').value; 
    var observaciones = document.getElementById('observaciones').value;



    /* if(!isNumeric(VAOD125)){
        mensajeEnPantalla("Campo solo puede permanecer vacío o contener números");
        return false;
    } */

    
    

    if(!validarBlanco(VAOD125) && !validarBlanco(VAOD250) && !validarBlanco(VAOD500) && !validarBlanco(VAOD1000) && !validarBlanco(VAOD2000) && !validarBlanco(VAOD3000) && !validarBlanco(VAOD4000) && !validarBlanco(VAOD6000) && !validarBlanco(VAOD8000) && !validarBlanco(VAOI125) && !validarBlanco(VAOI250) && !validarBlanco(VAOI500) && !validarBlanco(VAOI1000) && !validarBlanco(VAOI2000) && !validarBlanco(VAOI3000) && !validarBlanco(VAOI4000) && !validarBlanco(VAOI6000) && !validarBlanco(VAOI8000) && !validarBlanco(VOOD125) && !validarBlanco(VOOD250) && !validarBlanco(VOOD500) && !validarBlanco(VOOD1000) && !validarBlanco(VOOD2000) && !validarBlanco(VOOD3000) && !validarBlanco(VOOD4000) && !validarBlanco(VOOD6000) && !validarBlanco(VOOD8000) && !validarBlanco(VOOI125) && !validarBlanco(VOOI250) && !validarBlanco(VOOI500) && !validarBlanco(VOOI1000) && !validarBlanco(VOOI2000) && !validarBlanco(VOOI3000) && !validarBlanco(VOOI4000) &&  !validarBlanco(VOOI6000) && !validarBlanco(VOOI8000)){
        mensajeEnPantalla("Debe llenar al menos un campo","","error");
        return false;
    }

    /* if(!isNumeric(VAOD125) && !validarBlanco(VAOD125) || !isNumeric(VAOD250) || !isNumeric(VAOD500) || !isNumeric(VAOD1000) || !isNumeric(VAOD2000) || !isNumeric(VAOD3000) || !isNumeric(VAOD4000) || !isNumeric(VAOD6000) || !isNumeric(VAOD8000) || !isNumeric(VAOI125) || !isNumeric(VAOI250) || !isNumeric(VAOI500) || !isNumeric(VAOI1000) || !isNumeric(VAOI2000) || !isNumeric(VAOI3000) || !isNumeric(VAOI4000) || !isNumeric(VAOI6000) || !isNumeric(VAOI8000) || !isNumeric(VOOD125) || !isNumeric(VOOD250) || !isNumeric(VOOD500) || !isNumeric(VOOD1000) || !isNumeric(VOOD2000) || !isNumeric(VOOD3000) || !isNumeric(VOOD4000) || !isNumeric(VOOD6000) || !isNumeric(VOOD8000) || !isNumeric(VOOI125) || !isNumeric(VOOI250) || !isNumeric(VOOI500) || !isNumeric(VOOI1000) || !isNumeric(VOOI2000) || !isNumeric(VOOI3000) || !isNumeric(VOOI4000) |  !isNumeric(VOOI6000) || !isNumeric(VOOI8000)){
        mensajeEnPantalla("Campos deben ser numéricos o estar vacíos","","error");
        return false;
    } */


    /* if(validarBlanco(VAOD125)){
        if(isNaN(VAOD125)){
             alert("texto no numérico");
             mensajeEnPantalla("Campos deben ser numéricos o estar vacíos","","error");
            return false; 
        }
    } */




    

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }


     Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarAudiometria').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                mostrarAudiometria();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    }) 


    

}

function guardarProtrombina(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarProtrombina').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarProtrombina").setAttribute("disabled", true);
                                document.getElementById("btnProtrombina").setAttribute("disabled", true); */
                                mostrarProtrombina();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarTiempoDeProtrombina(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarTiempoDeProtrombina').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarTiempoDeProtrombina").setAttribute("disabled", true);
                                document.getElementById("btnTiempoDeProtrombina").setAttribute("disabled", true); */
                                mostrarTiempoDeProtrombina();
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            //alert(r);
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarActividadDeAcetilcolinesterasa(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Apto' && estado != 'No apto'){
        mensajeEnPantalla("No se puede modificar","","error");
        return false;
    }

    

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
    
                var datos = $('#formIngresarActividadDeAcetilcolinesterasa').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true'){
                                mensajeEnPantalla("Se han ingresado los datos", "", "success");
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarActividadDeAcetilcolinesterasa").setAttribute("disabled", true);
                                document.getElementById("btnActividadDeAcetilcolinesterasa").setAttribute("disabled", true); */
                                mostrarActividadDeAcetilcolinesterasa();

                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                            
                            
                            
                        }
                    });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })
}

function guardarEspirometriaBasal(){
    
    var absoluto1 = document.getElementById('absoluto1').value;
    var teorico1 = document.getElementById('teorico1').value;
    var absoluto2 = document.getElementById('absoluto2').value;
    var teorico2 = document.getElementById('teorico2').value;
    var absoluto3 = document.getElementById('absoluto3').value;
    var teorico3 = document.getElementById('teorico3').value;
    var absoluto4 = document.getElementById('absoluto4').value;

    var estado = document.getElementById('estado').value;


    var observaciones = document.getElementById('observaciones').value;

    if(!validarBlanco(absoluto1) || !validarBlanco(absoluto2) || !validarBlanco(absoluto3) || !validarBlanco(absoluto4) || !validarBlanco(teorico1) || !validarBlanco(teorico2) || !validarBlanco(teorico3)){
        mensajeEnPantalla("Debe rellenar los campos","","error");
        return false;
    }

    if(!isNumeric(absoluto1) || !isNumeric(absoluto2) || !isNumeric(absoluto3) || !isNumeric(absoluto4) || !isNumeric(teorico1) || !isNumeric(teorico2) || !isNumeric(teorico3)){
        mensajeEnPantalla("Campos deben ser numéricos","","error");
        return false;
    }


    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            
            var datos = $('#formIngresarEspirometriaBasal').serialize();
            $.ajax({
                type: "POST",
                url: "../../consultas/insert.php",
                data: datos,
                success: function (r) {
                    if (r == 'true') {
                        mensajeEnPantalla("Se han ingresado los datos", "", "success");
                        mostrarEspirometriaBasal();
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    }
                    //alert(r);
                    
                }
            });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })


    
    
}





function prueba(){
    

    //window.open('https://google.cl',"Informe","width=500,height=500,scrollbars=NO"); 
      //  return false;
}


function obtenerDatosEmpresa(){
    var datos = $('#formEditarEmpresa').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/mostrarDatos.php",
        data: datos,
        success: function(r) {
           
            
            var js = JSON.parse(r);
            //alert(js[0].RUT_EMPRESA)
            
            document.getElementById("nombreEmpresa").value = js[0].NOMBRE_EMPRESA;
            document.getElementById("rutEmpresa").value = js[0].RUT_EMPRESA;
            document.getElementById("dvEmpresa").value = js[0].DV_EMPRESA; 
            document.getElementById("nombreRepresentante").value = js[0].NOMBRE_REPRESENTANTE_EMPRESA; 
            document.getElementById("rutRepresentante").value = js[0].RUT_REPRESENTANTE_EMPRESA; 
            document.getElementById("dvRepresentante").value = js[0].DV_REPRESENTANTE_EMPRESA; 
            document.getElementById("direccionEmpresa").value = js[0].DIRECCION_EMPRESA; 
            document.getElementById("emailEmpresa").value = js[0].EMAIL_EMPRESA;
            document.getElementById("telefonoEmpresa").value = js[0].TELEFONO_EMPRESA;
            
        }
    });
}

function obtenerDatosTrabajador(){
    var datos = $('#formEditarTrabajador').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/mostrarDatos.php",
        data: datos,
        success: function(r) {
            //alert(r);
           /* [{"NOMBRE_TRABAJADOR":"Nombrecito","APELLIDO_TRABAJADOR":"Apellidito","RUT_TRABAJADOR":"8419036","DV_TRABAJADOR":"5","FECHA_NACIMIENTO_TRABAJADOR":"1959-09-07","DIRECCION_TRABAJADOR":"Calle 1 casa 1","EMAIL_TRABAJADOR":"correo@correo.cl","TELEFONO_TRABAJADOR":"992062083"}] */
            var js = JSON.parse(r);
            
            
            var idSexo =js[0].ID_SEXO;
            var nombreSexo = '';
            
            switch(idSexo){
                case '1':
                    nombreSexo = 'Femenino';
                break;
                
                case '2':
                    nombreSexo = 'Masculino';
                break;

                case '3':
                    nombreSexo = 'No especifica';
                break;

                default:
                    //nombreSexo = '';
                break;
            }
            
            document.getElementById("nombreTrabajador").value = js[0].NOMBRE_TRABAJADOR;
            document.getElementById("apellidosTrabajador").value = js[0].APELLIDO_TRABAJADOR; ;
            document.getElementById("rutTrabajador").value = js[0].RUT_TRABAJADOR;
            document.getElementById("dvTrabajador").value = js[0].DV_TRABAJADOR; 
            document.getElementById("fechaNacimientoTrabajador").value = js[0].FECHA_NACIMIENTO_TRABAJADOR;
            document.getElementById("sexoTrabajador").value = nombreSexo;
            document.getElementById("direccionTrabajador").value = js[0].DIRECCION_TRABAJADOR; 
            document.getElementById("emailTrabajador").value = js[0].EMAIL_TRABAJADOR;
            document.getElementById("telefonoTrabajador").value = js[0].TELEFONO_TRABAJADOR;
             
        }
    });
}


function editarDatosEmpresa(){
    //var valido = false;
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
    if (!validarBlanco(nombreEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo nombre empresa", "error");
        return valido;
    }

    if (nombreEmpresa.length > 128) {
        mensajeEnPantalla("Error", "Nombre empresa no puede tener más de 128 caracteres", "error");
        return valido;
    }

    if (!validarRegExp(nombreEmpresa, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre empresa solo puede contener letras, números y/o espacios", "error");
        return valido;
    }



    //VALIDACIONES RUT EMPRESA
    if (!validarBlanco(rutEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo rut empresa", "error");
        return valido;
    }

    if (rutEmpresa.length < 7 || rutEmpresa.length > 9) {
        mensajeEnPantalla("Error", "RUT empresa debe tener entre 7 y 9 números", "error");
        return valido;
    }


    if (!validarRegExp(rutEmpresa, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo Rut Empresa solo puede contener números", "error");
        return valido;
    }

    if (!validarRegExp(dvEmpresa, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutEmpresa, dvEmpresa)) {
        mensajeEnPantalla("Error", "Rut empresa inválido", "error");
        return valido;
    }






    //VALIDACIONES NOMBRE REPRESENTANTE

    if (!validarBlanco(nombreRepresentante)) {
        mensajeEnPantalla("Error", "Debe completar campo nombre representante", "error");
        return valido;
    }

    if (nombreRepresentante.length > 128) {
        mensajeEnPantalla("Error", "Nombre representante no puede tener más de 128 caracteres", "error");
        return valido;
    }

    if (!validarRegExp(nombreRepresentante, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre representante solo puede contener letras y/o espacios", "error");
        return valido;
    }






    //VALIDACIONES RUT REPRESENTANTE

    if (!validarBlanco(rutRepresentante)) {
        mensajeEnPantalla("Error", "Debe completar campo rut representante", "error");
        return valido;
    }

    if (rutRepresentante.length < 7 || rutRepresentante.length > 9) {
        mensajeEnPantalla("Error", "RUT representante debe tener entre 7 y 9 números", "error");
        return valido;
    }

    if (!validarRegExp(rutRepresentante, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo Rut Representante solo puede contener letras, números y/o espacios", "error");
        return valido;
    }

    if (!validarRegExp(dvRepresentante, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutRepresentante, dvRepresentante)) {
        mensajeEnPantalla("Error", "Rut representante inválido", "error");
        return valido;
    }


    //VALIDACIONES DIRECCION EMPRESA (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
    if(!validarBlanco(direccionEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar campo Dirección empresa", "error");
        return valido;
    }
        
    if (direccionEmpresa.length > 64) {
            mensajeEnPantalla("Error", "Dirección empresa no puede tener más de 64 caracteres", "error");
            return valido;
    }

    if (!validarRegExp(direccionEmpresa, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
        mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
         return valido;
    }
    

    //VALIDAR EMAIL-TELEFONO
   

        if (!validarBlanco(emailEmpresa)) {
            mensajeEnPantalla("Error", "Debe completar campo Email empresa", "error");
            return valido;
        }
            if (!validarRegExp(emailEmpresa, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailEmpresa.length > 64) {
                mensajeEnPantalla("Error", "Email empresa no puede tener más de 64 caracteres", "error");
                return valido;
            }
        

        //VALIDACIONES TELEFONO EMPRESA

        if (!validarBlanco(telefonoEmpresa)) {
            mensajeEnPantalla("Error", "Debe completar campo teléfono", "error");
            return valido;
        }
            if (!validarRegExp(telefonoEmpresa, /^\d{7,9}$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contenter solo números", "error");
                return valido;
            }

            if (telefonoEmpresa.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
    
            
            Swal.fire({
                title: "Confirmación",
                text: "¿Desea ingresar los datos?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Avanzar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    
                    var datos = $('#formEditarEmpresa').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            if (r == 'true') {
                                mensajeEnPantalla("Se han modificado los datos", "", "success");
                                
                            } else if (r == 'false') {
                                mensajeEnPantalla("No se han modificado los datos", "", "error");
                            }
                            //alert(r);
                            
                        }
                    });
                } else {
                    mensajeEnPantalla("No se han modificado los datos", "", "error");
                }
            })
        
}


function editarDatosTrabajador() {
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
    if (!validarBlanco(nombreTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar el campo nombre trabajador", "error");
        return valido;
    }

    if (!validarRegExp(nombreTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo nombre trabajador solo puede contener letras y/o espacios", "error");
        return valido;
    }

    if (nombreTrabajador.length > 40) {
        mensajeEnPantalla("Error", "Nombre empresa no puede tener más de 40 caracteres", "error");
        return valido;
    }

    //VALIDAR CAMPO APELLIDOS TRABAJADOR
    if (!validarBlanco(apellidosTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar el campo apellidos trabajador", "error");
        return valido;
    }

    if (!validarRegExp(apellidosTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/)) {
        mensajeEnPantalla("Error", "El campo apellidos trabajador solo puede contener letras y/o espacios", "error");
        return valido;
    }

    if (apellidosTrabajador.length > 64) {
        mensajeEnPantalla("Error", "Apellidos trabajador no puede tener más de 64 caracteres", "error");
        return valido;
    }


    //VALIDAR CAMPO RUT
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT trabajador", "error");
        return valido;
    }

    if (rutTrabajador.length < 7 || rutTrabajador.length > 9) {
        mensajeEnPantalla("Error", "RUT trabajador debe tener entre 7 y 9 números", "error");
        return valido;
    }

    if (!validarRegExp(rutTrabajador, /^\d{7,9}$/)) {
        mensajeEnPantalla("Error", "El campo RUT trabajador puede números", "error");
        return valido;
    }

    if (!validarRegExp(dvTrabajador, /^[0-9K]{1}$/)) {
        mensajeEnPantalla("Error", "El campo DV solo puede ser de 0 a 9 o K", "error");
        return valido;
    }

    if (!formulaRut(rutTrabajador, dvTrabajador)) {
        mensajeEnPantalla("Error", "Rut trabajador inválido", "error");
        return valido;
    }

    //VALIDAR FECHA
    if (existeFecha(fechaNacimientoTrabajador)) {
        mensajeEnPantalla("Error", "Fecha no existe o no es válida", "error");
        return valido;
    }

    if (fechaFormateadaNacimientoTrabajador < fechaMinima || fechaFormateadaNacimientoTrabajador > fechaMaxima) {
        mensajeEnPantalla("Error", "Ingrese una fecha entre 1940-01-01 y 2002-12-31", "error");
        return valido;
    }



    //VALIDAR CAMPO SEXO
    if (sexoTrabajador != "Femenino") {
        if (sexoTrabajador != "Masculino") {
            if (sexoTrabajador != "No especifica") {
                mensajeEnPantalla("Error", "No me trates de engañar", "error");
                return valido;
            } else {
                sexoTrabajador = "3";
            }
        } else {
            sexoTrabajador = "2";
        }
    } else {
        sexoTrabajador = "1";
    }

    //VALIDACIONES DIRECCION TRABAJADOR (PUEDE SER BLANCO, PERO SI ESTÁ LLENO DEBE HABER VALIDACIONES)
    if (!validarBlanco(direccionTrabajador)){
        mensajeEnPantalla("Error", "Debe completar campo Dirección trabajador ", "error");
        return valido;
    }
        if (direccionTrabajador.length > 64) {
            mensajeEnPantalla("Error", "Dirección trabajador no puede tener más de 64 caracteres", "error");
            return valido;
        }

        if (!validarRegExp(direccionTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
            mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
            return valido;
        }
    

    



    //VALIDAR EMAIL-TELEFONO
    
        if (!validarBlanco(emailTrabajador)) {
            mensajeEnPantalla("Error", "Debe completar campo Email trabajador ", "error");
            return valido;
        }
            //VALIDACIONES EMAIL EMPRESA
            if (!validarRegExp(emailTrabajador, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailTrabajador.length > 64) {
                mensajeEnPantalla("Error", "Email trabajador no puede tener más de 64 caracteres", "error");
                return valido;
            }
        

        //VALIDACIONES TELEFONO EMPRESA

        if(!validarBlanco(telefonoTrabajador)) {
            mensajeEnPantalla("Error", "Debe completar campo Teléfono trabajador ", "error");
            return valido;
        }
            if (!validarRegExp(telefonoTrabajador, /^\d*$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contener solo números", "error");
                return valido;
            }

            if (telefonoTrabajador.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
        
    


            Swal.fire({
                title: "Confirmación",
                text: "¿Desea modificar los datos?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Avanzar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    
                    var datos = $('#formEditarTrabajador').serialize();
                    $.ajax({
                        type: "POST",
                        url: "../consultas/insert.php",
                        data: datos,
                        success: function (r) {
                            //alert(r);
                            
                            if (r == 'true') {
                                mensajeEnPantalla("Se han modificado los datos", "", "success");
                                
                            } else if (r == 'false') {
                                mensajeEnPantalla("No se han modificado los datos", "", "error");
                            }
                            //alert(r);
                            
                        }
                    });
                } else {
                    mensajeEnPantalla("No se han modificado los datos", "", "error");
                }
            })

    return valido;
}



function obtenerParametrosOptometria(){
    var datos = $('#formIngresarOptometria').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            //alert(r);
            var js = JSON.parse(r);

            var ojoDerechoLejos = js[0].VALOR_PARAMETRO;
            var ojoIzquierdoLejos = js[1].VALOR_PARAMETRO;
            var ambosOjosLejos = js[2].VALOR_PARAMETRO;
            
            var ojoDerechoCerca = js[3].VALOR_PARAMETRO;
            var ojoIzquierdoCerca = js[4].VALOR_PARAMETRO;
            var ambosOjosCerca = js[5].VALOR_PARAMETRO;
            

            var radioOjoDerechoLejos = document.getElementsByName('ojoDerechoLejos');
            
                for (i=0;i<radioOjoDerechoLejos.length;i++) {
                    if(radioOjoDerechoLejos[i].value == ojoDerechoLejos) {
                        radioOjoDerechoLejos[i].checked = true;
                    }
                }

            var radioOjoIzquierdoLejos = document.getElementsByName('ojoIzquierdoLejos');
            
                for (i=0;i<radioOjoIzquierdoLejos.length;i++) {
                    if(radioOjoIzquierdoLejos[i].value == ojoIzquierdoLejos) {
                        radioOjoIzquierdoLejos[i].checked = true;
                    }
                }

            var radioAmbosOjosLejos = document.getElementsByName('ambosOjosLejos');
            
                for (i=0;i<radioAmbosOjosLejos.length;i++) {
                    if(radioAmbosOjosLejos[i].value == ambosOjosLejos) {
                        radioAmbosOjosLejos[i].checked = true;
                    }
                }
            
            
            var radioOjoDerechoCerca = document.getElementsByName('ojoDerechoCerca');
            
                for (i=0;i<radioOjoDerechoCerca.length;i++) {
                    if(radioOjoDerechoCerca[i].value == ojoDerechoCerca) {
                        radioOjoDerechoCerca[i].checked = true;
                    }
                }

            var radioOjoIzquierdoCerca = document.getElementsByName('ojoIzquierdoCerca');
            
                for (i=0;i<radioOjoIzquierdoCerca.length;i++) {
                    if(radioOjoIzquierdoCerca[i].value == ojoIzquierdoCerca) {
                        radioOjoIzquierdoCerca[i].checked = true;
                    }
                }

            var radioAmbosOjosCerca = document.getElementsByName('ambosOjosCerca');
            
                for (i=0;i<radioAmbosOjosCerca.length;i++) {
                    if(radioAmbosOjosCerca[i].value == ambosOjosCerca) {
                        radioAmbosOjosCerca[i].checked = true;
                    }
                }

            //alert(js[6].VALOR_PARAMETRO + js[7].VALOR_PARAMETRO);

            document.getElementById('figuras').value = js[6].VALOR_PARAMETRO;
            
            
            var animalesA = js[7].VALOR_PARAMETRO;
            var animalesB = js[8].VALOR_PARAMETRO;
            var animalesC = js[9].VALOR_PARAMETRO;

            var radioAnimalesA = document.getElementsByName('animalesA');
            
            for (i=0;i<radioAnimalesA.length;i++) {
                if(radioAnimalesA[i].value == animalesA) {
                    radioAnimalesA[i].checked = true;
                }
            }

            var radioAnimalesB = document.getElementsByName('animalesB');
            
            for (i=0;i<radioAnimalesB.length;i++) {
                if(radioAnimalesB[i].value == animalesB) {
                    radioAnimalesB[i].checked = true;
                }
            }

            var radioAnimalesC = document.getElementsByName('animalesC');
            
            for (i=0;i<radioAnimalesC.length;i++) {
                if(radioAnimalesC[i].value == animalesC) {
                    radioAnimalesC[i].checked = true;
                }
            }


            
            document.getElementById('coloresPrimarios').value = js[10].VALOR_PARAMETRO;
            document.getElementById('encandilamiento').value = js[11].VALOR_PARAMETRO;
            document.getElementById('recuperacionEncandilamiento').value = js[12].VALOR_PARAMETRO;
            document.getElementById('visionNocturna').value = js[13].VALOR_PARAMETRO;
            document.getElementById('estado').value = js[14].VALOR_PARAMETRO;  
            document.getElementById('observaciones').value = js[15].VALOR_PARAMETRO;
            
        }
        
    });
}

function obtenerParametrosGlicemia(){

    //var fechahora = document.getElementById('fechaHora').value;
    //var subCadena = fechaHora.split(' ',2);


    //mensajeEnPantalla(subCadena[0] + " " + subCadena[1]);
    //mostrarGlicemia();

    
    var datos = $('#formIngresarGlicemia').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            var js = JSON.parse(r);

            document.getElementById("valor").value = js[0].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[2].VALOR_PARAMETRO; 
            
            
        }
        
    });

    
    
    //document.getElementById("colesterolHDL").value = "12345";
}

function obtenerParametrosActividadDeAcetilcolinesterasa(){
    
    var datos = $('#formIngresarActividadDeAcetilcolinesterasa').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO; 
            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            
            
            
            
        }
        
    });

}


function obtenerParametrosEspirometria(){
    var datos = $('#formIngresarEspirometriaBasal').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            //alert(r);
            var js = JSON.parse(r);

           /*  for (let index = 0; index < 9; index++) {
                
                alert(js[index].VALOR_PARAMETRO);
                
            } */

            document.getElementById('absoluto1').value=js[0].VALOR_PARAMETRO; 
            document.getElementById('teorico1').value=js[1].VALOR_PARAMETRO; 
            document.getElementById('absoluto2').value=js[2].VALOR_PARAMETRO; 
            document.getElementById('teorico2').value=js[3].VALOR_PARAMETRO; 
            document.getElementById('absoluto3').value=js[4].VALOR_PARAMETRO; 
            document.getElementById('teorico3').value=js[5].VALOR_PARAMETRO; 
            document.getElementById('absoluto4').value=js[6].VALOR_PARAMETRO; 
            document.getElementById("observaciones").value = js[7].VALOR_PARAMETRO; 
            document.getElementById("estado").value = js[8].VALOR_PARAMETRO; 
            
            
        }
        
    });
}


function obtenerParametrosElectrocardiograma(){

    document.getElementById("estado").disabled = false;

    var datos = $('#formIngresarElectrocardiograma').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO; 
            document.getElementById("estado").value = js[1].VALOR_PARAMETRO; 
            //document.getElementById("estado").disabled = true;
        }
        
    });
}

function obtenerParametrosAudiometria(){
    var datos = $('#formIngresarAudiometria').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            //var VAOD125 = js[0].VALOR_PARAMETRO;
            

            document.getElementById('VAOD125').value = js[0].VALOR_PARAMETRO;
            document.getElementById('VAOD250').value = js[1].VALOR_PARAMETRO;
            document.getElementById('VAOD500').value = js[2].VALOR_PARAMETRO;
            document.getElementById('VAOD1000').value = js[3].VALOR_PARAMETRO;
            document.getElementById('VAOD2000').value = js[4].VALOR_PARAMETRO;
            document.getElementById('VAOD3000').value = js[5].VALOR_PARAMETRO;
            document.getElementById('VAOD4000').value = js[6].VALOR_PARAMETRO;
            document.getElementById('VAOD6000').value = js[7].VALOR_PARAMETRO;
            document.getElementById('VAOD8000').value = js[8].VALOR_PARAMETRO;
            document.getElementById('VAOI125').value = js[9].VALOR_PARAMETRO;
            document.getElementById('VAOI250').value = js[10].VALOR_PARAMETRO;
            document.getElementById('VAOI500').value = js[11].VALOR_PARAMETRO;
            document.getElementById('VAOI1000').value = js[12].VALOR_PARAMETRO;
            document.getElementById('VAOI2000').value = js[13].VALOR_PARAMETRO;
            document.getElementById('VAOI3000').value = js[14].VALOR_PARAMETRO;
            document.getElementById('VAOI4000').value = js[15].VALOR_PARAMETRO;
            document.getElementById('VAOI6000').value = js[16].VALOR_PARAMETRO;
            document.getElementById('VAOI8000').value = js[17].VALOR_PARAMETRO;
            document.getElementById('VOOD125').value = js[18].VALOR_PARAMETRO;
            document.getElementById('VOOD250').value = js[19].VALOR_PARAMETRO;
            document.getElementById('VOOD500').value = js[20].VALOR_PARAMETRO;
            document.getElementById('VOOD1000').value = js[21].VALOR_PARAMETRO;
            document.getElementById('VOOD2000').value = js[22].VALOR_PARAMETRO;
            document.getElementById('VOOD3000').value = js[23].VALOR_PARAMETRO;
            document.getElementById('VOOD4000').value = js[24].VALOR_PARAMETRO;
            document.getElementById('VOOD6000').value = js[25].VALOR_PARAMETRO;
            document.getElementById('VOOD8000').value = js[26].VALOR_PARAMETRO;
            document.getElementById('VOOI125').value = js[27].VALOR_PARAMETRO;
            document.getElementById('VOOI250').value = js[28].VALOR_PARAMETRO;
            document.getElementById('VOOI500').value = js[29].VALOR_PARAMETRO;
            document.getElementById('VOOI1000').value = js[30].VALOR_PARAMETRO;
            document.getElementById('VOOI2000').value = js[31].VALOR_PARAMETRO;
            document.getElementById('VOOI3000').value = js[32].VALOR_PARAMETRO;
            document.getElementById('VOOI4000').value = js[33].VALOR_PARAMETRO;
            document.getElementById('VOOI6000').value = js[34].VALOR_PARAMETRO;
            document.getElementById('VOOI8000').value = js[35].VALOR_PARAMETRO;
            document.getElementById('observaciones').value = js[36].VALOR_PARAMETRO;
            document.getElementById('estado').value = js[37].VALOR_PARAMETRO;

            //mostrarAudiometria();
            graficoAudiometria();



            //alert(r);

            /* document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO; 
            document.getElementById("estado").value = js[1].VALOR_PARAMETRO; */
            
            
        }
        
    });
}

function obtenerParametrosCreatinina(){
    var datos = $('#formIngresarCreatinina').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("valor").value = js[0].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[1].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[2].VALOR_PARAMETRO; 
            
            
        }
        
    });

}

function obtenerParametrosPerfilLipidico(){

    var datos = $('#formIngresarPerfilLipidico').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("colesterolTotal").value = js[0].VALOR_PARAMETRO;
            document.getElementById("colesterolHDL").value = js[1].VALOR_PARAMETRO;
            document.getElementById("colesterolLDL").value = js[2].VALOR_PARAMETRO;
            document.getElementById("colesterolVLDL").value = js[3].VALOR_PARAMETRO;
            document.getElementById("indiceCol").value = js[4].VALOR_PARAMETRO;
            document.getElementById("trigliceridos").value = js[5].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[6].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[7].VALOR_PARAMETRO;
            
            
        }
        
    });

}

function obtenerParametrosHemoglobina(){
    var datos = $('#formIngresarHemoglobina').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("valor").value = js[0].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[2].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[1].VALOR_PARAMETRO;
            
            
        }
        
    });
}

function obtenerParametrosRxTorax(){
    var datos = $('#formIngresarRxTorax').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            
            
            
        }
        
    });
}

function obtenerParametrosIndiceDeFramingham(){
    var datos = $('#formIngresarIndiceDeFramingham').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            var js = JSON.parse(r);

            document.getElementById("observaciones").value = js[1].VALOR_PARAMETRO;
            document.getElementById("valorIndiceDeFramingham").value = js[0].VALOR_PARAMETRO;
            
            riesgoADiezAnios();
            
        }
        
    });
}

function obtenerParametrosEncuestaDeLakeLouis(){
    var datos = $('#formIngresarEncuestaDeLakeLouis').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {

            
            
            var js = JSON.parse(r);

            var dolorDeCabeza = js[0].VALOR_PARAMETRO;
            var disminucionDeApetito = js[1].VALOR_PARAMETRO;
            var fatigaDebilidad = js[2].VALOR_PARAMETRO;
            var mareoVertigo = js[3].VALOR_PARAMETRO;
            var dificultadParaDormir = js[4].VALOR_PARAMETRO;
            
            
            
            var radioDolorDeCabeza = document.getElementsByName('dolorDeCabeza');
            
                for (i=0;i<radioDolorDeCabeza.length;i++) {
                    if(radioDolorDeCabeza[i].value == dolorDeCabeza) {
                        radioDolorDeCabeza[i].checked = true;
                    }
                }

            var radioDisminucionDeApetito = document.getElementsByName('disminucionDeApetito');
            
                for (i=0;i<radioDisminucionDeApetito.length;i++) {
                    if(radioDisminucionDeApetito[i].value == disminucionDeApetito) {
                        radioDisminucionDeApetito[i].checked = true;
                    }
                }

            var radioFatigaDebilidad = document.getElementsByName('fatigaDebilidad');
            
                for (i=0;i<radioFatigaDebilidad.length;i++) {
                    if(radioFatigaDebilidad[i].value == fatigaDebilidad) {
                        radioFatigaDebilidad[i].checked = true;
                    }
                }

            var radioMareoVertigo = document.getElementsByName('mareoVertigo');
            
                for (i=0;i<radioMareoVertigo.length;i++) {
                    if(radioMareoVertigo[i].value == mareoVertigo) {
                        radioMareoVertigo[i].checked = true;
                    }
                }
            
           
            
            var radioDificultadParaDormir = document.getElementsByName('dificultadParaDormir');
            
                for (i=0;i<radioDificultadParaDormir.length;i++) {
                    if(radioDificultadParaDormir[i].value == dificultadParaDormir) {
                        radioDificultadParaDormir[i].checked = true;
                    }
                }

            var radioDisminucionDeApetito = document.getElementsByName('disminucionDeApetito');
            
                for (i=0;i<radioDisminucionDeApetito.length;i++) {
                    if(radioDisminucionDeApetito[i].value == disminucionDeApetito) {
                        radioDisminucionDeApetito[i].checked = true;
                    }
                }

            document.getElementById('observaciones').value = js[5].VALOR_PARAMETRO;

            var puntaje = parseInt(js[0].VALOR_PARAMETRO) + parseInt(js[1].VALOR_PARAMETRO) + parseInt(js[2].VALOR_PARAMETRO) + parseInt(js[3].VALOR_PARAMETRO) + parseInt(js[4].VALOR_PARAMETRO);

            document.getElementById('puntaje').value = puntaje;
            
        }
        
    });
}

function obtenerParametrosTestDeRuffier(){
    var datos = $('#formIngresarTestDeRuffier').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("P1").value = js[0].VALOR_PARAMETRO;
            document.getElementById("P2").value = js[1].VALOR_PARAMETRO;
            document.getElementById("P3").value = js[2].VALOR_PARAMETRO;
            
            document.getElementById("valoracion").value = js[3].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[4].VALOR_PARAMETRO;
            obtenerValorTestDeRuffier();
            
        }
        
    });    
}

function obtenerParametrosCultivoNasal(){
    var datos = $('#formIngresarCultivoNasal').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });    
}

function obtenerParametrosCultivoFaringeo(){
    var datos = $('#formIngresarCultivoFaringeo').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  
}

function obtenerParametrosCultivoLechoUngueal(){
    var datos = $('#formIngresarCultivoLechoUngueal').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  
}

function obtenerParametrosAltSgpt(){
    var datos = $('#formIngresarAltSgpt').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  
}

function obtenerParametrosAstSgot(){
    
    var datos = $('#formIngresarAstSgot').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  

}

function obtenerParametrosProtrombina(){
    var datos = $('#formIngresarProtrombina').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  
}

function obtenerParametrosTiempoDeProtrombina(){
    var datos = $('#formIngresarTiempoDeProtrombina').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatos.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById("observaciones").value = js[0].VALOR_PARAMETRO;
            
        }
        
    });  

}








function obtenerParametrosAnamnesis(){

    
    var datos = $('#formIngresarAnamnesis').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);

            //document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            document.getElementById('anamnesis').value = js[0].TEXTO_ANAMNESIS;
            
        }
        
    });      
}


function obtenerParametrosExamenFisico(){
    var datos = $('#formIngresarExamenFisico').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);
            //alert(r);
            document.getElementById('examenFisicoGeneral').value = js[0].VALOR_EXAMEN_FISICO;
            document.getElementById('cabeza').value = js[1].VALOR_EXAMEN_FISICO;
            document.getElementById('torax').value = js[2].VALOR_EXAMEN_FISICO;
            document.getElementById('abdomen').value = js[3].VALOR_EXAMEN_FISICO;
            document.getElementById('extremidadesSuperiores').value = js[4].VALOR_EXAMEN_FISICO;
            document.getElementById('extremidadesInferiores').value = js[5].VALOR_EXAMEN_FISICO;
            document.getElementById('columnaGeneral').value = js[6].VALOR_EXAMEN_FISICO;
            //document.getElementById("estado").value = js[1].VALOR_PARAMETRO;
            //document.getElementById('anamnesis').value = js[0].TEXTO_ANAMNESIS;
            
        }
        
    });      
}

function obtenerParametrosConclusionMedica(){
    
    var datos = $('#formIngresarConclusionMedica').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r) {
            
            var js = JSON.parse(r);
            
            
            
            var observaciones = js[0].NOMBRE_CONCLUSION_MEDICA;
            var valor = parseInt(js[0].ID_CONCLUSION_MEDICA)-1;

            document.getElementById('observaciones').value = js[0].OBSERVACIONES;
            document.getElementById('conclusionMedica').selectedIndex = valor;
            
            //observaciones = observaciones.substr(0,2);
            //alert(observaciones);

            
            
            //document.getElementById('conclusionMedica').value = js[0].NOMBRE_CONCLUSION_MEDICA;
        }
        
    });      
}


function obtenerParametrosRecomendaciones(){
    var datos = $('#formIngresarRecomendaciones').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r) {
            var js = JSON.parse(r);

            document.getElementById('recomendacion1').checked = false;
            document.getElementById('recomendacion2').checked = false;
            document.getElementById('recomendacion3').checked = false;
            document.getElementById('recomendacion4').checked = false;
            document.getElementById('recomendacion5').checked = false;
            document.getElementById('recomendacion6').checked = false;
            document.getElementById('recomendacion7').checked = false;

            var i = 0;
            for (let i in js) {
                switch(parseInt(js[i].ID_RECOMENDACIONES)){
                    
                    case 1:
                        document.getElementById('recomendacion1').checked = true;
                    break;

                    case 2:
                        document.getElementById('recomendacion2').checked = true;
                    break;

                    case 3:
                        document.getElementById('recomendacion3').checked = true;
                    break;

                    case 4:
                        document.getElementById('recomendacion4').checked = true;
                    break;

                    case 5:
                        document.getElementById('recomendacion5').checked = true;
                    break;

                    case 6:
                        document.getElementById('recomendacion6').checked = true;
                    break;

                    case 7:
                        document.getElementById('recomendacion7').checked = true;
                    break;


                };

                //alert(parseInt(js[i].ID_RECOMENDACIONES));
                i++;
            }
            
            
            
            //var js = JSON.parse(r);
            //valor = parseInt(js[0].ID_CONCLUSION_MEDICA) - 1;
            //alert(valor);
            //document.getElementById('conclusionMedica').selectedIndex = valor;
            //alert(js[0].NOMBRE_CONCLUSION_MEDICA);
            //js[0].NOMBRE_CONCLUSION_MEDICA.selected = true;
            //document.getElementById('conclusionMedica').value = '0';
            //js[0].NOMBRE_CONCLUSION_MEDICA;
            //alert(js[0].NOMBRE_CONCLUSION_MEDICA);
        }
        
    });      
}




function obtenerParametrosInterconsulta(){
    
    var fecha = document.getElementById("");

    var datos = $('#formInterconsulta').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r){
            
            var js = JSON.parse(r);
            
            var nombreEspecialidad = js[0].NOMBRE_ESPECIALIDAD;
            var observaciones = js[0].OBSERVACIONES; 

            

            document.getElementById('especialidad').value = nombreEspecialidad;
            document.getElementById('observaciones').value = observaciones;
        } 

        
    });  
}

function obtenerParametrosInformes(){
    
     var datos = $('#formInformes').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/mostrarDatosEvaluacion.php",
        data: datos,
        success: function (r){
            //alert(r);
            
             var js = JSON.parse(r);

            var cargo =  js[0].CARGO;
            //var idEmpresa = js[0].ID_EMPRESA; 
            var nombreEmpresa = js[0].NOMBRE_EMPRESA;
            
            //alert(nombreEmpresa);
            
            //valor = parseInt(idEmpresa) - 1;


            document.getElementById('nombreEmpresa').value = nombreEmpresa;
            document.getElementById('cargoTrabajador').value = cargo; 
            
            /*  */
        } 

        
    });   
}


function obtenerPuntajeLakeLouis(){

    //var dolorDeCabeza = document.getElementById('dolorDeCabeza').value;
    
    var radioDolorDeCabeza = document.getElementsByName('dolorDeCabeza');

    for (i=0;i<radioDolorDeCabeza.length;i++){
        if(radioDolorDeCabeza[i].checked) {
            dolorDeCabeza = i+1;
        }
    }

    var radioDisminucionDeApetito = document.getElementsByName('disminucionDeApetito');

    for (i=0;i<radioDisminucionDeApetito.length;i++){
        if(radioDisminucionDeApetito[i].checked) {
            disminucionDeApetito = i+1;
        }
    }

    var radioFatigaDebilidad = document.getElementsByName('fatigaDebilidad');

    for (i=0;i<radioFatigaDebilidad.length;i++){
        if(radioFatigaDebilidad[i].checked) {
            fatigaDebilidad = i+1;
        }
    }

    var radioMareoVertigo = document.getElementsByName('mareoVertigo');

    for (i=0;i<radioMareoVertigo.length;i++){
        if(radioMareoVertigo[i].checked) {
            mareoVertigo = i+1;
        }
    }

    var radioDificultadParaDormir = document.getElementsByName('dificultadParaDormir');

    for (i=0;i<radioDificultadParaDormir.length;i++){
        if(radioDificultadParaDormir[i].checked) {
            dificultadParaDormir = i+1;
        }
    }

    var puntaje = parseInt(dolorDeCabeza) + parseInt(disminucionDeApetito) + parseInt(fatigaDebilidad) + parseInt(mareoVertigo) + parseInt(dificultadParaDormir);

    document.getElementById('puntaje').value = puntaje;
}

function obtenerValorTestDeRuffier(){
    
    var P1 = document.getElementById('P1').value;
    var P2 = document.getElementById('P2').value;
    var P3 = document.getElementById('P3').value;

    var valoracion = (parseInt(P1)+parseInt(P2)+parseInt(P3)-200)/10;

  
    if(!isNumeric(valoracion)){
        document.getElementById('valoracionTexto').value = 'INVÁLIDO';
        return false;
    }

    if(P1 == '' || P2 == '' || P3 ==''){
        document.getElementById('valoracionTexto').value = 'INVÁLIDO';
        return false;
    }

    if(valoracion <= 0){
        texto = 'EXCELENTE';
    }else if(valoracion >= 0.1 && valoracion <= 5){
        texto = 'BUENO';
    }else if(valoracion >= 5.1 && valoracion <= 10){
        texto = 'MEDIO';
    }else if(valoracion >= 10.1 && valoracion <= 15){
        texto = 'INSUFICIENTE';
    }else if(valoracion >= 15.1){
        texto = 'MALO';
    }

    document.getElementById('valoracion').value = valoracion;
    document.getElementById('valoracionTexto').value = texto;
    

} 

function calcularPorcentajeCVF(){
    var CVF = document.getElementById('absoluto1').value;
    //var VEF = document.getElementById('absoluto2').value;

    var porcentaje = CVF*100/4.67;
    document.getElementById('teorico1').value = porcentaje.toFixed(2);

    calcularPorcentajeVEFCVF();
}

function calcularPorcentajeVEF(){
    var VEF = document.getElementById('absoluto2').value;
    var porcentaje = VEF*100/3.89;

    document.getElementById('teorico2').value = porcentaje.toFixed(2);

    calcularPorcentajeVEFCVF();
}

function calcularPorcentajeFEF(){
    var FEF = document.getElementById('absoluto3').value;
    var porcentaje = FEF*100/4.19;

    document.getElementById('teorico3').value = porcentaje.toFixed(2);

    
}

function calcularPorcentajeVEFCVF(){
    var CVF = document.getElementById('absoluto1').value;
    var VEF = document.getElementById('absoluto2').value;
    if(CVF != '' || VEF != ''){
        var VEFCVF = VEF/CVF; 
    }else{
        VEFCVF = '';
    }
    document.getElementById('absoluto4').value = VEFCVF.toFixed(2);
}



function obtenerIMC() {
    peso = 0;
    altura = 0;

    peso = document.getElementById('peso').value;
    altura = document.getElementById('altura').value;

    imc = peso / ((altura * altura) / 10000);

    if (peso == '' || altura == '') {
        document.getElementById('imc').value = '0';
    } else if (isNumeric(imc)) {
        document.getElementById('imc').value = imc.toFixed(2);
    }

}


function mostrarIngresarEmpresa(){
    $("#contenido").load("ingresarEmpresa.php");
}

function mostrarEditarEmpresa(){
    $("#contenido").load("editarEmpresa.php");
    document.getElementById("selectNombreEmpresa").focus();
}

function mostrarIngresarTrabajador(){
    $("#contenido").load("ingresarTrabajador.php");
}

function mostrarEditarTrabajador(){
    $("#contenido").load("editarTrabajador.php");
    document.getElementById("selectNombreTrabajador").focus();
}


function mostrarSignosVitales2(){
    $("#contenido").load("vistasexamenes/signosvitales.php");
}

function mostrarSignosVitales(){
    $("#contenidoExamen").load("vistasexamenes/signosvitales.php");
}

function mostrarOptometria() {
    $("#contenidoExamen").load("vistasexamenes/optometria.php");
}

function mostrarElectrocardiograma() {
    $("#contenidoExamen").load("vistasexamenes/electrocardiograma.php");
}

function mostrarGlicemia() {
    $("#contenidoExamen").load("vistasexamenes/glicemia.php");
}

function mostrarEspirometriaBasal() {
    $("#contenidoExamen").load("vistasexamenes/espirometriabasal.php");
}


function mostrarAudiometria() {
    $("#contenidoExamen").load("vistasexamenes/audiometria.php");
    //graficoAudiometria();
}


function mostrarCreatinina() {
    $("#contenidoExamen").load("vistasexamenes/creatinina.php");
}


function mostrarPerfilLipidico() {
    $("#contenidoExamen").load("vistasexamenes/perfillipidico.php");
}


function mostrarHemoglobina() {
    $("#contenidoExamen").load("vistasexamenes/hemoglobina.php");
}


function mostrarRxTorax() {
    $("#contenidoExamen").load("vistasexamenes/rxtorax.php");
}


function mostrarIndiceDeFramingham() {
    $("#contenidoExamen").load("vistasexamenes/indicedeframingham.php");
}


function mostrarEncuestaDeLakeLouis() {
    $("#contenidoExamen").load("vistasexamenes/encuestadelakelouis.php");
}


function mostrarTestDeRuffier() {
    $("#contenidoExamen").load("vistasexamenes/testderuffier.php");
}


function mostrarHemograma() {
    $("#contenidoExamen").load("vistasexamenes/hemograma.php");
}


function mostrarCultivoNasal() {
    $("#contenidoExamen").load("vistasexamenes/cultivonasal.php");
}


function mostrarCultivoFaringeo() {
    $("#contenidoExamen").load("vistasexamenes/cultivofaringeo.php");
}


function mostrarCultivoLechoUngueal() {
    $("#contenidoExamen").load("vistasexamenes/cultivolechoungueal.php");
}


function mostrarALTSGPT() {
    $("#contenidoExamen").load("vistasexamenes/altsgpt.php");
}


function mostrarASTSGOT() {
    $("#contenidoExamen").load("vistasexamenes/astsgot.php");
}


function mostrarProtrombina() {
    $("#contenidoExamen").load("vistasexamenes/protrombina.php");
}


function mostrarTiempoDeProtrombina() {
    $("#contenidoExamen").load("vistasexamenes/tiempodeprotrombina.php");
}


function mostrarActividadDeAcetilcolinesterasa() {
    $("#contenidoExamen").load("vistasexamenes/actividaddeacetilcolinesterasa.php");
}



/***********************************************/




function mostrarAnamnesis(){
    $("#contenido").load("anamnesis.php");
}

function mostrarExamenFisico(){
    $("#contenido").load("examenfisico.php");
}

function mostrarExamenesDeApoyoClinico(){
    $("#contenido").load("examenesdeapoyoclinico.php");
}

function mostrarConclusionMedica(){
    $("#contenido").load("conclusionmedica.php");
}

function mostrarInterconsulta(){
    $("#contenido").load("interconsulta.php");
}

function mostrarRecomendaciones(){
    $("#contenido").load("recomendaciones.php");
}

function mostrarInformes(){
    $("#contenido").load("previoInformes.php");
}





function generarInformes(){
    
    var datos = $('#formInformes').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insertarInformes.php",
        data: datos,
        success: function (r) {
            
            mensajeEnPantalla(r);                   
            var js = JSON.parse(r);
            
            //alert(r);
            
            //valor = parseInt(js[0].ID_CONCLUSION_MEDICA) - 1;
            
            //document.getElementById('conclusionMedica').selectedIndex = valor;
            
        }
        
    });  
}

function generarInformeEmpresa(){

    cargoTrabajador = document.getElementById("cargoTrabajador").value;

    if(!validarBlanco(cargoTrabajador)){
        mensajeEnPantalla("Debe rellenar el campo cargo","","error");
        return false;
    }
    
    document.getElementById("formInformes").action = "informes/informeEmpresa.php"; 
}

function generarInformeTrabajador(){
    cargoTrabajador = document.getElementById("cargoTrabajador").value;

    if(!validarBlanco(cargoTrabajador)){
        mensajeEnPantalla("Debe rellenar el campo cargo","","error");
        return false;
    }
    document.getElementById("formInformes").action = "informes/informeTrabajador.php"; 
}

function revisarPDFTrabajador(nameId){
    
    //nameId='#formInformes1';
    
    var datos = $(nameId).serialize();
    $.ajax({
        type: "POST",
        url: "ingresarDatosInformes.php",
        data: datos,
        success: function (r) {
            
            if (r == 'true') {
                window.open("informes/informeTrabajador.php","Informe trabajador","fullscreen=yes");
            } else if (r == 'false') {
                //mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
            
        }
    });

}

function revisarPDFEmpresa(nameId){

    var datos = $(nameId).serialize();
    $.ajax({
        type: "POST",
        url: "ingresarDatosInformes.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.open("informes/informeEmpresa.php","Informe empresa","fullscreen=yes");
                //width=700,height=700,scrollbars=NO
            } else if (r == 'false') {
                //mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
            
        }
    });
}

function revisarPDFInterconsulta(nameId){
//    alert("hola");

    //var form = document.getElementById().value;
    /* var 
    
    alert(fechaHora); */
    //var nombreForm = "#"+fechaHora;
    //alert(nombreForm);
    //alert("hola2");

    /* if(!validarBlanco(fechaHora)){
        mensajeEnPantalla("No hay informes para mostrar. Si desea generar un informe de Interconsulta, seleccione una especialidad, rellene el campo Observaciones y presione Generar informe","","error");
        return false;
    } */
    


    //var fechaHora = document.getElementById("fechaHora").value;
    //var nameId = document.getElementById("nameId").value;
    //alert(fechaHora + " - " + nameId);

    var datos = $(nameId).serialize();
    $.ajax({
        type: "POST",
        url: "ingresarDatosInterconsulta.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                window.open("informes/informeInterconsulta.php","Informe empresa","fullscreen=yes");
                
            } else if (r == 'false') {
                
            }
        }
    });
}

function verInformePDF(){

    var datos = $('#formInterconsulta').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarAnamnesis();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    });
}




function validarAnamnesis(){

    var anamnesis = document.getElementById('anamnesis').value;
    if(!validarBlanco(anamnesis)){
        mensajeEnPantalla("Para ingresar la anamnesis escriba en el campo de texto y presione guardar","","error");
        return false;
    }
    var datos = $('#formIngresarAnamnesis').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarAnamnesis();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    });
}

function desbloquearBotonAnamnesis(){
    var anamnesis = document.getElementById('anamnesis').value;

    if(validarBlanco(anamnesis)){
        document.getElementById('btnGuardarAnamnesis').removeAttribute("disabled",true);
    }else{
        document.getElementById('btnGuardarAnamnesis').setAttribute("disabled",true);
    }
}


function validarExamenFisico(){

    var examenFisicoGeneral = document.getElementById('examenFisicoGeneral').value;
    var cabeza = document.getElementById('cabeza').value;
    var torax = document.getElementById('torax').value;
    var abdomen = document.getElementById('abdomen').value;
    var extremidadesSuperiores = document.getElementById('extremidadesSuperiores').value;
    var extremidadesInferiores= document.getElementById('extremidadesInferiores').value;
    var columnaGeneral = document.getElementById('columnaGeneral').value;
    

    if(!validarBlanco(examenFisicoGeneral) && !validarBlanco(cabeza) && !validarBlanco(torax) && !validarBlanco(abdomen) && !validarBlanco(extremidadesSuperiores) && !validarBlanco(extremidadesInferiores) && !validarBlanco(columnaGeneral)){
        mensajeEnPantalla("Debe rellenar al menos un campo","","error");
        return false;
    }

    var datos = $('#formIngresarExamenFisico').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarExamenFisico();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    });
    
}

function revisarExamenesDeApoyoClinico(){
    
    var optometria = document.getElementById('OPTOMETRIA').value;
    //var electroCardiograma = document.getElementById('ELECTROCARDIOGRAMA').value;

    


}


function validarConclusionMedica(){
    var conclusionMedica = document.getElementById('conclusionMedica').value;

    if(!validarBlanco(conclusionMedica)){
        mensajeEnPantalla("Para ingresar la conclusión médica escriba en el campo de texto y presione guardar","","error");
        return false;
    }

    seleccion = document.getElementById("conclusionMedica").value;
    //alert(seleccion);
    
    if(seleccion != "A1" && seleccion != "A2" && seleccion != "A3" && seleccion != "B" && seleccion != "C" && seleccion != "D" && seleccion != "E"){
        return false;
    }

     var datos = $('#formIngresarConclusionMedica').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarConclusionMedica();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    }); 


}


function validarInterconsulta() {


    var observaciones = document.getElementById('observaciones').value;
    var especialidad = document.getElementById('especialidad').value;

        if(especialidad != 'MEDICINA GENERAL' &&
            especialidad != 'CARDIOLOGIA' &&
            especialidad != 'OFTALMOLOGIA' &&
            especialidad != 'TRAUMATOLOGIA' &&
            especialidad != 'PSIQUIATRIA' &&
            especialidad != 'NEUROLOGIA' &&
            especialidad != 'OTORRINOLARINGOLOGIA' &&
            especialidad != 'BRONCOPULMONAR' &&
            especialidad != 'GASTROENTEROLOGIA' &&
            especialidad != 'ENDOCRINOLOGIA') {
            //window.location.replace("informeinterconsulta.php");
            mensajeEnPantalla("Error", "Debe elegir una especialidad", "error");
            return false;
        }


     if(observaciones.length > 600){
         mensajeEnPantalla("Campo observaciones tiene demasiados caracteres. Máximo 600.","","error");
         return false;
     }

    var datos = $('#formInterconsulta').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insertarInterconsulta.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarInterconsulta();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
            //alert(r);
        }
    }); 

    return true;
    valido = false;
    //var rutTrabajador = document.getElementById("rutTrabajador").value;
    var especialidad = document.getElementById("especialidad").value;

    /* //VALIDAR CAMPO
    if (!validarBlanco(rutTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar campo RUT", "error");
        return valido;
    }
 */
    /* if (rutTrabajador.length > 13) {
        mensajeEnPantalla("Error", "El campo no debe tener más de 12 caracteres contando puntos y guión", "error");
        return valido;
    } */

    /* if (!validarRegExp(rutTrabajador, /^\d{1,3}\.\d{3}\.\d{3}[-][0-9kK]{1}$/)) {
        mensajeEnPantalla("Error", "Formato no válido.", "error");
        return valido;
    } */




    /* var datos = $('#formInterconsulta').serialize();
    $.ajax({
        type: "POST",
        url: "../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {

            } else if (r == 'false') {

                mensajeEnPantalla("Trabajador no existe", "Seleccione 'Ingresar trabajador' en el menú de la izquierda para agregar un nuevo trabajador", "error");
                return false;
            }
        }
    });
 */

    





    //return valido;

}


function validarRecomendaciones(){

    
    
    var recomendacion1 = document.getElementById('recomendacion1').value;
    var recomendacion2 = document.getElementById('recomendacion2').value;
    var recomendacion3 = document.getElementById('recomendacion3').value;
    var recomendacion4 = document.getElementById('recomendacion4').value;
    var recomendacion5 = document.getElementById('recomendacion5').value;
    var recomendacion6 = document.getElementById('recomendacion6').value;
    var recomendacion7 = document.getElementById('recomendacion7').value;
     
    //mensajeEnPantalla(recomendacion1)
    var validarCheckBoxRecomendacion1 = document.getElementById("recomendacion1").checked;
    var validarCheckBoxRecomendacion2 = document.getElementById("recomendacion2").checked;
    var validarCheckBoxRecomendacion3 = document.getElementById("recomendacion3").checked;
    var validarCheckBoxRecomendacion4 = document.getElementById("recomendacion4").checked;
    var validarCheckBoxRecomendacion5 = document.getElementById("recomendacion5").checked;
    var validarCheckBoxRecomendacion6 = document.getElementById("recomendacion6").checked;
    var validarCheckBoxRecomendacion7 = document.getElementById("recomendacion7").checked;
    
    var suma = 0;
    var seleccionados = document.getElementsByName('seleccionado[]');
    for (var i = 0, j = seleccionados.length; i < j; i++) {
        if (seleccionados[i].checked == true) {
            suma++;
        }
    }

    if (suma == 0) {
        mensajeEnPantalla("Error", "No seleccionó ninguna casilla ", "error");
        return false;
    }
    
    /* var recomendaciones = "";

    if(validarCheckBoxRecomendacion1){
       recomendaciones += recomendacion1 + " / ";
    }

    if(validarCheckBoxRecomendacion2){
        recomendaciones += recomendacion2 + " / ";
     }

     if(validarCheckBoxRecomendacion3){
        recomendaciones += recomendacion3 + " / ";
     }

     if(validarCheckBoxRecomendacion4){
        recomendaciones += recomendacion4 + " / ";
     }

     if(validarCheckBoxRecomendacion5){
        recomendaciones += recomendacion5 + " / ";
     }

     if(validarCheckBoxRecomendacion6){
        recomendaciones += recomendacion6 + " / ";
     }

     if(validarCheckBoxRecomendacion7){
        recomendaciones += recomendacion7 + " / ";
     }
     
     recomendaciones = recomendaciones.substring(0,recomendaciones.length -3)
      */
     //document.getElementById("cadenaRecomendaciones").value = recomendaciones;


    if(!validarBlanco(cadenaRecomendaciones)){
        mensajeEnPantalla("No hay recomendaciones");
        return false;
    }


    var datos = $('#formIngresarRecomendaciones').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
                
                mostrarRecomendaciones();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                
            }

            

        }
    });


}


function ingresarDatosInformes(){
    
    var datos = $('#formInformes').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insertarInformes.php",
        data: datos,
        success: function (r) {
            //alert(r);
            if (r == 'true') {

                mensajeEnPantalla("Se ingresaron los datos","","success");
                mostrarInformes();
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
            //alert(r);
            
        }
    }); 

}


function finalizar(){

    Swal.fire({
        title: "¿Desea finalizar esta evaluacion? No podrá modificarla posteriormente",
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            
            var datos = $('#finalizarEvaluacion').serialize();
                $.ajax({
                    type: "POST",
                    url: "../../consultas/finalizarEvaluacion.php",
                    data: datos,
                    success: function (r) {
                        //alert(r);
                        if (r == 'true'){
                            window.location.replace('../index.php');
                            //mostrarInformes();
                        } else if (r == 'false') {
                            mensajeEnPantalla("No se han ingresado los datos", "", "error");
                        }
                        //alert(r);
                    
                    }
                }); 
        } else {
            //mensajeEnPantalla("No se han modificado los datos", "", "error");
        }
    })


    
}
/* function finalizarEvaluacion(){
    alert("HOLA");
    
} */


function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function validarCheckBoxExamenes() {

    var suma = 0;
    var seleccionados = document.getElementsByName('seleccionado[]');
    for (var i = 0, j = seleccionados.length; i < j; i++) {

        if (seleccionados[i].checked == true) {
            suma++;
        }
    }

    if (suma == 0) {
        mensajeEnPantalla("Error", "Debe seleccionar al menos una casilla", "error");
        return false;
    } else {
        return true;
    }

}

function volverAInicio(){


    Swal.fire({
        title: "Confirmación",
        text: "¿Desea volver al inicio? perderá la información que no se haya guardado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Volver al inicio',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            window.location.replace('../index.php')
        }
    })

    
    
}


//SE APLICA LA FÓRMULA DE RUT CHILENO
function formulaRut(rut, dv) {

    //SI EL LARGO DEL RUT ES 7 SE AGREGAN DOS 0 Y SI ES 8 SE AGREGA 1. SI EL LARGO ES 9 SE DEJA IGUAL.
    switch (rut.length) {
        case 7:
            rut = "00" + rut;
            break;

        case 8:
            rut = "0" + rut;
            break;

        case 9:
            rut = rut;
            break;
    }

    //SECUENCIA PARA MULTIPLICAR POR DIGITOS DEL RUT
    var valores = [4, 3, 2, 7, 6, 5, 4, 3, 2];
    //SE INICIALIZA LA SUMA
    var suma = 0;

    //SE ITERA PARA MULTIPLICAR EL RUT POR LA SECUENCIA ANTERIOR
    for (i = 0; i < rut.length; i++) {
        suma += (valores[i] * parseInt(rut.substr(i, 1)));
    }

    //SE DIVIDE SUMA EN 11 Y SE OBTIENE EL RESTO (SUMA%11). A 11 SE LE RESTA EL RESTO
    calculodv = 11 - (suma % 11);

    // SI EL RESTO ES 10 EL DV ES K Y SI ES 11 EL DV ES 0
    switch (calculodv) {
        case 10:
            calculodv = 'K';
            break;

        case 11:
            calculodv = 0;
            break;
        default: ;
    }

    //SI DV Y CALCULO DV SON IGUALES SE RETORNA TRUE O FALSE Y SE PUEDE AVANZAR;
    if (calculodv == dv) {

        return true;
    } else {

        return false;
    }

}

//VALIDAR CAMPOS EN BLANCO
function validarBlanco(texto) {


    if (texto == "") {
        valido = false;
    } else {
        valido = true;
    }
    return valido;
}


//MOSTRAR MENSAJES SWEETALERT2
function mensajeEnPantalla(titulo, mensaje, icono) {
    Swal.fire(
        titulo,
        mensaje,
        icono
    )
}

/* function mensajeConfirmacion(tituloConfirmacion, textoConfirmacion) {
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
            return '0';
        } else {
            return '1';
        }
    });



} */

function mensajeConfirmacion() {

    Swal.fire({
        title: "Confirmación",
        text: "¿Desea ingresar los datos?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Avanzar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            return true;
        } else {
            return false;
        }
    })

}


//VALIDAR EXPRESIONES REGULARES
function validarRegExp(texto, regEx) {

    if (regEx.test(texto)) {
        return true;
    } else {
        return false;
    }

}

//VALIDAR SI EXISTE FECHA
function existeFecha(fecha) {
    var fechaf = fecha.split("-");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year, month, '0');
    if ((day - 0) > (date.getDate() - 0)) {
        return false;
    }
    return true;
}

//FORMATEA EL RUT
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
        document.getElementById("rutTrabajador").value = rutPuntos;
    }


}

//LIMPIA UN CAMPO SI SE ESCRIBE ALGO DISTINTO A UN NUMERO
function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
}


function limpiarRut(obj) {

    if (validarRegExp(obj.value, /\D/g)) {
        if (obj.value.substr(-1, 1) == 'k' || obj.value.substr(-1, 1) == 'K') {

        } else {
            obj.value = obj.value.replace(/\D/g, '');
        }
    }
}


function graficoAudiometria(){
    
/* var numeroMenor = -10;
var numeroMayor = 120; */

var tamañoPunto = 5;
var tamañoPuntoHover = 20;

var VAOD125 = document.getElementById("VAOD125").value;
var VAOD250 = document.getElementById("VAOD250").value;
var VAOD500 = document.getElementById("VAOD500").value;
var VAOD1000 = document.getElementById("VAOD1000").value;
var VAOD2000 = document.getElementById("VAOD2000").value;
var VAOD3000 = document.getElementById("VAOD3000").value;
var VAOD4000 = document.getElementById("VAOD4000").value;
var VAOD6000 = document.getElementById("VAOD6000").value;
var VAOD8000 = document.getElementById("VAOD8000").value;

var VAOI125 = document.getElementById("VAOI125").value;
var VAOI250 = document.getElementById("VAOI250").value;
var VAOI500 = document.getElementById("VAOI500").value;
var VAOI1000 = document.getElementById("VAOI1000").value;
var VAOI2000 = document.getElementById("VAOI2000").value;
var VAOI3000 = document.getElementById("VAOI3000").value;
var VAOI4000 = document.getElementById("VAOI4000").value;
var VAOI6000 = document.getElementById("VAOI6000").value;
var VAOI8000 = document.getElementById("VAOI8000").value;

var VOOD125 = document.getElementById("VOOD125").value;
var VOOD250 = document.getElementById("VOOD250").value;
var VOOD500 = document.getElementById("VOOD500").value;
var VOOD1000 = document.getElementById("VOOD1000").value;
var VOOD2000 = document.getElementById("VOOD2000").value;
var VOOD3000 = document.getElementById("VOOD3000").value;
var VOOD4000 = document.getElementById("VOOD4000").value;
var VOOD6000 = document.getElementById("VOOD6000").value;
var VOOD8000 = document.getElementById("VOOD8000").value;

var VOOI125 = document.getElementById("VOOI125").value;
var VOOI250 = document.getElementById("VOOI250").value;
var VOOI500 = document.getElementById("VOOI500").value;
var VOOI1000 = document.getElementById("VOOI1000").value;
var VOOI2000 = document.getElementById("VOOI2000").value;
var VOOI3000 = document.getElementById("VOOI3000").value;
var VOOI4000 = document.getElementById("VOOI4000").value;
var VOOI6000 = document.getElementById("VOOI6000").value;
var VOOI8000 = document.getElementById("VOOI8000").value;

//if(!validarBlanco(VAOD125 < -10 || VAOD125 >120){VAOD125=null; alert(VAOD125);}

regex = /^-?\d{0,3}$/;


if(!validarBlanco(VAOD125) || VAOD125 <= -11 || VAOD125 > 120 || !validarRegExp(VAOD125,regex)){ $VAOD125=null; document.getElementById("VAOD125").value = ""; }
if(!validarBlanco(VAOD250) || VAOD250 <= -11 || VAOD250 > 120 || !validarRegExp(VAOD250,regex) ){ VAOD250=null; document.getElementById("VAOD250").value = "";}
if(!validarBlanco(VAOD500) || VAOD500 <= -11 || VAOD500 > 120 || !validarRegExp(VAOD500,regex) ){ VAOD500=null; document.getElementById("VAOD500").value = "";}
if(!validarBlanco(VAOD1000) || VAOD1000 <= -11 || VAOD1000 > 120 || !validarRegExp(VAOD1000,regex)){ VAOD1000=null; document.getElementById("VAOD1000").value = "";}
if(!validarBlanco(VAOD2000) || VAOD2000 <= -11 || VAOD2000 > 120 || !validarRegExp(VAOD2000,regex)){ VAOD2000=null; document.getElementById("VAOD2000").value = "";}
if(!validarBlanco(VAOD3000) || VAOD3000 <= -11 || VAOD3000 > 120 || !validarRegExp(VAOD3000,regex)){ VAOD3000=null; document.getElementById("VAOD3000").value = "";}
if(!validarBlanco(VAOD4000) || VAOD4000 <= -11 || VAOD4000 > 120 || !validarRegExp(VAOD4000,regex)){ VAOD4000=null; document.getElementById("VAOD4000").value = "";}
if(!validarBlanco(VAOD6000) || VAOD6000 <= -11 || VAOD6000 > 120 || !validarRegExp(VAOD6000,regex)){ VAOD6000=null; document.getElementById("VAOD6000").value = "";}
if(!validarBlanco(VAOD8000) || VAOD8000 <= -11 || VAOD8000 > 120 || !validarRegExp(VAOD8000,regex)){ VAOD8000=null; document.getElementById("VAOD8000").value = "";}

if(!validarBlanco(VAOI125) || VAOI125 <= -11 || VAOI125 > 120 || !validarRegExp(VAOI125,regex)){ VAOI125=null; document.getElementById("VAOI125").value = ""; }
if(!validarBlanco(VAOI250) || VAOI250 <= -11 || VAOI250 > 120 || !validarRegExp(VAOI250,regex) ){ VAOI250=null; document.getElementById("VAOI250").value = "";}
if(!validarBlanco(VAOI500) || VAOI500 <= -11 || VAOI500 > 120 || !validarRegExp(VAOI500,regex) ){ VAOI500=null; document.getElementById("VAOI500").value = "";}
if(!validarBlanco(VAOI1000) || VAOI1000 <= -11 || VAOI1000 > 120 || !validarRegExp(VAOI1000,regex)){ VAOI1000=null; document.getElementById("VAOI1000").value = "";}
if(!validarBlanco(VAOI2000) || VAOI2000 <= -11 || VAOI2000 > 120 || !validarRegExp(VAOI2000,regex)){ VAOI2000=null; document.getElementById("VAOI2000").value = "";}
if(!validarBlanco(VAOI3000) || VAOI3000 <= -11 || VAOI3000 > 120 || !validarRegExp(VAOI3000,regex)){ VAOI3000=null; document.getElementById("VAOI3000").value = "";}
if(!validarBlanco(VAOI4000) || VAOI4000 <= -11 || VAOI4000 > 120 || !validarRegExp(VAOI4000,regex)){ VAOI4000=null; document.getElementById("VAOI4000").value = "";}
if(!validarBlanco(VAOI6000) || VAOI6000 <= -11 || VAOI6000 > 120 || !validarRegExp(VAOI6000,regex)){ VAOI6000=null; document.getElementById("VAOI6000").value = "";}
if(!validarBlanco(VAOI8000) || VAOI8000 <= -11 || VAOI8000 > 120 || !validarRegExp(VAOI8000,regex)){ VAOI8000=null; document.getElementById("VAOI8000").value = "";}

if(!validarBlanco(VOOD125) || VOOD125 <= -11 || VOOD125 > 120 || !validarRegExp(VOOD125,regex)){ VOOD125=null; document.getElementById("VOOD125").value = ""; }
if(!validarBlanco(VOOD250) || VOOD250 <= -11 || VOOD250 > 120 || !validarRegExp(VOOD250,regex) ){ VOOD250=null; document.getElementById("VOOD250").value = "";}
if(!validarBlanco(VOOD500) || VOOD500 <= -11 || VOOD500 > 120 || !validarRegExp(VOOD500,regex) ){ VOOD500=null; document.getElementById("VOOD500").value = "";}
if(!validarBlanco(VOOD1000) || VOOD1000 <= -11 || VOOD1000 > 120 || !validarRegExp(VOOD1000,regex)){ VOOD1000=null; document.getElementById("VOOD1000").value = "";}
if(!validarBlanco(VOOD2000) || VOOD2000 <= -11 || VOOD2000 > 120 || !validarRegExp(VOOD2000,regex)){ VOOD2000=null; document.getElementById("VOOD2000").value = "";}
if(!validarBlanco(VOOD3000) || VOOD3000 <= -11 || VOOD3000 > 120 || !validarRegExp(VOOD3000,regex)){ VOOD3000=null; document.getElementById("VOOD3000").value = "";}
if(!validarBlanco(VOOD4000) || VOOD4000 <= -11 || VOOD4000 > 120 || !validarRegExp(VOOD4000,regex)){ VOOD4000=null; document.getElementById("VOOD4000").value = "";}
if(!validarBlanco(VOOD6000) || VOOD6000 <= -11 || VOOD6000 > 120 || !validarRegExp(VOOD6000,regex)){ VOOD6000=null; document.getElementById("VOOD6000").value = "";}
if(!validarBlanco(VOOD8000) || VOOD8000 <= -11 || VOOD8000 > 120 || !validarRegExp(VOOD8000,regex)){ VOOD8000=null; document.getElementById("VOOD8000").value = "";}

if(!validarBlanco(VOOI125) || VOOI125 <= -11 || VOOI125 > 120 || !validarRegExp(VOOI125,regex)){ VOOI125=null; document.getElementById("VOOI125").value = ""; }
if(!validarBlanco(VOOI250) || VOOI250 <= -11 || VOOI250 > 120 || !validarRegExp(VOOI250,regex) ){ VOOI250=null; document.getElementById("VOOI250").value = "";}
if(!validarBlanco(VOOI500) || VOOI500 <= -11 || VOOI500 > 120 || !validarRegExp(VOOI500,regex) ){ VOOI500=null; document.getElementById("VOOI500").value = "";}
if(!validarBlanco(VOOI1000) || VOOI1000 <= -11 || VOOI1000 > 120 || !validarRegExp(VOOI1000,regex)){ VOOI1000=null; document.getElementById("VOOI1000").value = "";}
if(!validarBlanco(VOOI2000) || VOOI2000 <= -11 || VOOI2000 > 120 || !validarRegExp(VOOI2000,regex)){ VOOI2000=null; document.getElementById("VOOI2000").value = "";}
if(!validarBlanco(VOOI3000) || VOOI3000 <= -11 || VOOI3000 > 120 || !validarRegExp(VOOI3000,regex)){ VOOI3000=null; document.getElementById("VOOI3000").value = "";}
if(!validarBlanco(VOOI4000) || VOOI4000 <= -11 || VOOI4000 > 120 || !validarRegExp(VOOI4000,regex)){ VOOI4000=null; document.getElementById("VOOI4000").value = "";}
if(!validarBlanco(VOOI6000) || VOOI6000 <= -11 || VOOI6000 > 120 || !validarRegExp(VOOI6000,regex)){ VOOI6000=null; document.getElementById("VOOI6000").value = "";}
if(!validarBlanco(VOOI8000) || VOOI8000 <= -11 || VOOI8000 > 120 || !validarRegExp(VOOI8000,regex)){ VOOI8000=null; document.getElementById("VOOI8000").value = ""; }


/* var VAOD125 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD250 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD500 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD1000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD2000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD3000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD4000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD6000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOD8000 = numeroAleatorio(numeroMenor,numeroMayor);

var VAOI125 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI250 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI500 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI1000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI2000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI3000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI4000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI6000 = numeroAleatorio(numeroMenor,numeroMayor);
var VAOI8000 = numeroAleatorio(numeroMenor,numeroMayor);

var VOOD125 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD250 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD500 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD1000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD2000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD3000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD4000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD6000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOD8000 = numeroAleatorio(numeroMenor,numeroMayor);

var VOOI125 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI250 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI500 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI1000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI2000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI3000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI4000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI6000 = numeroAleatorio(numeroMenor,numeroMayor);
var VOOI8000 = numeroAleatorio(numeroMenor,numeroMayor); */




var ctx = document.getElementById('graficoAudiometria').getContext('2d');

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['','125 Hz', '250 Hz', '500 Hz', '1000 Hz', '2000 Hz', '3000 Hz', '4000 Hz','6000 Hz','8000 Hz',''],
        datasets: [{
            label: 'VAOD',
            backgroundColor: 'rgb(255, 99, 132,0)',
            borderColor: 'rgb(0, 0, 200)',
            data: [null, VAOD125, VAOD250, VAOD500, VAOD1000, VAOD2000, VAOD3000, VAOD4000, VAOD6000, VAOD8000,null],
            tension:0,
            pointStyle:'circle',
            borderWidth:'2',
            pointRadius:tamañoPunto,
            pointHoverRadius:tamañoPuntoHover,
            pointBackgroundColor: 'rgb(0, 0, 200)',
            fill:false
            
        },{
          label: 'VAOI',
          backgroundColor: 'rgb(255, 99, 132,0)',
          borderColor: 'rgb(210, 31, 31)',
          data: [null, VAOI125, VAOI250, VAOI500, VAOI1000, VAOI2000, VAOI3000, VAOI4000, VAOI6000, VAOI8000,null],
          tension:0,
          pointStyle:'cross',
          borderWidth:'2',
          pointRadius:tamañoPunto,
            pointHoverRadius:tamañoPuntoHover,
          pointBackgroundColor: 'rgb(210, 31, 31)',
          fill:false
          
      },{
        label: 'VOOD',
        backgroundColor: 'rgb(255, 99, 132,0)',
        borderColor: 'rgb(0, 200, 0)',
        data: [null, VOOD125, VOOD250, VOOD500, VOOD1000, VOOD2000, VOOD3000, VOOD4000, VOOD6000, VOOD8000,null],
        tension:0,
        pointStyle:'star',
        borderWidth:'2',
        pointRadius:tamañoPunto,
            pointHoverRadius:tamañoPuntoHover,
          pointBackgroundColor: 'rgb(0, 200, 0)', 
          fill:false
          
        
      },{
        label: 'VOOI',
        backgroundColor: 'rgb(255, 99, 132, 0)',
        borderColor: 'rgb(200, 200, 0)',
        data: [null, VOOI125, VOOI250, VOOI500, VOOI1000, VOOI2000, VOOI3000, VOOI4000, VOOI6000, VOOI8000,null],
        tension:0,
        pointStyle:'triangle',
        borderWidth:'2',
        pointRadius:tamañoPunto,
        pointHoverRadius:tamañoPuntoHover,
        pointBackgroundColor: 'rgb(200, 200, 0)',
        fill:false
        
    }

    ,{
        label: 'LÍMITE',
        backgroundColor: 'rgb(255, 255, 255, 0)',
        borderColor: 'rgb(0, 0, 0)',
        data: [25,25,25,25,25,25,25,25,25,25,25],
        tension:0,
        pointStyle:'none',
        borderWidth:'3',
        pointRadius:0,
        pointHoverRadius:0,
        pointBackgroundColor: 'rgb(255,255,255)',
        fill:false,
        borderDash:[20,10]
        
    }
      
      ]

        
    },

    // Configuration options go here
    options: {
        animation: {
            duration: 0, // general animation time
        },
      tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                return tooltipItem.yLabel+" dB(HL)";
            }
        }
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          gridLines: {
            //display: true
          },
          stacked: true,
          
          scaleLabel: {
            display: true,
            labelString: 'Frecuencia (Hz)'
            
          }
        }],
        yAxes: [{
          gridLines: {
            display: true
          },
          //stacked: true,
          
          
          scaleLabel: {
            display: true,
            labelString: 'Intensidad (dB(HL))'
          },
          ticks: {
            min: 120,
            max: -10,
            reverse: true,
             callback: function (value, index, values) {
              return Number(value.toString());//pass tick values as a string into Number function
          },  

            // forces step size to be 5 units
            stepSize: 10
          },
           afterBuildTicks: function (chartObj) { //Build ticks labelling as per your need
           //chartObj.ticks = ['120','110','100','90','80','70','60','50','40','30','20','10','0','-10'];
           chartObj.ticks = ['-10','0','10','20','30','40','50','60','70','80','90','100','110','120'];
          } 
        }]
      },


    }
});
}

function numeroAleatorio(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}