
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

    $("#ingresarEmpresa").click(function () {
        nombre = "Ingresar empresa";
        pagina = "ingresarEmpresa.php";
        confirmar(nombre, pagina);
    });

    $("#ingresarTrabajador").click(function () {
        nombre = "Ingresar Trabajador";
        pagina = "ingresarTrabajador.php";
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
    if (validarBlanco(direccionEmpresa)) {
        if (direccionEmpresa.length > 64) {
            mensajeEnPantalla("Error", "Dirección empresa no puede tener más de 64 caracteres", "error");
            return valido;
        }

        if (!validarRegExp(direccionEmpresa, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
            mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
            return valido;
        }
    }

    //VALIDAR EMAIL-TELEFONO
    if (!validarBlanco(emailEmpresa) && !validarBlanco(telefonoEmpresa)) {
        mensajeEnPantalla("Error", "Debe completar al menos uno de los campos email o teléfono.", "error");
        return valido;
    } else {

        if (validarBlanco(emailEmpresa)) {
            //VALIDACIONES EMAIL EMPRESA
            if (!validarRegExp(emailEmpresa, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailEmpresa.length > 64) {
                mensajeEnPantalla("Error", "Email empresa no puede tener más de 64 caracteres", "error");
                return valido;
            }
        }

        //VALIDACIONES TELEFONO EMPRESA

        if (validarBlanco(telefonoEmpresa)) {
            if (!validarRegExp(telefonoEmpresa, /^\d{7,9}$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contenter solo números", "error");
                return valido;
            }

            if (telefonoEmpresa.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
        }


    }

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
    if (validarBlanco(direccionTrabajador)) {
        if (direccionTrabajador.length > 64) {
            mensajeEnPantalla("Error", "Dirección trabajador no puede tener más de 64 caracteres", "error");
            return valido;
        }

        if (!validarRegExp(direccionTrabajador, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]*$/)) {
            mensajeEnPantalla("Error", "El campo Dirección empresa solo puede contener letras, números y espacios", "error");
            return valido;
        }
    }





    //VALIDAR EMAIL-TELEFONO
    if (!validarBlanco(emailTrabajador) && !validarBlanco(telefonoTrabajador)) {
        mensajeEnPantalla("Error", "Debe completar al menos uno de los campos email o teléfono.", "error");
        return valido;
    } else {

        if (validarBlanco(emailTrabajador)) {
            //VALIDACIONES EMAIL EMPRESA
            if (!validarRegExp(emailTrabajador, /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/)) {
                mensajeEnPantalla("Error", "El campo Correo electrónico debe tener el formato 'correo@correo.cl'", "error");
                return valido;
            }
            if (emailTrabajador.length > 64) {
                mensajeEnPantalla("Error", "Email trabajador no puede tener más de 64 caracteres", "error");
                return valido;
            }
        }

        //VALIDACIONES TELEFONO EMPRESA

        if (validarBlanco(telefonoTrabajador)) {
            if (!validarRegExp(telefonoTrabajador, /^\d*$/)) {
                mensajeEnPantalla("Error", "El campo Teléfono empresa debe contener solo números", "error");
                return valido;
            }

            if (telefonoTrabajador.length != 9) {
                mensajeEnPantalla("Error", "El campo telefono empresa debe tener 9 caracteres", "error");
                return valido;
            }
        }
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
                        window.location.replace("seleccionexamenes.php");
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
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

     if (estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado') {
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



}

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
    var observaciones = document.getElementById('observaciones').value;

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

    

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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


function guardarCreatinina(){
    var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

    if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    }

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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
 
     if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

function guardarAltSgot(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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
    
                var datos = $('#formIngresarAltSgot').serialize();
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
                                document.getElementById("btnGuardarAltSgot").setAttribute("disabled", true);
                                document.getElementById("btnAltSgot").setAttribute("disabled", true); */
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

function guardarAltSgot(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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
    
                var datos = $('#formIngresarAltSgot').serialize();
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
                                document.getElementById("btnGuardarAltSgot").setAttribute("disabled", true);
                                document.getElementById("btnAltSgot").setAttribute("disabled", true); */
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
                                /* //document.getElementById("valor").setAttribute("disabled", true);
                                document.getElementById("estado").setAttribute("disabled", true);
                                document.getElementById("observaciones").setAttribute("disabled", true);
                                //document.getElementById("btnMostrarTestDeRuffier").setAttribute("disabled", true);
                                document.getElementById("btnGuardarAltSgot").setAttribute("disabled", true);
                                document.getElementById("btnAltSgot").setAttribute("disabled", true); */
                            }
                            if (r == 'false') {
                                mensajeEnPantalla("No se han ingresado los datos", "", "error");
                                
                            }
                            
                        alert(r);    
                            
                            
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


    
    

     if(!validarBlanco(VAOD125) || !validarBlanco(VAOD250) || !validarBlanco(VAOD500) || !validarBlanco(VAOD1000) || !validarBlanco(VAOD2000) || !validarBlanco(VAOD3000) || !validarBlanco(VAOD4000) || !validarBlanco(VAOD6000) || !validarBlanco(VAOD8000) || !validarBlanco(VAOI125) || !validarBlanco(VAOI250) || !validarBlanco(VAOI500) || !validarBlanco(VAOI1000) || !validarBlanco(VAOI2000) || !validarBlanco(VAOI3000) || !validarBlanco(VAOI4000) || !validarBlanco(VAOI6000) || !validarBlanco(VAOI8000) || !validarBlanco(VOOD125) || !validarBlanco(VOOD250) || !validarBlanco(VOOD500) || !validarBlanco(VOOD1000) || !validarBlanco(VOOD2000) || !validarBlanco(VOOD3000) || !validarBlanco(VOOD4000) || !validarBlanco(VOOD6000) || !validarBlanco(VOOD8000) || !validarBlanco(VOOI125) || !validarBlanco(VOOI250) || !validarBlanco(VOOI500) || !validarBlanco(VOOI1000) || !validarBlanco(VOOI2000) || !validarBlanco(VOOI3000) || !validarBlanco(VOOI4000) |  !validarBlanco(VOOI6000) || !validarBlanco(VOOI8000)){
        mensajeEnPantalla("Debe llenar todos los campos","","error");
        return false;
    }

    if(!isNumeric(VAOD125) || !isNumeric(VAOD250) || !isNumeric(VAOD500) || !isNumeric(VAOD1000) || !isNumeric(VAOD2000) || !isNumeric(VAOD3000) || !isNumeric(VAOD4000) || !isNumeric(VAOD6000) || !isNumeric(VAOD8000) || !isNumeric(VAOI125) || !isNumeric(VAOI250) || !isNumeric(VAOI500) || !isNumeric(VAOI1000) || !isNumeric(VAOI2000) || !isNumeric(VAOI3000) || !isNumeric(VAOI4000) || !isNumeric(VAOI6000) || !isNumeric(VAOI8000) || !isNumeric(VOOD125) || !isNumeric(VOOD250) || !isNumeric(VOOD500) || !isNumeric(VOOD1000) || !isNumeric(VOOD2000) || !isNumeric(VOOD3000) || !isNumeric(VOOD4000) || !isNumeric(VOOD6000) || !isNumeric(VOOD8000) || !isNumeric(VOOI125) || !isNumeric(VOOI250) || !isNumeric(VOOI500) || !isNumeric(VOOI1000) || !isNumeric(VOOI2000) || !isNumeric(VOOI3000) || !isNumeric(VOOI4000) |  !isNumeric(VOOI6000) || !isNumeric(VOOI8000)){
        mensajeEnPantalla("Campos deben ser numéricos","","error");
        return false;
    }

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

function prueba(){
    

    //window.open('https://google.cl',"Informe","width=500,height=500,scrollbars=NO"); 
      //  return false;
}

function guardarProtrombina(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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

function guardarActividadDeAcetilcolinesterasa(){
    //var valor = document.getElementById('valor').value;
    var estado = document.getElementById('estado').value;
    var observaciones = document.getElementById('observaciones').value;

   /*  if(!isNumeric(valor)){
        mensajeEnPantalla("Valor debe ser numérico","","error");
        return false;
    } */

    if(estado != 'Sin evaluar' && estado != 'Normal' && estado != 'Alterado'){
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



function guardarEspirometriaBasal(){
    var cvflPromedio = document.getElementById('cvflPromedio').value;
    var cvflLimiteInferior = document.getElementById('cvflLimiteInferior').value;
    var vef1lPromedio = document.getElementById('vef1lPromedio').value;
    var vef1lLimiteInferior = document.getElementById('vef1lLimiteInferior').value;
    var fef2575Promedio = document.getElementById('fef2575Promedio').value;
    var fef2575LimiteInferior = document.getElementById('fef2575LimiteInferior').value;
    var vef1cvfPromedio = document.getElementById('vef1cvfPromedio').value;
    var vef1cvfLimiteInferior = document.getElementById('vef1cvfLimiteInferior').value;

    var absoluto1 = document.getElementById('absoluto1').value;
    var teorico1 = document.getElementById('teorico1').value;
    var absoluto2 = document.getElementById('absoluto2').value;
    var teorico2 = document.getElementById('teorico2').value;
    var absoluto3 = document.getElementById('absoluto3').value;
    var teorico3 = document.getElementById('teorico3').value;
    var absoluto4 = document.getElementById('absoluto4').value;

    var observaciones = document.getElementById('observaciones').value;

    if(!validarBlanco(cvflPromedio) || !validarBlanco(cvflLimiteInferior) || !validarBlanco(vef1lPromedio) || !validarBlanco(vef1lLimiteInferior) || !validarBlanco(fef2575Promedio) || !validarBlanco(fef2575LimiteInferior) || !validarBlanco(vef1cvfPromedio) || !validarBlanco(vef1cvfLimiteInferior) || !validarBlanco(absoluto1) || !validarBlanco(absoluto2) || !validarBlanco(absoluto3) || !validarBlanco(absoluto4) || !validarBlanco(teorico1) || !validarBlanco(teorico2) || !validarBlanco(teorico3)){
        mensajeEnPantalla("Debe rellenar los campos","","error");
        return false;
    }

    if(!isNumeric(cvflPromedio) || !isNumeric(cvflLimiteInferior) || !isNumeric(vef1lPromedio) || !isNumeric(vef1lLimiteInferior) || !isNumeric(fef2575Promedio) || !isNumeric(fef2575LimiteInferior) || !isNumeric(vef1cvfPromedio) || !isNumeric(vef1cvfLimiteInferior) || !isNumeric(absoluto1) || !isNumeric(absoluto2) || !isNumeric(absoluto3) || !isNumeric(absoluto4) || !isNumeric(teorico1) || !isNumeric(teorico2) || !isNumeric(teorico3)){
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
                            /* document.getElementById('cvflPromedio').setAttribute("disabled",true);
                            document.getElementById('cvflLimiteInferior').setAttribute("disabled",true);
                            document.getElementById('vef1lPromedio').setAttribute("disabled",true);
                            document.getElementById('vef1lLimiteInferior').setAttribute("disabled",true);
                            document.getElementById('fef2575Promedio').setAttribute("disabled",true);
                            document.getElementById('fef2575LimiteInferior').setAttribute("disabled",true);
                            document.getElementById('vef1cvfPromedio').setAttribute("disabled",true);
                            document.getElementById('vef1cvfLimiteInferior').setAttribute("disabled",true);

                            document.getElementById('absoluto1').setAttribute("disabled",true);
                            document.getElementById('teorico1').setAttribute("disabled",true);
                            document.getElementById('absoluto2').setAttribute("disabled",true);
                            document.getElementById('teorico2').setAttribute("disabled",true);
                            document.getElementById('absoluto3').setAttribute("disabled",true);
                            document.getElementById('teorico3').setAttribute("disabled",true);
                            document.getElementById('absoluto4').setAttribute("disabled",true);

                            document.getElementById('observaciones').setAttribute("disabled",true);

                            document.getElementById('btnGuardarEspirometriaBasal').setAttribute("disabled",true);
                            document.getElementById('btnEspirometriaBasal').setAttribute("disabled",true); */
                        
                    } else if (r == 'false') {
                        mensajeEnPantalla("No se han ingresado los datos", "", "error");
                    }
                    
                }
            });
        } else {
            mensajeEnPantalla("No se han ingresado los datos", "", "error");
        }
    })


    
    
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
}


function mostrarCreatinina() {
    $("#contenidoExamen").load("vistasexamenes/creatinina.php");
}


function mostrarPerfilLipidico() {
    $("#contenidoExamen").load("vistasexamenes/perfilLipidico.php");
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
    $("#contenidoExamen").load("vistasexamenes/cultivoNasal.php");
}


function mostrarCultivoFaringeo() {
    $("#contenidoExamen").load("vistasexamenes/cultivoFaringeo.php");
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
    $("#contenidoExamen").load("vistasexamenes/tiempoDeProtrombina.php");
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




function validarAnamnesis(){

    var anamnesis = document.getElementById('anamnesis').value;
    if(!validarBlanco(anamnesis)){
        mensajeEnPantalla("Para ingresar la anamnesis escriba en el campo de texto y presione guardar","","error");
        return false;
    }
    var datos = $('#formAnamnesis').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
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

    var datos = $('#formExamenFisico').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
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

     var datos = $('#formConclusionMedica').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    }); 


}


function validarInterconsulta() {


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

    if(especialidad == 'MEDICINA GENERAL' ||
        especialidad == 'CARDIOLOGÍA' ||
        especialidad == 'OFTALMOLOGÍA' ||
        especialidad == 'TRAUMATOLOGÍA' ||
        especialidad == 'PSIQUIATRÍA' ||
        especialidad == 'NEUROLOGÍA' ||
        especialidad == 'OTORRINOLARINGOLOGÍA' ||
        especialidad == 'BRONCOPULMONAR' ||
        especialidad == 'GASTROENTEROLOGÍA' ||
        especialidad == 'ENDOCRINOLOGÍA') {
        //window.location.replace("informeinterconsulta.php");
        return true;
    } else {
        mensajeEnPantalla("Error", "Debe elegir una especialidad", "error");
        return false;
    }





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
    
    var recomendaciones = "";

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
     
     document.getElementById("cadenaRecomendaciones").value = recomendaciones;

    



    if(!validarBlanco(cadenaRecomendaciones)){
        mensajeEnPantalla("No hay recomendaciones");
        return false;
    }


    var datos = $('#formRecomendaciones').serialize();
    $.ajax({
        type: "POST",
        url: "../../consultas/insert.php",
        data: datos,
        success: function (r) {
            if (r == 'true') {
                mensajeEnPantalla("Se ingresaron los datos","","success");
            } else if (r == 'false') {
                mensajeEnPantalla("No se han ingresado los datos", "", "error");
            }
        }
    });


}


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