<?php
/*
Este archivo posee variables que permiten tomar la fecha y hora actual de la zona horaria de la ciudad de Bogotá, así como posee funciones que permiten detectar qué navegador web y qué sistema operativo está usando alguien en un momento determinado.
*/

    // Se define la zona horaria que tendrán los datos de entrada como la hora o la fecha:
    date_default_timezone_set("America/Bogota");
    // Usando la función 'mktime' se toma la hora actual (H:i:s) y la fecha actual (m-d-Y):
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
    // Se guarda en una variable el formato de la fecha, la cual posee el formato 'mktime' guardado en la variable '$expFormat':
    $expDate = date("Y-m-d", $expFormat);
    // Se guarda en una variable el formato de la hora, la cual posee el formato 'mktime' guardado en la variable '$expFormat':
    $expTime = date("H:i:s", $expFormat);

    /*
     la variable 'user_agent' guarda información acerca del array que permite detectar qué navegador web, y qué sistema operativo, está usando el usuario en el momento:
    */
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    /*
     La función 'getPlatform' es creada para usar el agente de usuario o el 'user agent', esto con el objetivo de que la variable '$user_agent' detecte el sistema operativo del usuario (de acuerdo a las cadenas tipo 'string' que el array requiere para validar y entender un sistema operativo determinado):
    */
    function getPlatform($user_agent) {

       // Se guarda en una variable el array que contendrá el nombre de varios sistemas operativos:
       $plataformas = array(
           /*
            Aquí comienzan a listarse los sistemas operativos que son posibles detectar con la variable '$user_agent'. Al lado izquierdo se ha escrito el nombre del sistema operativo que será mostrado en la pantalla, mientras que al lado derecho se ha escrito el patrón que identifica al sistema operativo y que el array de la variable puede comprender:
           */
          'Windows 10' => 'Windows NT 10.0+',
          'Windows 8.1' => 'Windows NT 6.3+',
          'Windows 8' => 'Windows NT 6.2+',
          'Windows 7' => 'Windows NT 6.1+',
          'Windows Vista' => 'Windows NT 6.0+',
          'Windows XP' => 'Windows NT 5.1+',
          'Windows 2003' => 'Windows NT 5.2+',
          'Windows' => 'Windows otros',
          'iPhone' => 'iPhone',
          'iPad' => 'iPad',
          'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
          'Mac otros' => 'Macintosh',
          'Android' => 'Android',
          'BlackBerry' => 'BlackBerry',
          'Linux' => 'Linux',
       );
       /*
        Se asigna que cada nombre de un sistema operativo esté guardado dentro de la variable '$plataforma', mientras que el patrón de cada uno esté guardado en la variable '$pattern':
       */
       foreach($plataformas as $plataforma=>$pattern){
           /*
            Se realiza un condicional donde se identifica si un patrón dentro de la variable '$pattern' posee relación con la información guardada dentro del array de la variable '$user_agent':
           */
          if (preg_match('/(?i)'.$pattern.'/', $user_agent))
            /*
             Si hay alguna relación entre las dos variables, entonces se devolverá el resultado que posee, dentro de la variable '$plataforma', el nombre del sistema operativo:
            */
             return $plataforma;
       }
       /*
        Si ningún resultado es traido entre las dos variables, entonces se mostrará en la pantalla que el sistema operativo utilizado corresponde a uno no identificado por el array, es decir, uno no añadido en la función 'getPlatform':
       */
       return 'No detectado';

    }

    /*
     La función 'getBrowser' usa el agente de usuario o el 'user agent' para detectar el navegador que está ussando el usuario en el momento.
    */
    function getBrowser($user_agent){

    // La función 'strpos' es usada para buscar una posición en concreto dentro del array de la variable '$user_agent':
    if(strpos($user_agent, 'MSIE') !== FALSE)
        /*/
         Si se encuentra una coincidencia en el array con el nombre dado dentro de la función, entonces se devolverá una cadena string con un valor true, en este caso, el nombre del navegador web sería 'Internet Explorer':
        */
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE)
        // Navegador web devuelto: Microsoft Edge:
        return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE)
        // Navegador web devuelto: Internet Explorer 11:
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
        // Navegador web devuelto: Opera mini:
        return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        // Navegador web devuelto: Opera:
        return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
        // Navegador web devuelto: Mozilla Firefox:
        return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
        // Navegador web devuelto: Google Chrome:
        return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
        // Navegador web devuelto: Safari:
        return "Safari";
    /*
     En caso de no haber coincidencias con ninguno de los condicionales anteriores, la cadena string devuelta mostrará que el navegador web no ha podido ser detectado:
    */
    else
    return 'No detectado';

    }

    // El resultado devuelto por la función 'getBrowser' es guardado dentro de la variable '$navegador':
    $navegador = getBrowser($user_agent); 
    // El resultado devuelto por la función 'getPlatform' es guardado dentro de la variable '$so':  
    $so = getPlatform($user_agent);

?>