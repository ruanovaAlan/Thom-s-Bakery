<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: ../../index.php"); 
        exit(); 
    }
    
    include('../../partials/head.php');
?>
    <link rel="stylesheet" href="../../public/alta_productos.css">
    <script src="../../funciones/validar_alta_productos.js"></script>
    <title>Alta de Productos</title>    
</head>
<body>
    <?php include('../navbar.php'); ?>

    <h1 class="mt-3">Alta de Productos</h1>
    <hr>

    <div class='mx-5 mb-2'>
        <a class='btn btn-primary shadow nuevo_producto' href='lista_productos.php'>Regresar al listado</a>
    </div>
    <div class="container alta-form mb-5">


        <form name="forma02" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  name="nombre" class="form-control shadow" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <div class="code-div">
                    <input onblur="verifyCode();"  type="text" name="codigo" class="form-control shadow" id="codigo" required>
                    <div id="code-message" class="alert alert-danger" role="alert"></div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción</label>
                <textarea class="form-control shadow" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="mb-3 costo-stock">
                <div class=" costo">
                    <label for="costo" class="form-label">Costo</label>
                    <input type="text" class="form-control shadow" name="costo" id="costo" required>
                </div>
                <div class="stock">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control shadow" name="stock" id="stock" min="1" required>
                </div> 
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