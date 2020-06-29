<?php 
         //Conexion con la base de datos
         $conexion = pg_connect("host=localhost dbname=Colegio user=postgres password=postgres");
         //Envia consulta a la base de datos
         $asignatura = pg_query($conexion, 'SELECT "Id", "Grado" FROM "Mio"."Grado"'); 
         //devuelve una matriz que contiene todas las filas
         $array= pg_fetch_all($asignatura);
         //convertimos el array a json
          $Datos= json_encode($array);
         //retonamos Datos
           echo $Datos;

?>