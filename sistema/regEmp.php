<?php

require_once "../conexion/conexion.php";
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header("location:../index.php");
}
$conexion = conexion();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../img/logo1.png" rel="shortcut icon" type="image/png">
        <title>HM</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/5d3f0049df.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../img/logo2.bmp" alt="" style="width:80px; height: 50px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php"> <i class="fas fa-home"></i> Inicio <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="regEmp.php"> <i class="fas fa-user-edit"></i> Registrar empresa</a>
                        </li>
                        <li class="nav-item">
                            <a href="../conexion/salir.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!--<form class="form-inline my-2 my-lg-0" method="POST" action="buscar.php">
                    <input  class="mr-sm-2" type="search" placeholder="BUSCAR" aria-label="Search" name="nombre">
                    <button class="btn btn-outline-success my-sm-1 " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>-->
                </div>
            </div>            
        </nav>
        <?php 
            if(isset($_SESSION['msg'])){
                $mensaje = $_SESSION['msj'];
        ?>
            <script>
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: '<?php echo $mensaje ?>',
                    showConfirmButton: true,
                    timer: 3500
                })
            </script>    
        <?php
            unset($_SESSION['msj']);
            }
        ?>
        <div class="container-fluid">
            <form action="agregar/agEm.php" method="POST">
                <div class="row">
                    <h2 class="fw-bold"><i class="fa-sharp fa-solid fa-tree-city"></i> Registro de empresas</h2>
                    <h4 class="bg-info"><i class="fa-sharp fa-solid fa-hotel"></i> Información de la empresa</h4>
                    <p class="bg-success text-white">Todos los campos marcados con un "*" son obligatorios.</p>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fa-sharp fa-solid fa-dice-d20"></i> Nombre de la empresa*</label></strong>
                            <div class="col-sm-12">
                                <input id="empresa" name="empresa" type="text" class="form-control" placeholder="Nombre de la empresa" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-file-invoice"></i> Razón social*</label></strong>
                            <div class="col-sm-12">
                                <input id="razon" name="razon" type="text" class="form-control" placeholder="Razón social" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-id-badge"></i> Contacto</label></strong>
                            <div class="col-sm-12">
                                <input id="contacto" name="contacto" type="text" class="form-control" placeholder="Contacto">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-envelope-square"></i> Correo</label></strong>
                            <div class="col-sm-12">
                                <input type="text" id="correo" name="correo" placeholder="Correo" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-mobile-android-alt"></i> Telefono</label></strong>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-headset"></i> Origen</label></strong>
                            <div class="col-sm-12">
                                <select name="origen" id="origen" class="form-select">
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
                                <input type="text" id="direccion" name="direccion" placeholder="Dirección" class="form-control">
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                <h4 class=" bg-info"><i class="fas fa-address-book"></i> Información del tramitador</h4>
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="table-primary">
                                <th style="text-align: center;"><i class="fas fa-child"></i> Nombre del tramitador</th>
                                <th style="text-align: center;"><i class="fas fa-suitcase-rolling"></i> Puesto</th>
                                <th style="text-align: center;"><i class="fas fa-mobile-android-alt"></i> Teléfono</th>
                                <th style="text-align: center;"><i class="fas fa-envelope-square"></i> Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tr1" name="tr1" placeholder="Tramitador 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tr2" name="tr2" placeholder="Tramitador 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tr3" name="tr3" placeholder="Tramitador 3">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Puesto-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pu1" name="pu1" placeholder="Puesto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pu2" name="pu2" placeholder="Puesto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pu3" name="pu3" placeholder="Puesto">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--Telefono-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te1" name="te1" placeholder="Telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te2" name="te2" placeholder="Telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="te3" name="te3" placeholder="Telefono">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><!--correo-->
                                <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co1" name="co1" placeholder="Correo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co2" name="co2" placeholder="Correo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <input type="text" class="form-control" id="co3" name="co3" placeholder="Correo">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
                <div class="row">
                    <h4 class="bg-info"><i class="fa-sharp fa-solid fa-seedling"></i> Planta de producción</h4>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-12 col-form-label"><i class="fas fa-location"></i> Dirección</label></strong>
                            <div class="col-sm-12">
                                <textarea name="direP" id="direP" rows="1" class="form-control" placeholder="Separa las direcciones con una ';'"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <h4 class="bg-info"><i class="fa-sharp fa-solid fa-people-roof"></i> Familia de productos a certificar</h4>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fa-sharp fa-solid fa-universal-access"></i> Familia</label></strong>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fami" name="fami" placeholder="Familia">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-form-label col-sm-6"><i class="fas fa-suitcase-rolling"></i> Puesto</label></strong>
                            <div class="col-sm-12">
                                <select name="pueF" id="pueF" class="form-select">
                                    <option value="Selecciona un puesto">Selecciona un puesto</option>
                                    <option value="Gerente">Gerente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-12 col-form-label"><i class="fas fa-sitemap"></i> Modelos</label></strong>
                            <div class="col-sm-12">
                                <textarea name="modelo" id="modelo" class="form-control" rows="1" placeholder="Separa los modelos con ';' "></textarea>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <h4 class="bg-info"><i class="fa-sharp fa-solid fa-bullseye"></i> Otros</h4>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de contrato</label></strong>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de solicitud (Inicio de servicio)</label></strong>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="solici" name="solici">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i> Fecha de revisión documentación</label></strong>
                            <div class="col-sm-12">
                            <input type="date" class="form-control" id="revi" name="revi">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <strong><label for="" class="col-sm-6 col-form-label"><i class="fas fa-calendar-day"></i>Fecha de visita</label></strong>
                            <div class="col-sm-12">
                            <input type="date" class="form-control" id="visi" name="visi">
                            </div>
                        </div>
                    </div>
                </div><br>
                <a href="index.php" class="btn btn-danger"><i class="fas fa-undo"></i> Regresar</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Registrar</button>
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
        <script src="sweetalert2.all.min.js"></script>
    </body>
</html>