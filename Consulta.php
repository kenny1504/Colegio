<?php 

    //Recupera parametro enviado
    $Id=$_POST['Id'];
            
    //Abre coneccion con base de datos
    $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");
    
    //Realiza consula con parametros
    $respuesta= pg_query_params('SELECT asi."Nombre" , Gra."Grado" FROM "Mio"."Asignatura" as asi
    INNER JOIN "Mio"."DetallaGradoAsignatura" AS De ON De."IdAsignatura"=asi."id"
    INNER JOIN "Mio"."Grado" AS Gra ON De."IdGrado"=Gra."Id"
    WHERE Gra."Id"=$1
    GROUP BY asi.id, Gra."Grado"', Array($Id));

    
    //Devuelve el numero de filas afectadas
    $array= pg_fetch_all($respuesta);
         //convertimos el array a json
    $Datos= json_encode($array);

    echo $Datos;
?>