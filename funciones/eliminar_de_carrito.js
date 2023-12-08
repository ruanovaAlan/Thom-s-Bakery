
function eliminarProducto(id, subtotal) {
    let id_producto = id;
    const id_cliente = document.forms["add-to-cart"]["id_cliente"].value

    let total = $('#total').text();
    total -= subtotal;
    $('#total').text(total);

    $.ajax({
        url: "funciones/eliminar_de_carrito.php",
        method: "POST",
        data: {
            id_producto: id_producto,
            id_cliente: id_cliente
        },
        success: function (data) {
            $(`#${id}`).hide();
            $('#mensaje').show();
            $('#mensaje').toggleClass('alert-success').html('Producto eliminado del carrito');
            $("#mensaje").fadeTo(2000, 500).slideUp(500, function(){
                $('#mensaje').toggleClass('alert-success');
            });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

}