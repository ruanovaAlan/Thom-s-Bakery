<?php
    require "../conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $codigo = $_REQUEST['codigo'];
    $descripcion = $_REQUEST['descripcion'];
    $costo = $_REQUEST['costo'];
    $stock = $_REQUEST['stock'];
    $is_file_uploaded = isset($_FILES['archivo']);


    if ($is_file_uploaded){
        $archivo_n = $_FILES['archivo']['name'];
        $archivo = $_FILES['archivo']['tmp_name'];
        $arreglo = explode(".", $archivo_n);
        $len = count($arreglo);
        $pos = $len - 1;
        $ext = $arreglo[$pos];
        $dir = "../../archivos/empleados/"; 

        if($archivo_n != ''){
            $file_enc = md5_file($archivo);
            $fileName1 = "$file_enc.$ext";
            copy($archivo, $dir.$fileName1);
            
            //eliminar la foto anterior si se agrega una nueva
            $sql = "SELECT archivo FROM productos WHERE id = $id";
            $res = $con->query($sql);
            $archivo_a_eliminar = $res->fetch_assoc();
            unlink($dir . $archivo_a_eliminar['archivo']);
        }
    }


if ($archivo_n === '') {
    $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo', stock = '$stock' WHERE id = $id";
}
else {
    $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion',
    costo = '$costo', stock = '$stock', archivo_n = '$archivo_n', archivo = '$fileName1' WHERE id = $id";
}

$res = $con->query($sql);

header("Location: ../../views/empleados/lista_empleados.php");
?>





