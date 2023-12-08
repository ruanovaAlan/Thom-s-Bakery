let correo = $('#correo').val();
let nombre = $('#nombre').val();
let apellidos = $('#apellidos').val();
let comentarios = $('#comentarios').val();
$.ajax({
    url: 'send_mail.php',
    type: 'POST',
    data: { correo: correo, nombre: nombre, apellidos: apellidos, comentarios: comentarios },
    success: function(data) {
        console.log("Se logro");
    }
});