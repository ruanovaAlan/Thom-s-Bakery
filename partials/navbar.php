    
    

    <link rel="stylesheet" href="public/navbar-footer.css">
    
    <nav class="navbar navbar-expand-lg  navbar-dark d-flex justify-content-center p-0" id="menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="images/logo1.png" class="logo" alt="Thom's Bakery Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#links" aria-controls="links" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="productos.php"><i class="fa-solid fa-cookie"></i> Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contacto"><i class="fa-solid fa-envelope"></i> Contacto</a>
                </li>

            </ul>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#carrito1" aria-controls="offcanvas" id="carrito"><i class="fa-solid fa-cart-shopping position-relative"></i> Carrito</a>
            </div>
            <?php

                if (isset($_SESSION['idUser'])) {
                    echo '
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="funciones/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="login.php"><i class="fa-solid fa-sign-in"></i> Login</a>
                    </div>
                    ';
                }
            ?>
        </div>
    </div>
    </nav>

