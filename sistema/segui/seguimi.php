<?php
require_once "../../conexion/conexion.php";
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header("location:../../index.php");
}
$conexion = conexion();
$idS = $_POST['idSe'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../img/logo1.png" rel="shortcut icon" type="image/png">
        <title>HM</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/5d3f0049df.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../../img/logo2.bmp" alt="" style="width:80px; height: 50px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php"> <i class="fas fa-home"></i> Inicio <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../regEmp.php"> <i class="fas fa-user-edit"></i> Registrar empresa</a>
                        </li>
                        <li class="nav-item">
                            <a href="../../conexion/salir.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!--<form class="form-inline my-2 my-lg-0" method="POST" action="buscar.php">
                    <input  class="mr-sm-2" type="search" placeholder="BUSCAR" aria-label="Search" name="nombre">
                    <button class="btn btn-outline-success my-sm-1 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>-->
                </div>
            </div>            
        </nav>
        <div class="container-fluid">
            <form action="editar/ediEm.php" method="POST">
                <div class="row">
                    <h2 class="fw-bold">Datos de la empresa</h2>
                    <h4 style="text-align: center; color:white" class="bg-dark"><i class="fa-sharp fa-solid fa-hotel"></i> Información de la empresa</h4>
                    <?php
                        $query = mysqli_query($conexion,"SELECT * FROM registro WHERE idR = '$idS' ");
                        $quer = mysqli_num_rows($query);
                        if($quer > 0){
                            while($a = mysqli_fetch_array($query)){
                                $empresa = $a['nomEmp'];
                                $razon = $a['razonSocial'];
                                $contacto = $a['contacto'];
                                $correo = $a['correo'];
                                $telefono = $a['telefono'];
                                $origen = $a['origen'];
                                $direccion = $a['direccion'];
                                $tr1 = $a['tramitadorU'];
                                $pu1 = $a['puestoU'];
                                $te1 = $a['telefoU'];
                                $co1 = $a['correoU'];
                                $tr2 = $a['tramitadorD'];
                                $pu2 = $a['puestoD'];
                                $te2 = $a['telefoD'];
                                $co2 = $a['correoD'];
                                $tr3 = $a['tramitadorT'];
                                $pu3 = $a['puestoT'];
                                $te3 = $a['telefoT'];
                                $co3 = $a['correoT'];
                                $direP = $a['direcProd'];
                                $fami = $a['familiaPC'];
                                $pueF = $a['puestoPC'];
                                $modelo = $a['modelosPC'];
                                $fecha = $a['fecContrato'];
                                $solici = $a['fecSolicitud'];
                                $revi = $a['fecRevision'];
                                $visi = $a['fecVisita'];
                            }
                        }
                    ?>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fa-sharp fa-solid fa-dice-d20"></i> Nombre de la empresa*</label></strong>
                            <div class="col-sm-12">
                                <input disabled id="empresa" name="empresa" type="text" class="form-control" placeholder="Nombre de la empresa" value="<?php echo $empresa ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-file-invoice"></i> Razón social*</label></strong>
                            <div class="col-sm-12">
                                <input disabled id="razon" name="razon" type="text" class="form-control" placeholder="Razón social" value="<?php echo $razon ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-id-badge"></i> Contacto</label></strong>
                            <div class="col-sm-12">
                                <input disabled id="contacto" name="contacto" type="text" class="form-control" value="<?php echo $contacto?>" placeholder="Contacto">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-envelope-square"></i> Correo</label></strong>
                            <div class="col-sm-12">
                                <input disabled type="text" id="correo" name="correo" placeholder="Correo" value="<?php echo $correo ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-mobile-android-alt"></i> Teléfono</label></strong>
                            <div class="col-sm-12">
                                <input disabled type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono ?>" placeholder="Telefono">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-headset"></i> Origen</label></strong>
                            <div class="col-sm-12">
                                <select name="origen" id="origen" class="form-select" disabled>
                                    <option value="<?php echo $origen ?>"><?php echo $origen ?></option>
                                    <option value="Llamada">Llamada</option>
                                    <option value="Correo">Correo</option>
                                    <option value="Redes">Redes</option>
                                    <option value="Recomendación">Recomendación</option>
                                    <option value="Ing. Marco Antonio Heredia Duvignau">Ing. Marco Antonio Heredia Duvignau</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-location"></i> Dirección</label></strong>
                            <div class="col-sm-12">
                                <input disabled type="text" id="direccion" name="direccion" placeholder="Dirección" class="form-control" value="<?php echo $direccion ?>">
                            </div>
                        </div>
                    </div>
                </div><br>

                <!--<div class="row">
                    <h4 style="text-align: center; color:white" class="bg-dark">Información del tramitador</h4>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="table-dark">
                                <th style="text-align: center;">Nombre del tramitador</th>
                                <th style="text-align: center;">Puesto</th>
                                <th style="text-align: center;">Teléfono</th>
                                <th style="text-align: center;">Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="tr1" name="tr1" placeholder="Tramitador 1" value="<?php echo $tr1?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="tr2" name="tr2" placeholder="Tramitador 2" value="<?php echo $tr2?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="tr3" name="tr3" placeholder="Tramitador 3" value="<?php echo $tr3?>">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="pu1" name="pu1" placeholder="Puesto" value="<?php echo $pu1 ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="pu2" name="pu2" placeholder="Puesto" value="<?php echo $pu2 ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="pu3" name="pu3" placeholder="Puesto" value="<?php echo $pu3 ?>">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>--><!--telefono--><!--
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te1" name="te1" placeholder="Telefono" value="<?php echo $te1 ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te2" name="te2" placeholder="Telefono" value="<?php echo $te2 ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te3" name="te3" placeholder="Telefono" value="<?php echo $te3 ?>">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>--><!--Correo--><!--
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co1" name="co1" placeholder="Correo" value="<?php echo $co1?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co2" name="co2" placeholder="Correo" value="<?php echo $co2?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co3" name="co3" placeholder="Correo" value="<?php echo $co1?>">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>-->
                        
                <!--<div class="row">
                    <h4 style="text-align: center; color:white" class="bg-dark">Planta de producción</h4>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-12 col-form-label">Dirección</label></strong>
                            <div class="col-sm-12">
                                <textarea name="direP" id="direP" class="form-control" rows="1"><?php //echo $direP ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>-->

                <div class="row">
                    <h4 style="text-align: center; color:white" class="bg-dark"><i class="fa-sharp fa-solid fa-people-roof"></i> Familia de productos a certificar</h4>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-universal-access"></i> Familia</label></strong>
                            <div class="col-sm-12">
                                <input disabled type="text" class="form-control" id="fami" name="fami" placeholder="Familia" value="<?php echo $fami ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-suitcase-rolling"></i> Puesto</label></strong>
                            <div class="col-sm-12">
                                <select disabled name="pueF" id="pueF" class="form-select">
                                    <option value="<?php echo $pueF ?>"><?php echo $pueF ?></option>
                                    <option value="Gerente">Gerente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-12 col-form-label"><i class="fas fa-sitemap"></i> Modelos</label></strong>
                            <div class="col-sm-12">
                                <textarea disabled name="modelo" id="modelo" class="form-control" rows="1"><?php echo $modelo?> </textarea>
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <h4 style="text-align: center; color:white" class="bg-dark"><i class="fa-sharp fa-solid fa-bullseye"></i> Otros</h4>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de contrato</label></strong>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de solicitud (Inicio de servicio)</label></strong>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="solici" name="solici" value="<?php echo $solici ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de revisión documentación</label></strong>
                            <div class="col-sm-12">
                            <input type="date" class="form-control" id="revi" name="revi" value="<?php echo $revi ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de visita</label></strong>
                            <div class="col-sm-12">
                            <input type="date" class="form-control" id="visi" name="visi" value="<?php echo $visi ?>"><br>
                            </div>
                        </div>
                    </div>
                    
                    <h4 style="text-align: center; color:white;" class="bg-dark"><i class="fas fa-file-contract"></i> Contrato</h4>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-file-invoice"></i> Acta constitutiva</label></strong>
                            <div class="col-sm-12">
                                <select name="acta" id="acta" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-file-signature"></i> Poder Notarial</label></strong>
                            <div class="col-sm-12">
                                <select name="poder" id="poder" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-file"></i>Constancia de Situación Fiscal</label></strong>
                            <div class="col-sm-12">
                                <select name="situacion" id="situacion" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-id-card-clip"></i> ID Representante legal</label></strong>
                            <div class="col-sm-12">
                                <select name="repre" id="repre" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-file-invoice"></i> Comprobante de domicilio</label></strong>
                            <div class="col-sm-12">
                                <select name="compro" id="compro" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta de tramitadores</label></strong>
                            <div class="col-sm-12">
                                <select name="trami" id="trami" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-id-card-clip"></i> ID de tramitador(es)</label></strong>
                            <div class="col-sm-12">
                                <select name="idTram" id="idTram" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-id-card-clip"></i> ID de testigo 1</label></strong>
                            <div class="col-sm-12">
                                <select name="idTest" id="idTest" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-id-card-clip"></i> ID de testigo 2</label></strong>
                            <div class="col-sm-12">
                                <select name="idTestD" id="idTestD" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="Falta">Falta</option>
                                    <option value="NA">NA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <h4  style="text-align: center; color:white;" class="bg-dark"><i class="fa-sharp fa-solid fa-check-double"></i> Evaluación</h4>
                    <table class="table">
                        
                        <tbody>
                            <tr>
                                <td><!--Documentos-->
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fas fa-file-invoice"></i> Solicitud(es) de servicios</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="solSer" id="solSer" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="solSerO" id="solSerO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-receipt"></i> Tabla de materiales</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="tablaM" id="tablaM" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="tablaMO" id="tablaMO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-biohazard"></i> Evidencia de compra de materia prima</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="evideC" id="evideC" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="evideCO" id="evideCO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta supuesto a certificar</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="cartaS" id="cartaS" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="cartaSO" id="cartaSO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta marcado y lugar de uso de logotipo</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="cartaM" id="cartaM" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="cartaMO" id="cartaMO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-spinner"></i> Proceso de producción detallado</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="proceP" id="proceP" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="procePO" id="procePO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Cartas de proveedores</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="cartaP" id="cartaP" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="cartaPO" id="cartaPO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-pen-to-square"></i> Marcados prototipo</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="marcaP" id="marcaP" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="En revisión">En revisión</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="marcaPO" id="marcaPO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fas fa-file-contract"></i> Contrato o información de maquila</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="contraI" id="contraI" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="contraIO" id="contraIO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <strong><label for="" class="col-form-label col-sm-12"><i class="fa-sharp fa-solid fa-bullseye"></i> Otros documentos</label></strong>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="otroD" id="otroD" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="otroDO" id="otroDO"  rows="1" class="form-control" placeholder="Observaciones"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
                <div class="row">
                    <h4 style="text-align: center; color:white;" class="bg-dark "><i class="fa-sharp fa-solid fa-boxes-stacked"></i> Evidencia de compra de materia prima</h4>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="table-dark">
                                <th style="text-align: center"><i class="fa-sharp fa-solid fa-box"></i> Materia prima</th>
                                <th style="text-align: center"><i class="fas fa-file-signature"></i> Factura</th>
                                <th style="text-align: center"><i class="fa-sharp fa-solid fa-boxes-packing"></i> Proveedor</th>
                                <th style="text-align: center"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta</th>
                                <th style="text-align: center"><i class="fa-sharp fa-solid fa-boxes-packing"></i> Proveedor</th>
                                <th style="text-align: center"><i class="fa-sharp fa-solid fa-arrows-to-eye"></i> Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mtu" id="mtu" rows="1" class="form-control" placeholder="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mtd" id="mtd" rows="1" class="form-control" placeholder="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mtt" id="mtt" rows="1" class="form-control" placeholder="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mtc" id="mtc" rows="1" class="form-control" placeholder="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mtf" id="mtf" rows="1" class="form-control" placeholder="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="mts" id="mts" rows="1" class="form-control" placeholder="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Factura-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ftu" id="ftu" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ftd" id="ftd" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ftt" id="ftt" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ftc" id="ftc" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ftf" id="ftf" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="fts" id="fts" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Proveedor 1-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvu" id="pvu" rows="1" class="form-control" placeholder="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvd" id="pvd" rows="1" class="form-control" placeholder="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvt" id="pvt" rows="1" class="form-control" placeholder="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvc" id="pvc" rows="1" class="form-control" placeholder="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvf" id="pvf" rows="1" class="form-control" placeholder="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pvs" id="pvs" rows="1" class="form-control" placeholder="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Carta-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ctu" id="ctu" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ctd" id="ctd" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ctt" id="ctt" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ctc" id="ctc" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="ctf" id="ctf" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="cts" id="cts" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Entregado">Entregado</option>
                                                    <option value="Falta">Falta</option>
                                                    <option value="NA">NA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Proveedor 2-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pou" id="pou" rows="1" class="form-control" placeholder="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pod" id="pod" rows="1" class="form-control" placeholder="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pot" id="pot" rows="1" class="form-control" placeholder="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="poc" id="poc" rows="1" class="form-control" placeholder="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pof" id="pof" rows="1" class="form-control" placeholder="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="pos" id="pos" rows="1" class="form-control" placeholder="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Observaciones-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obu" id="obu" rows="1" class="form-control" placeholder="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obd" id="obd" rows="1" class="form-control" placeholder="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obt" id="obt" rows="1" class="form-control" placeholder="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obc" id="obc" rows="1" class="form-control" placeholder="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obf" id="obf" rows="1" class="form-control" placeholder="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="obs" id="obs" rows="1" class="form-control" placeholder="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h4 style="text-align: center; color:white;" class="bg-dark "><i class="fa-sharp fa-solid fa-user-magnifying-glass"></i> Revisión de prototipos</h4>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="table-dark">
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-list-check"></i> Producto</th>
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-location-dot"></i> Lugar de uso</th>
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-ruler-combined"></i> Ancho de prototipo (cm)</th>
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-ruler-combined"></i> Medida Actual de logotipo (cm)</th>
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-ruler-combined"></i> Medida correcta de logotipo (cm)</th>
                                <th style="text-align: center;"><i class="fa-sharp fa-solid fa-arrows-to-eye"></i> Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rpu" id="rpu" rows="1" class="form-control" placeholder="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rpd" id="rpd" rows="1" class="form-control" placeholder="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rpt" id="rpt" rows="1" class="form-control" placeholder="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rpc" id="rpc" rows="1" class="form-control" placeholder="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rpf" id="rpf" rows="1" class="form-control" placeholder="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rps" id="rps" rows="1" class="form-control" placeholder="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--lugar de uso-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rlu" id="rlu" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rld" id="rld" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rlt" id="rlt" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rlc" id="rlc" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rlf" id="rlf" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select name="rls" id="rls" class="form-select">
                                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Etiqueta">Etiqueta</option>
                                                    <option value="Empaque">Empaque</option>
                                                    <option value="Costal">Costal</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Ancho prototipo-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rau" name="rau" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rad" name="rad" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rat" name="rat" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rac" name="rac" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="raf" name="raf" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="ras" name="ras" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Medida actual-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rmu" name="rmu" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rmd" name="rmd" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rmt" name="rmt" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rmc" name="rmc" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rmf" name="rmf" type="number" class="form-control" step="0.01"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rms" name="rms" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Medida correcta-->
                                <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rlu" name="rlu" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rld" name="rld" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rlt" name="rlt" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rlc" name="rlc" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rlf" name="rlf" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input id="rls" name="rls" type="number" class="form-control" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Observaciones-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rou" id="rou" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rod" id="rod" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rot" id="rot" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="roc" id="roc" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="rof" id="rof" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <textarea name="ros" id="ros" rows="1" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <strong><label for="" class="form-label"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta supuesto a certificar</label></strong>
                            </div>
                            <div class="col-sm-4">
                                <select name="" id="" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="En revisión">En revisión</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <textarea name="" id=""  rows="1"  class="form-control" placeholder="Observaciones"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <strong><label for="" class="form-label"><i class="fa-sharp fa-solid fa-envelope-open-text"></i> Carta marcado prototipo</label></strong>
                            </div>
                            <div class="col-sm-4">
                                <select name="" id="" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="En revisión">En revisión</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <textarea name="" id=""  rows="1"  class="form-control" placeholder="Observaciones"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <strong><label for="" class="form-label"><i class="fa-sharp fa-solid fa-spinner"></i> Proceso de producción</label></strong>
                            </div>
                            <div class="col-sm-4">
                                <select name="" id="" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="En revisión">En revisión</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <textarea name="" id=""  rows="1"  class="form-control" placeholder="Observaciones"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <strong><label for="" class="form-label"><i class="fa-sharp fa-solid fa-pen-to-square"></i> Marcado prototipo</label></strong>
                            </div>
                            <div class="col-sm-4">
                                <select name="" id="" class="form-select">
                                    <option value="Selecciona una opción">Selecciona una opción</option>
                                    <option value="Entregado">Entregado</option>
                                    <option value="En revisión">En revisión</option>
                                    <option value="Falta">Falta</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <textarea name="" id=""  rows="1"  class="form-control" placeholder="Observaciones"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="../index.php" class="btn btn-danger"><i class="fas fa-undo"></i> Regresar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Guardar</button>
            </form>
            <div class="col-md-6">
                <div class="form-group row">
                    <strong><label for="" class="col-sm-6 col-form-label"></label></strong>
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
    </body>
</html>