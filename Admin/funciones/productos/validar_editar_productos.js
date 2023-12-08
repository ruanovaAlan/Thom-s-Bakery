function recibe() {
    const nombre = document.forms["forma02"]["nombre"].value;
    const codigo = document.forms["forma02"]["codigo"].value;
    const descripcion = document.forms["forma02"]["descripcion"].value;
    const costo = document.forms["forma02"]["costo"].value;
    const stock = document.forms["forma02"]["stock"].value;
    const id = document.forms["forma02"]["id"].value;


    if (
        nombre === "" ||
        codigo === "" ||
        descripcion === "" ||
        costo === "" ||
        stock === "" 
        ) 
    {
        $('#mensaje').show();
        $('#mensaje').html('Faltan campos por llenar!');
        $("#mensaje").fadeTo(2000, 500).slideUp(500);

    } else {
        document.forma02.method = "POST";
        document.forma02.action = "../../funciones/actualizar_producto.php";
        document.forma02.submit();
    }
}

function verifyCode() {
    let codigo = $('#codigo').val();
    $.ajax({
        url: '../../funciones/validar_codigo.php', 
        type: 'post',
        dataType: 'text',
        data: { codigo: codigo },
        success: function(res) {
            if (res == 1) {
                $('#code-message').show();
                $('#code-message').html(`El código ${codigo} ya existe`);
                $("#code-message").fadeTo(2000, 500).slideUp(500);
                $("#codigo").val('');
            }
        },
        error: function() {
            console.log("Error en la solicitud AJAX");
        }
    });
}


