function recibe() {
    const nombre = document.forms["forma02"]["nombre"].value;
    const archivo = document.forms["forma02"]["archivo"].value


    if (
        nombre === "" ||
        archivo === ""
    ) {
        $('#mensaje').show();
        $('#mensaje').html('Faltan campos por llenar!');
        $("#mensaje").fadeTo(2000, 500).slideUp(500);

    } else {
        document.forma02.method = "POST";
        document.forma02.action = "../../funciones/salva_promociones.php"; 
        document.forma02.submit();
    }
}



