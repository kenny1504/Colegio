<?php 

    //Recupera parametro enviado
    $Id=$_POST['Id'];
            
    //Abre coneccion con base de datos
    $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");
    
    //Realiza consula con parametros
    $respuesta= pg_query_params('DELETE FROM "Mio"."Asignatura" as a WHERE a.id=$1', Array($Id));
    
    //Devuelve el numero de filas afectadas
    $datos=pg_affected_rows($respuesta);
    //retonamos Datos
    echo $datos;


?>