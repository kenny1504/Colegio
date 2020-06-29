<?php
    //Recupera parametro enviado
    $idAsignatura=$_POST['IdAsignatura'];
    $idGrado=$_POST['IdGrado'];
            
    //Abre coneccion con base de datos
    $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");
    
    //Realiza consula con parametros
    $respuesta= pg_query_params('INSERT INTO "Mio"."DetallaGradoAsignatura"("IdAsignatura", "IdGrado")VALUES ($1,$2);', Array($idAsignatura ,$idGrado));
    
    //Devuelve el numero de filas afectadas
    $datos=pg_affected_rows($respuesta);
    //retonamos Datos
    echo $datos;
?>