
<?php 

    if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
        $sql = "SELECT * FROM clientes WHERE id = $idUser";
        $res = $con->query($sql);
        $row = $res->fetch_array();
    }else{
        $idUser = 0;
    }

?>

<div class="modal fade" id="contacto" tabindex="-1" aria-labelledby="contact-label" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="contact-label">Contáctanos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="funciones/send_mail.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $idUser == 0 ? "" : $row['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $idUser == 0 ? "" : $row['apellidos'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="col-form-label">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $idUser == 0 ? "" : $row['correo'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="comentarios" class="col-form-label">Comentarios</label>
                <textarea class="form-control" id="comentarios" name="comentarios" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Enviar</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>

<script src="funciones/validarContacto.js"></script>