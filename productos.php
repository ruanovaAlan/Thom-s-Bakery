<?php
    session_start();
    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }
    
    include('partials/head.php');
?> 

<title>Productos</title>
<link rel="stylesheet" href="public/products.css">
<script src="funciones/addToCart.js"></script>
<script>
    let idUser = <?php echo $idUser; ?>;
</script>
<script src="funciones/restringirAcceso.js"></script>
</head>
<body>
    <?php include('partials/navbar.php'); ?>
    <div class="container col-12">
        <div id="random-products" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 mt-3">
            <?php 
                require "funciones/conecta.php";
                $con = conecta();
                $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0;"; 
                $res = $con->query($sql);

                while($row = $res->fetch_array()){
                    $id = $row["id"];
                    $nombre = $row["nombre"];
                    $codigo = $row["codigo"];
                    $costo = $row["costo"];
                    $descripcion = $row["descripcion"];
                    $archivo = $row["archivo"];
                    
                    echo "
                        <div class='col'>
                            <div class='card mx-2 shadow-lg card-random-products'>
                                <img src='Admin/archivos/productos/$archivo' class='card-img-top img-thumbnail random-img' random-img' data-id='$id' data-idUser='$idUser'>
                                <div class='card-body pt-1 pb-0 d-flex align-items-center justify-content-center' style='height: 4rem;'>
                                    <h5 class='card-title'>$nombre</h5>
                                </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item mb-0'><i class='fa-solid fa-barcode'></i> $codigo</li>
                                </ul>
                                <div class='card-body'>
                                    <p class='card-text'><i class='fa-solid fa-dollar-sign'></i> $costo</p>
                                <form class='add-btn-num' name='add-to-cart'>
                                    <div class='div-btn-cart'  data-bs-placement='top'
                                    data-bs-custom-class='custom-tooltip'
                                    data-bs-title='Inicia sesión para agregar productos.'>
                                        <button class='btn btn-sm btn-secondary shadow add-cart restrictCart toast-cart' onclick='addToCart($id); return false;' id='addCart'>
                                        Añadir al carrito
                                        </button>
                                    </div>
                                    <input type='number' class='form-control cantidad' name='cantidad' id='cantidad-$id' min='1' value='1'>
                                    <input type='hidden' name='id_cliente' value='$idUser'>
                                </form>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
    <?php include('carrito.php'); ?>
    <?php include('contacto.php'); ?>
    <?php include('partials/addToCartToast.php'); ?>
    <?php include('partials/confirmacionPedido.php'); ?>
    <?php include('partials/footer.php'); ?>

    <script src="funciones/verDetalles.js"></script>
</body>

