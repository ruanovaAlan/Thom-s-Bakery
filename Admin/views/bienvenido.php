<?php
    session_start();
    if (!isset($_SESSION['idUser'])) {
        header("Location: index.php"); 
        exit(); 
    }

    $nombre = $_SESSION['nombreUser'];
    
    
    include('../partials/head.php');
?>

<title>Bienvenido</title>
</head>
<body>
    <?php include('../partials/navbar.php'); ?>
    <?php include('../partials/login_alert.php'); ?>
<div class="mt-5">
    <h1>Sistema de Administración</h1>
</div>

</body>
</html>