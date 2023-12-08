<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }
    
    include('../../partials/head.php');
?>
    <link rel="stylesheet" href="../../public/alta_promociones.css">
    <script src="../../funciones/validar_alta_promociones.js"></script>
    <title>Alta de Promociones</title>    
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Alta de Promociones</h1>
    <hr>

    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_promocion' href='lista_promociones.php'>Regresar al listado</a>
    </div>
    <div class="container alta-form mb-5">


        <form name="forma02" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Foto</label>
                <input type="file" class="form-control shadow" id="archivo" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-success mb-2 shadow alta-btn" onclick="recibe(); return false;">Guardar</button>
            <div class="alert alert-danger" id='mensaje'  role="alert"></div>
        </form>
        
    </div>
</body>
</html>