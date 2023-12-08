<?php
    require "../conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];
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
            $sql = "SELECT archivo FROM empleados WHERE id = $id";
            $res = $con->query($sql);
            $archivo_a_eliminar = $res->fetch_assoc();
            unlink($dir . $archivo_a_eliminar['archivo']);
        }
    }

// Verificar si se pasa una contraseña nueva o no, si se pasa la constraseña nueva la encriptamos
$passEnc = ($pass !== '') ? md5($pass) : null;

if ($passEnc === null && $archivo_n === '') {
    $sql = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = '$rol' WHERE id = $id";
}
elseif ($passEnc !== null && $archivo_n === ''){
    $sql = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', 
    correo = '$correo', rol = '$rol', pass = '$passEnc' WHERE id = $id";
}
elseif ($passEnc === null && $archivo_n !== ''){
    $sql = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', 
    correo = '$correo', rol = '$rol', archivo_n = '$archivo_n', archivo = '$fileName1' WHERE id = $id";
}
else {
    $sql = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', 
    correo = '$correo', rol = '$rol', pass = '$passEnc', archivo_n = '$archivo_n', archivo = '$fileName1' WHERE id = $id";
}

$res = $con->query($sql);

header("Location: ../../views/empleados/lista_empleados.php");
?>





