let countdownNumber = 5;
const countdownElement = document.querySelector('#countdown span');

function cerrarPedido(id_cliente){
    let id = id_cliente;
    $.ajax({
        url: 'funciones/cerrarPedido.php',
        type : 'post',
        dataType: 'text',
        data: {'id': id},
        success: function(data) {
            $('#confirmationModal').modal('show');

            let countdownNumber = 3;
            const countdownElement = document.querySelector('#countdown span');

            const countdownInterval = setInterval(() => {
                countdownNumber--;
                countdownElement.textContent = countdownNumber;

                if (countdownNumber <= 0) {
                    clearInterval(countdownInterval);
                    location.reload();
                }
            }, 1000);
        },
        error: function (error) {
            console.log(error);
        }
    });
}