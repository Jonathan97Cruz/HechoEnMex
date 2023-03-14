<?php

require_once "../../conexion/conexion.php";
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header("location:../../index.php");
}
$conexion = conexion();

$empresa = $_POST['empresa'];
$razon = $_POST['razon'];
$contacto = $_POST['contacto'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$origen = $_POST['origen'];
$direccion = $_POST['direccion'];
$tr1 = $_POST['tr1'];
$pu1 = $_POST['pu1'];
$te1 = $_POST['te1'];
$co1 = $_POST['co1'];
$tr2 = $_POST['tr2'];
$pu2 = $_POST['pu2'];
$te2 = $_POST['te2'];
$co2 = $_POST['co2'];
$tr3 = $_POST['tr3'];
$pu3 = $_POST['pu3'];
$te3 = $_POST['te3'];
$co3 = $_POST['co3'];
$direP = $_POST['direP'];
$fami = $_POST['fami'];
$pueF = $_POST['pueF'];
$modelo = $_POST['modelo'];
$fecha = $_POST['fecha'];
$solici = $_POST['solici'];
$revi = $_POST['revi'];
$visi = $_POST['visi'];

$query = mysqli_query($conexion,"INSERT INTO `registro`(`nomEmp`, `razonSocial`, `contacto`, `correo`, `telefono`, `origen`, `direccion`, `tramitadorU`,`puestoU`,
                                                        `telefoU`, `correoU`, `tramitadorD`, `puestoD`, `telefoD`, `correoD`, `tramitadorT`, `puestoT`, `telefoT`,
                                                        `correoT`, `direcProd`, `familiaPC`, `puestoPC`, `modelosPC`, `fecContrato`, `fecSolicitud`, `fecRevision`, `fecVisita`)
                                VALUES ('$empresa','$razon','$contacto','$correo','$telefono','$origen','$direccion','$tr1','$pu1',
                                        '$te1','$co1','$tr2','$pu2','$te2','$co2','$tr3','$pu3','$te3',
                                        '$co3','$direP','$fami','$pueF','$modelo','$fecha','$solici','$revi','$visi')");
if($query == true){
    $_SESSION['msj'] = "Empresa agregada con exito";
    header("location:../index.php");
}else{
    $_SESSION['msj'] = "Error al agregar" ;
}     

?>