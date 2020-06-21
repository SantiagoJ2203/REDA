// La función 'SoloNumeros' es creada para verificar que los datos ingresados en un campo correspondan a solo números:
function SoloNumeros(param3){
    // Se usa una expresión regular para que solo haya existencia desde el número 0 hasta el 9 en la función, comparando el parámetro 'param3' para verificar si es diferente o si es correcto con lo que se ha ingresado en el campo correspondiente: 
    if(!/^([0-9])*$/.test(param3)){
        return false;
    }else{
        return true;
    }
}

// 1) LAS ALERTAS BOOTSTRAP SON LLAMADAS HACIENDO PRIMERAMENTE REFERENCIA AL DOCUMENTO O ARCHIVO EN CUESTIÓN, LUEGO OBTENIENDO EL ID DE UN ELEMENTO UBICADO EN LOS ARCHIVOS 'system_admin.php' Y/O 'system.php' Y SEGUIDAMENTE SE HACE USO DEL innerHTML PARA INCLUIR CÓDIGO HTML Y PODER AÑADIR LA ALERTA CON SU RESPECTIVA INFORMACIÓN. EN CASO DE NO INCLUIR CÓDIGO HTML, NINGUNA ALERTA APARECERÁ.

// 2) TANTO LAS FUNCIONES DE 'validar_ficha' Y LA DE 'enviado' DEBEN DEVOLDER VALORES TRUE PARA QUE EL FORMULARIO DE BUSCAR UNA FICHA SEA ENVIADO SIN PROBLEMA ALGUNO. LO ANTERIOR TAMBIÉN ACONTECE CON EL FORMULARIO DE BUSCAR A UN APRENDIZ Y SUS RESPECTIVAS FUNCIONES ('validar_aprendiz' y 'enviado_aprendiz'):

/* La función 'validar_ficha' permite validar los campos del formulario de buscar una ficha. Esto es mostrado al usuario por medio de alertas Bootstrap, las cuales indican que inconsistencias posee cada campo del formulario en caso de escribir datos no válidos dentro de ellos. Dichas alertas son mostradas al instante gracias al evento 'oninput' de JavaScript: */
function validar_ficha(){

    // La variable 'correcto_ficha' es creada para determinar si el envío del formulario es posible o, por el contrario, si no es posible en caso de haber inconsistencias en los campos:
    var correcto_ficha = true;
    // La variable 'formulario_ficha' es creada para contener el llamado que se le hace al formulario en cuestión, para de esta forma utilizarlo más directamente con los condicionales 'if':
    var formulario_ficha = document.buscar_ficha;

    // El siguiente condicional evalúa si en el campo del formulario se escriben caracteres diferentes a números. En caso de ser cierto lo anterior, una alerta aparecerá indicando está inconsistencia al usuario:
    if(SoloNumeros(formulario_ficha.fichanombre.value) == false){
        document.getElementById("alerta_ficha").innerHTML = '<div class="alert alert-danger alert-dismissible fade show text-center alerta_ficha" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Por favor ingrese solo números en el campo.</div>'
        /* Se indica que la variable 'correcto_ficha' ha de devolver un valor false, debido a la alerta activada: */
        correcto_ficha = false;
    }else{
        /* Por otro lado, si solo hay números en el campo, la alerta procederá automaticamente a desaparecer en caso de haber sido activada con anterioridad: */
        document.getElementById("alerta_ficha").innerHTML = "";
    }
    /* Se regresa la variable 'correcto_ficha'. Si alguno de los condicionales evaluados posee un valor false, el formulario no podrá ser enviado y las alertas se seguirán mostrándose hasta que se devuelva un valor true: */
    return correcto_ficha;

}

/* La función 'enviado_ficha' valida los campos del formulario de buscar una ficha, una vez se trata de enviar el formulario. Esto es posible gracias al evento 'onsubmit' de JavaScript', el cual evalúa los valores de los condicionales 'if' una vez es enviado el formulario: */
function enviado_ficha(){

    // Se crea la variable 'enviado_ficha' para determinar si el envío del formulario sí es posible o, por el contrario, si no es posible debido a inconsistencias en los campos del formulario:
    var enviado_ficha = true;
    // Se crea la variable 'form_ficha_enviado' para llamar al formulario en cuestión por su nombre, y así poder usar los condicionales 'if' de manera más directa con el mismo por medio de una variable que lo contiene:
    var form_ficha_enviado = document.buscar_ficha;

    // El siguiente condicional evalúa si el campo del formulario se encuentra vacío. En caso de ser así, se le indicará al usuario, por medio de una alerta Bootstrap, que debe ingresar un dato antes de realizar su búsqueda:
    if(form_ficha_enviado.fichanombre.value == ""){
        document.getElementById("alerta_ficha").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show text-center alerta_ficha" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Por favor digite el número de una ficha.</div>'
        // La variable 'enviado_ficha' obtiene un valor false al verificar que el campo posee una inconsistencia:
        enviado_ficha = false;
    }else{
        // En caso de no encontrarse vacío el campo, la alerta procederá, de manera automática, a desaparecer de la pantalla del usuario:
        document.getElementById("alerta_ficha").innerHTML = "";
    }
    // Se regresa la variable 'enviado_ficha'. Si esta posee un valor false, la alerta seguirá estando presente en la pantalla del usuario; caso contrario, está desaparecerá y la función devolverá un valor true.
    return enviado_ficha;

}

// La función 'validar_aprendiz' permite la aparición de alertas de Bootstrap en el formulario de buscar un aprendiz. Esto es posible gracias al evento 'oninput' de JavaScript:
function validar_aprendiz(){

    // Se crea la variable 'correcto_aprendiz' para determinar si el formulario puede ser enviado con éxito o si, por el contrario, no puede ser enviado debido a inconsistencias en el mismo:
    var correcto_aprendiz = true;
    // Se crea la variable 'formulario_aprendiz' para llamar al formulario en cuestión, esto con el propósito de usar, de manera más directa, los condicionales 'if' con el formulario:
    var formulario_aprendiz = document.form_aprendiz;
    /* Este último condicional, evalúa si el campo de número de documento contiene caracteres diferentes a números. En caso de ser cierto lo anterior, aparecerá una alerta Bootstrap para indicar al usuario de que solo debe ingresar números en el campo: */
    if(SoloNumeros(formulario_aprendiz.ap_documento.value) == false){
        document.getElementById("alerta_ap_documento").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show text-center alerta_aprendiz" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese solo números para el campo de número de documento.</div>';
        /* La variable 'correcto_aprendiz' devuelve un valor false al haber inconsistencias en el formulario: */
        correcto_aprendiz = false;
    }else if(SoloNumeros(formulario_aprendiz.ap_documento.value) == true){
        /* En caso de haber solo números dentro del campo, la alerta Bootstrap desaparecerá automaticamente de la pantalla del usuario: */
        document.getElementById("alerta_ap_documento").innerHTML = "";
    }
    /* Se regresa la variable 'correcto_aprendiz' con un valor true o false, esto último dependiendo de si existe algún incoveniente dentro del formulario o, por si el contrario, no existe ninguno: */
    return correcto_aprendiz;
}

// La función 'enviado_aprendiz', permite que una alerta Bootstrap aparezca en el formulario de buscar a un aprendiz al tratar de enviarse el formulario con inconsistencias en el mismo:
function enviado_aprendiz(){

    // Se crea la variable 'enviado_aprendiz' para determinar si el formulario puede enviarse con éxito o si, por el contrario, existen inconsistencias en el mismo y no puede ser enviado hasta que sean resueltas dichas inconsistencias:
    var enviado_aprendiz = true;
    // Se crea la variable 'form_enviado_aprendiz' para acceder de una manera más directa al formulario en cuestión y, por lo tanto, para hacer uso de el condicional 'if':
    var form_enviado_aprendiz = document.form_aprendiz;

    // El siguiente condicional evalúa si el campo del formulario se halla vacío. En caso de ser así, se le notificará al usuario, con una alerta Bootstrap, de que ingrese un dato en el campo:
    if(form_enviado_aprendiz.ap_documento.value == ""){
        document.getElementById("alerta_aprendiz").innerHTML = '<div class= "alert alert-danger alert-dismissible fade show text-center alerta_ap_final" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Ingrese un dato en el campo de número de documento.</div>';
        /* Se regresa la variable con un valor false al haber una inconsistencia dentro del formulario: */
        enviado_aprendiz = false;
    }else{
        // En caso de haber resuelto la inconsistencia, el usuario verá como la alerta Bootstrap desaparece de la pantalla automaticamente.
        document.getElementById("alerta_aprendiz").innerHTML = "";
    }
    /* La variable 'enviado_aprendiz' es regresada con un valor true o false, esto último dependiendo de si existe una inconsistencia en el formulario o si, por el contrario, no la hay: */
    return enviado_aprendiz;
}