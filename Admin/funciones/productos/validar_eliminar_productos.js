handleDelete = (id) => {
    let confirmar = confirm("¿Desea eliminar este producto?")
    if (confirmar){
        $.ajax({
            url : '../../funciones/eliminar_productos.php',
            type : 'post',
            dataType: 'text',
            data: {'id': id},
            success: function(){
                $(`#${id}`).hide();
                $('#mensaje').show();
                $('#mensaje').toggleClass('alert-success').html('Producto eliminado correctamente');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-success');
                });
        
            }, error: function(){
                $('#mensaje').toggleClass('alert-danger').html('Error al eliminar producto');
                $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                    $('#mensaje').toggleClass('alert-danger');
                });
            }
        });
    }
}