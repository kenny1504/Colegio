<?php 
    require_once("Persona.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Resource/CSS/index.css">

</head>
<body>
<div id="London" class="tabcontent">
  <h1>SISTEMA DE REGISTRO</h1>
</div>

<button class="tablink" onclick="openCity('London', this, 'red')" id="defaultOpen"></button>
<button class="tablink" onclick="openCity('Paris', this, 'green')">Asignaturas</button>
<button class="tablink" onclick="openCity('Tokyo', this, 'blue')">Tokyo</button>
<button class="tablink" onclick="openCity('Oslo', this, 'orange')"></button>
<table>
    <thead>
    <tr>
        <th>Nombre Asignatura</th>
    </tr>
    </thead>
<tbody>   
<?php    
    $asignaturas = new persona();
    $datos=$asignaturas->Get_asignaturas();
     foreach($datos as $dato)
    {
?>
    <tr>
        <th style=""><?php echo $dato["Nombre"]; ?> </th>
    </tr>
<?php
    }
?>
</tbody>
</table> 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="Datos.js"></script>
</html> 