<?php
session_start();
require_once "conexion.php";
$conexion = conexion();

$usu = $_POST['usuario'];
$pass = $_POST['password'];

$q = mysqli_query($conexion," SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass' ");
$qu = mysqli_num_rows($q);

if($qu > 0){
    $a = mysqli_fetch_array($q);
    $_SESSION['active'] = true;
    $_SESSION['id'] = $a['id'];
    echo 1;
    return 1;
}else{
    session_destroy();
    echo 2;
}
?>