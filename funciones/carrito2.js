$(document).ready(function() {
    $('#carrito').click(function(e) {
        e.preventDefault();
        $('#pedido1').load('partials/listaCarrito1.php');
    });
});

//muestra el carrito 2
$(document).ready(function() {
    $('#continue-button').click(function(e) {
        e.preventDefault();

        $('#pedido1').addClass('d-none');
        $('#pedido2').removeClass('d-none');
        $('#pedido2').load('partials/listaCarrito2.php');
    });
});

if(idUser != 0){
    //oculta el carrito 2 y muestra el carrito 1 cuando se sale del offcanvas
    $(document).ready(function() {
        let myOffcanvas = document.getElementById('carrito1')

        myOffcanvas.addEventListener('hidden.bs.offcanvas', function () {
            $('#pedido1').removeClass('d-none');
            $('#pedido2').addClass('d-none');
        });
    });
}

$(document).ready(function() {
    // Verificar si el carrito está vacío
    if ($('.producto').length === 0) {
        // Si el carrito está vacío, mostrar el mensaje de "Carrito vacío"
        $('#mensaje-vacio').removeClass('d-none');
    } else {
        // Si el carrito no está vacío, ocultar el mensaje de "Carrito vacío"
        $('#mensaje-vacio').addClass('d-none');
    }
});





