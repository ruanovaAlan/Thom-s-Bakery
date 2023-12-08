
<?php 
    session_start();
    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }

    include('partials/head.php');
?>

<?php
        require "funciones/conecta.php";
        $con = conecta();
        $sql = "SELECT archivo FROM promociones WHERE  status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 1";
        $res = $con->query($sql);
        $row = $res->fetch_array();

?>

<title>Home</title>
<link rel="stylesheet" href="public/home.css">
<script src="funciones/addToCart.js"></script>

<script>
    let idUser = <?php echo $idUser; ?>;
</script>
<script src="funciones/restringirAcceso.js"></script>

</head>
<body>
    <?php include('partials/navbar.php'); ?>
    
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3" id="promo-banner">
                <img src="Admin/archivos/promociones/<?php echo $row['archivo']; ?>" class="img-fluid" id="banner" alt="Promo Banner">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php include('partials/randomProducts.php'); ?>
            </div>
        </div>
    </div>
    <?php include('contacto.php'); ?>
    <?php include('carrito.php'); ?>
    <?php include('partials/addToCartToast.php'); ?>
    <?php include('partials/confirmacionPedido.php'); ?>
    <?php include('partials/footer.php'); ?>
    <script src="funciones/verDetalles.js"></script>
</body>
</html>