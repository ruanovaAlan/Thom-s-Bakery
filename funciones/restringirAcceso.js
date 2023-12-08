
$(document).ready(function() {
    if(idUser == 0){
        $('#pedido1').addClass('d-none');
        $('#no-login').removeClass('d-none');
        $('.restrictCart ').addClass('disabled');
        $('.div-btn-cart').addClass('tooltip-trigger');
        $('div.offcanvas').addClass('not-logged-in');

        const divBtnCarts = document.querySelectorAll('.div-btn-cart');
        divBtnCarts.forEach(divBtnCart => {
            divBtnCart.classList.add('tooltip-trigger');
            new bootstrap.Tooltip(divBtnCart);
        });
    }
});