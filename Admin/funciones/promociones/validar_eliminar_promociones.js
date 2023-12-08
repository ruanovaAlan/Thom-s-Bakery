handleDelete = (id) => {
    let confirmar = confirm("¿Desea eliminar esta promoción?")
    if (confirmar){
        $.ajax({
            url : '../../funciones/eliminar_promociones.php',
            type : 'post',
            dataType: 'text',
            data: {'id': id},
            success: function(){
                $(`#${id}`).hide();
                $('#mensaje').show();
                $('#mensaje').toggleClass('alert-success').html('Promoción eliminada correctamente');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-success');
                });
        
            }, error: function(){
                $('#mensaje').toggleClass('alert-danger').html('Error al eliminar promoción');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-danger');
                });
            }
        });
    }
}