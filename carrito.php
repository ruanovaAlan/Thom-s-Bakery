
<link rel="stylesheet" href="public/offcanvas.css">
<script src="funciones/eliminar_de_carrito.js"></script>
<script src="funciones/carrito2.js"></script>
<script src="funciones/cerrarPedido.js"></script>


<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="carrito1" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="offcanvas"><i class="fa-solid fa-cart-shopping position-relative"></i> Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="m-0">
    <div class="alert" id='mensaje' role="alert"></div>
    <div class="offcanvas-body" id="pedido1">
        <?php include('partials/listaCarrito1.php'); ?>
    </div>
    <div class="offcanvas-body d-none" id="pedido2">
        <?php include('partials/listaCarrito2.php'); ?>
    </div>
    <div class="offcanvas-body d-none mt-3" id="no-login">
        <h2>Inicia sesión para agregar al carrito</h2>
        <a href="login.php" class="btn btn-success mt-2" id="login-cart">Login</a>
    </div>
    <div id="mensaje-vacio" class="d-none"><h2>Carrito vacío</h2></div>

</div>

