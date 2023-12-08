
function recibe() {
    let correo = $('#correo').val();
    let pass = $('#pass').val();
    if (correo === "" || pass === ""){
        $('#mensaje').show();
        $('#mensaje').html('Faltan campos por llenar!');
        $("#mensaje").fadeTo(2000, 500).slideUp(500);

    } else {
        $.ajax({
            url: 'funciones/validar_usuario.php',
            type: 'post',
            dataType: 'text',
            data: {'correo': correo, 'pass': pass},
            success: function(res) {
                if (res == 0) {
                    $('#failed-login').show();
                    $('#failed-login').html('El usuario o la contraseña son incorrectos');
                    $("#failed-login").fadeTo(2000, 500).slideUp(500);
                }
                else if(res == 1){
                    window.location.href = './index.php';
                }
            },
            error: function() {
                console.log("Error en la solicitud AJAX");
            }
        });
    }
}

