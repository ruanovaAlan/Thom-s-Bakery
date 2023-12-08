<?php
    require "../conecta.php";
    $con = conecta();

    //Recibe variables
    $nombre = $_REQUEST['nombre'];


    $archivo = $_FILES['archivo']['tmp_name'];
    $archivo_n = $_FILES['archivo']['name'];
    $arreglo = explode(".", $archivo_n);
    $len = count($arreglo);
    $pos = $len - 1;
    $ext = $arreglo[$pos];
    $dir = "../../archivos/promociones/";
    $file_enc = md5_file($archivo);
    $fileName1 = "";
    if($archivo != ''){
        $fileName1 = "$file_enc.$ext";
        copy($archivo, $dir.$fileName1);
    }
    

    $sql = "INSERT INTO promociones(
            nombre, archivo) 
            VALUES ('$nombre', '$fileName1')";
    $res = $con->query($sql);

    header("Location: ../../views/promociones/lista_promociones.php");

?>