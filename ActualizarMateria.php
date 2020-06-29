<?php 

    //Recupera parametro enviado
    $Nombre=$_POST['Nombre'];
    $Id=$_POST['Id'];
            
    //Abre coneccion con base de datos
    $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");
    
    //Realiza consula con parametros
    $respuesta= pg_query_params('UPDATE "Mio"."Asignatura" as a SET  "Nombre"= $1 WHERE a.id=$2', Array($Nombre ,$Id));
    
    //Devuelve el numero de filas afectadas
    $datos=pg_affected_rows($respuesta);
    //retonamos Datos
    echo $datos;


?>