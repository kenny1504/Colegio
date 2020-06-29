<?php 

        //Recupera parametro enviado
        $dato=$_POST['Nombre'];
        
        //Abre coneccion con base de datos
        $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");

        //Realiza consula con parametros
        $respuesta= pg_query_params('INSERT INTO "Mio"."Asignatura" ("Nombre") VALUES ($1)', Array($dato));
        
        //Devuelve el numero de filas afectadas
        $datos=pg_affected_rows($respuesta);
        //retonamos Datos
        echo $datos;
    
?>