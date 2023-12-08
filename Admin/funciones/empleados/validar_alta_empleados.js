function recibe() {
    const nombre = document.forms["forma01"]["nombre"].value;
    const apellidos = document.forms["forma01"]["apellidos"].value;
    const correo = document.forms["forma01"]["correo"].value;
    const pass = document.forms["forma01"]["pass"].value;
    const rol = document.forms["forma01"]["rol"].value;
    const archivo = document.forms["forma01"]["archivo"].value


    if (
        nombre === "" ||
        apellidos === "" ||
        correo === "" ||
        pass === "" ||
        rol === "" ||
        archivo === ""
    ) {
        $('#mensaje').show();
        $('#mensaje').html('Faltan campos por llenar!');
        $("#mensaje").fadeTo(2000, 500).slideUp(500);

    } else {
        document.forma01.method = "POST";
        document.forma01.action = "../../funciones/empleados/salva_empleados.php";
        document.forma01.submit();
    }
}

function verifyEmail() {
    let correo = $('#correo').val();
    $.ajax({
        url: '../../funciones/empleados/validar_email.php',
        type: 'post',
        dataType: 'json',
        data: { correo: correo },
        success: function(data) {
            if (data.num == 1) {
                $('#email-message').show();
                $('#email-message').html(`El correo ${correo} ya existe`);
                $("#email-message").fadeTo(2000, 500).slideUp(500);
                $("#correo").val('');
            }
        },
        error: function() {
            console.log("Error en la solicitud AJAX");
        }
    });
}


