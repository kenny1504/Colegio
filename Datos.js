$(document).ready(function () {
    ocultar();
})

function ocultar()
{
    $('#Grados').hide();
    $('#Buscar1').hide();
    $('#M1').hide();
    $('#M2').hide();
}

function Materias()
{ 
    ocultar();
     $('#M1').show();
    $('#Datos').empty();
    $.ajax({
        type: "POST",
        url: 'Datos/Materias.php',
        success: function(data)
        {
            //Convertimos json a array
            var array = JSON.parse(data);

            var head="<thead><tr><th>id</th><th>Nombre Asignatura</th></tr></thead>";
            $('#Datos').append(head);
        array.forEach(element => {
            var Nombre=element.Nombre;
            var datos= "<tr style='font: -webkit-mini-control;'>"+
                        "<th>"+element.id+"</th>"+
                        "<th>"+element.Nombre+"</th><td>"
                        +"<button class='btn btn-primary' data-id="+ element.id +" onclick='AsignarMateria(this)'>Asignar</button>"                   
                        +"<button class='btn btn-success' data-Nombre="+ Nombre+" data-id="+ element.id +" onclick='ActualizarMateria(this)'>Editar</button>"
                        +"<button class='btn btn-info' data-id="+ element.id +" onclick='eliminarMateria(this)'>Eliminar</button>" 
                        "</td></tr>";
            $('#Datos').append(datos);
        });
       
       }
   });
}


function Grados()
{
    ocultar();
     $('#M2').show();
     $('#Datos').empty();

     $.ajax({
        type: "POST",
        url: 'Datos/Grados.php',
        success: function(data)
        {
            //Convertimos json a array
            var array = JSON.parse(data);

            var head="<thead><tr><th>id</th><th>Grado Academico</th></tr></thead>";
            $('#Datos').append(head);
        array.forEach(element => {
            var datos= "<tr style='font: -webkit-mini-control;'>"+
                        "<th>"+element.Id+"</th>"+
                        "<th>"+element.Grado+"</th><td>"                
                        +"<button class='btn btn-success' data-id="+ element.Id +" onclick=''>Editar</button>"
                        +"<button class='btn btn-info' data-id="+ element.Id +" onclick=''>Eliminar</button>" 
                        "</td></tr>";
            $('#Datos').append(datos);
        });
       
       }
   });
    
}

function Consulta()
{
    ocultar();
    $('#Grados').show();
    $('#Buscar1').show();
    $('#Datos').empty();
    $('#Grados').empty();

    $.ajax({
        type: "POST",
        url: 'Datos/Grados.php',
        success: function(data)
        {
            //Convertimos json a array
            var array = JSON.parse(data);
        array.forEach(element => {
            datos='<option  value="'+element.Id+'">'+element.Grado+'</option>';      
            $('#Grados').append(datos);
        });
       
       }
   });
}

function Buscar()
{
    $('#Datos').empty();
    var Dato={
                "Id":$('#Grados').val()
            };

    $.ajax({
        type: "POST",
        url: 'Datos/Consulta.php',
        data:Dato,
        success: function(data)
        {
           //Convertimos json a array
            var array = JSON.parse(data);

            var head="<thead><tr><th>Nombre Asignatura</th><th>Grado</th></tr></thead>";
            $('#Datos').append(head);
        array.forEach(element => {
            var datos= "<tr style='font: -webkit-mini-control;'>"+
                        "<th>"+element.Nombre+"</th>"+
                        "<th>"+element.Grado+"</th><td>" 
                        "</td></tr>";
            $('#Datos').append(datos);
        });

       }
   });
}

function ingresarMateria (){

    var Materia=$('#Materia-Nueva').val();

    if (Materia!="")
    {
        var Dato={
               "Nombre": Materia
        };

        $.ajax({
            type: "POST",
            url: 'Datos/GuardarMateria.php',
            data:Dato,
            success: function(data)
            {
             if(data==1)
             {
                $("#CrearMateria").modal("hide");
                $('#Materia-Nueva').val("");
                Materias();
             }
             else
             {
                alert("Error al agregar Materia");
             }
            }
        });

    }
}

var ide;
var Nombre;
function ActualizarMateria(button)
{
    ide=$(button).attr("data-id");
    Nombre=$(button).attr("data-Nombre");
    $("#ActualizarMateria").modal("show");
    $('#Materia-Actualizar').val(Nombre);

}

function UpdateMateria()
{
     Nombre=$('#Materia-Actualizar').val();

    if (Nombre!="")
    {
        var Dato={
               "Nombre": Nombre,
                "Id":ide
        };

        $.ajax({
            type: "POST",
            url: 'Datos/ActualizarMateria.php',
            data:Dato,
            success: function(data)
            {
             if(data==1)
             {
                $("#ActualizarMateria").modal("hide");
                $('#Materia-Actualizar').val("");
                Materias();
             }
             else
             {
                alert("Error al actualizar Materia");
             }
            }
        });

    }
}
var idMateria;
function eliminarMateria(button)
{
    idMateria=$(button).attr("data-id");
    $("#EliminarMateria").modal("show");
}

function ConfirmarMateria()
{ 
    var Dato={
        "Id":idMateria
      };

    $.ajax({
        type: "POST",
        url: 'Datos/EliminarMaterias.php',
        data:Dato,
        success: function(data)
        {
         if(data==1)
         {
            $("#EliminarMateria").modal("hide");
            Materias();
         }
         else
         {
            alert("Error al Eliminar Materia");
         }
        }
    });
}

function AsignarMateria(button)
{
    idMateria=$(button).attr("data-id");
    $("#AsignarMateria").modal("show");
    $('#Grados2').empty();

    $.ajax({
        type: "POST",
        url: 'Datos/Grados.php',
        success: function(data)
        {
            //Convertimos json a array
            var array = JSON.parse(data);
        array.forEach(element => {
            datos='<option  value="'+element.Id+'">'+element.Grado+'</option>';      
            $('#Grados2').append(datos);
        });
       
       }
   });
}

function ConfirmarAsignar()
{
    var Dato={
        "IdAsignatura":idMateria,
        "IdGrado":$('#Grados2').val()
      };

    $.ajax({
        type: "POST",
        url: 'Datos/AsignarMateria.php',
        data:Dato,
        success: function(data)
        {
         if(data==1)
         {
            $("#AsignarMateria").modal("hide");
            alert("Asignada con exito");
         }
         else
         {
            alert("Error al Asignar Materia");
         }
        }
    });


}