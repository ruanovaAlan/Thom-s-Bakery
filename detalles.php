
<?php

    session_start();
    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }

    $idProducto = $_GET['id'];

    require "funciones/conecta.php";
    $con = conecta();

    $sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 and id = $idProducto"; 
    $res = $con->query($sql);
    $row = $res->fetch_array();
    $id = $row["id"];
    $nombre = $row["nombre"];
    $codigo = $row["codigo"];
    $costo = $row["costo"];
    $descripcion = $row["descripcion"];
    $archivo = $row["archivo"];

    include('partials/head.php');
?>

<?php

?>

<title>Detalles</title>
<link rel="stylesheet" href="public/detalles.css">
<script>
    let idUser = <?php echo $idUser; ?>;
</script>
<script src="funciones/restringirAcceso.js"></script>
<script src="funciones/addToCart.js"></script>
</head>
<body>
    <?php include('partials/navbar.php'); ?>
    <div class="container">
        <div class='card mt-5 shadow-lg card-random-products' style="width: 20rem;" id="detalles-products">
            <img src='Admin/archivos/productos/<?php echo $row['archivo'] ?>' class='card-img-top img-thumbnail' alt='...'>
            <div class='card-body pt-1 pb-0 d-flex align-items-center justify-content-center' style='height: 4rem;'>
                <h5 class='card-title'><?php echo $row['nombre'] ?></h5>
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item mb-0'><i class='fa-solid fa-barcode'></i> <?php echo $row['codigo'] ?></li>
            </ul>
            <div class='card-body'>
                <p class='card-text'><i class='fa-solid fa-dollar-sign'></i> <?php echo $row['costo'] ?></p>
                <form class='add-btn-num' name='add-to-cart'>
                    <div class='div-btn-cart'  data-bs-placement='top'
                    data-bs-custom-class='custom-tooltip'
                    data-bs-title='Inicia sesión para agregar productos.'>
                        <button class='btn btn-sm btn-secondary shadow add-cart toast-cart restrictCart' onclick='addToCart(<?php echo $idProducto ?>); return false;' id='addCart'>
                        Añadir al carrito
                        </button>
                    </div>
                    <input type='number' class='form-control cantidad' name='cantidad' id='cantidad-<?php echo $idProducto ?>' min='1' value='1'>
                    <input type='hidden' name='id_cliente' value='<?php echo $idUser ?>'>
                </form>
            </div>
        </div>
    </div>
    <?php include('contacto.php'); ?>
    <?php include('carrito.php'); ?>
    <?php include('partials/addToCartToast.php'); ?>
    <?php include('partials/confirmacionPedido.php'); ?>
    <?php include('partials/footer.php'); ?>

</body>
</html>


