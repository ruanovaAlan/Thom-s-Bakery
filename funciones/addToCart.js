
function addToCart(id){
    let id_producto = id;
    let cantidad = $("#cantidad-" + id_producto).val();
    const id_cliente = document.forms["add-to-cart"]["id_cliente"].value

    $.ajax({
        url: "funciones/insertProducto.php",
        method: "POST",
        data: {
            id_producto: id_producto,
            cantidad: cantidad,
            id_cliente: id_cliente
        },
        success: function (data) {
        },
        error: function (error) {
            console.log(error);
        }
    });
    
}



