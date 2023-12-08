<?php
    require "../conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $is_file_uploaded = isset($_FILES['archivo']);


    if ($is_file_uploaded){
        $archivo_n = $_FILES['archivo']['name'];
        $archivo = $_FILES['archivo']['tmp_name'];
        $arreglo = explode(".", $archivo_n);
        $len = count($arreglo);
        $pos = $len - 1;
        $ext = $arreglo[$pos];
        $dir = "../../archivos/promociones/"; 

        if($archivo_n != ''){
            $file_enc = md5_file($archivo);
            $fileName1 = "$file_enc.$ext";
            copy($archivo, $dir.$fileName1);
            
            $sql = "SELECT archivo FROM promociones WHERE id = $id";
            $res = $con->query($sql);
            $archivo_a_eliminar = $res->fetch_assoc();
            unlink($dir . $archivo_a_eliminar['archivo']);
        }
    }


if ($archivo_n === '') {
    $sql = "UPDATE promociones SET nombre = '$nombre' WHERE id = $id";
}
else {
    $sql = "UPDATE promociones SET nombre = '$nombre', archivo = '$fileName1' WHERE id = $id";
}

$res = $con->query($sql);

header("Location: ../../views/promociones/lista_promociones.php");
?>





