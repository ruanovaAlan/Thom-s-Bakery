    <?php
        session_start();
        if (isset($_SESSION['idUser'])) {
            header("Location: index.php"); 
            exit(); 
        }
    ?>
    <?php include('partials/head.php'); ?>
    
    <script src="funciones/validar_login.js"></script>
    <title>Login</title>
</head>
<body>
    <h1 class="mt-3">Login</h1>
    <hr class="m-0">
    <div class="alert alert-danger" id="failed-login" role="alert"></div>
    <div class="container login-form mt-5">
        <form name="loginForm">
        <div class="mb-3">
            <label for="correo" class="form-label">Email</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
        </div>
        <button type="submit" class="btn btn-success boton-login" onclick="recibe(); return false;">Login</button>
        <div class="alert alert-danger" id='mensaje'  role="alert"></div>
    </form>
    </div>
</body>
</html>