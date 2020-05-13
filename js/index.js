$(document).ready(function(){
    $("#prueba").click(function(){
        ejecutarPrueba();
    });
});
function ejecutarPrueba(){
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