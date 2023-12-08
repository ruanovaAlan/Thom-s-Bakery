function actualizarSubtotal($producto, cantidad) {
    let precio = parseFloat($producto.find('.costo-unitario').data('precio'));
    cantidad = parseInt(cantidad); 
    let subtotal = precio * cantidad;
    $producto.find('.subtotal').text(subtotal); 
    $producto.find('.subtotal').data('subtotal', subtotal); 
}

function actualizarTotal() {
    let total = 0;
    $('.subtotal').each(function() {
        let subtotal = parseFloat($(this).data('subtotal'));
        if (!isNaN(subtotal)) {
            total += subtotal;
        }
    });
    $('#total').text(total);
}

$(document).ready(function() {
    $('.cantidad-input').on('input', function() {
        let $producto = $(this).closest('.producto');
        let id_producto = $producto.data('id');
        let nueva_cantidad = $(this).val();

        $.ajax({
            url: 'funciones/actualizar_cantidad.php',
            type: 'POST',
            data: {
                id_producto: id_producto,
                cantidad: nueva_cantidad
            },
            success: function(res) {
                actualizarSubtotal($producto, nueva_cantidad);
                actualizarTotal();
            }
        });

    });
});