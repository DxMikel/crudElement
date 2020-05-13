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
        accion: "diClick",
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