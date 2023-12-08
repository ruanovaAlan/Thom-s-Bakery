handleDelete = (id) => {
    let confirmar = confirm("¿Desea eliminar este empleado?")
    if (confirmar){
        $.ajax({
            url : '../../funciones/empleados/eliminar_empleados.php',
            type : 'post',
            dataType: 'text',
            data: {'id': id},
            success: function(res){
                console.log(res);
                $(`#${id}`).hide();
                $('#mensaje').show();
                $('#mensaje').toggleClass('alert-success').html('Empleado eliminado correctamente');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-success');
                });
        
            }, error: function(){
                $('#mensaje').toggleClass('alert-danger').html('Error al eliminar empleado');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-danger');
                });
            }
        });
    }
}