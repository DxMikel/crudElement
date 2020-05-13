$(document).ready(function(){
    $("#ver").click(function(){
        verEmpleados();
    });
    $("#agregar").click(function(){
        agregarEmpleados();
    });
});
function verEmpleados(){
    var data={
        accion: "ver",
    }
    $.ajax({
        type:"POST",
        dataType:"html",
        url:"listaEmpleados.php",
        data:data,
        success:function(resp){
            $(".display").html(resp);
        }
    });
}
function agregarEmpleados(){
    var data = {
        accion:"formulario",
        submit:"guardar()"
    }
    $.ajax({
        type:"POST",
        dataType:"html",
        url:"listaEmpleados.php",
        data:data,
        success:function(resp){
            $(".display").html(resp);
        }
    });
}

function guardar(){
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    sueldo = document.getElementById("sueldo").value;
    puesto = document.getElementById("puesto").value;
    if(nombre != "" && apellidos != "" && sueldo != "" && puesto != ""){
        var data = {
            accion:"agregar",
            nombre: nombre,
            apellidos: apellidos,
            sueldo: sueldo,
            puesto: puesto
        }
        $.ajax({
            type:"POST",
            dataType:"html",
            url:"listaEmpleados.php",
            data:data,
            success:function(resp){
                $(".display").html(resp);
            }
        });
    }else{
        alert("Uno de los campos esta vacio favor de revisar");
    }
}
function editar(id){
    var data = {
        accion:"formulario",
        submit:"guardarEditar()",
        idEmpleado:id
    }
    $.ajax({
        type:"POST",
        dataType:"html",
        url:"listaEmpleados.php",
        data:data,
        success:function(resp){
            $(".display").html(resp);
        }
    });
}
function guardarEditar(){
    id = document.getElementById("idEmpleado").value;
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    sueldo = document.getElementById("sueldo").value;
    puesto = document.getElementById("puesto").value;
    if(id!="" && nombre != "" && apellidos != "" && sueldo != "" && puesto !=""){
        var data = {
            accion:"guardaEditar",
            id:id,
            nombre:nombre,
            apellidos:apellidos,
            sueldo:sueldo,
            puesto:puesto
        }
        $.ajax({
            type:"POST",
            dataType:"html",
            url:"listaEmpleados.php",
            data:data,
            success:function(resp){
                $(".display").html(resp);
            }
        });
    }else{
        alert("Hay un campo vacio favor de revisar");
    }
}