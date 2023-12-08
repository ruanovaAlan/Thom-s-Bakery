function recibe() {
    const nombre = document.forms["forma02"]["nombre"].value;
    const id = document.forms["forma02"]["id"].value;

    if (nombre === "") 
    {
        $('#mensaje').show();
        $('#mensaje').html('Faltan campos por llenar!');
        $("#mensaje").fadeTo(2000, 500).slideUp(500);

    } else {
        document.forma02.method = "POST";
        document.forma02.action = "../../funciones/actualizar_promociones.php";
        document.forma02.submit();
    }
}




