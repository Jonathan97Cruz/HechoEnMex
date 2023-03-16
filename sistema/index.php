<?php
require_once "../conexion/conexion.php";
session_start();
if($_SESSION['active'] != true ){
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            if(isset($_SESSION['msj'])){
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
    
    <div class="container-fluid mt-3">
            <div class="col-12 grid-margin bg-white p-1 rounded-end">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-info table-striped">
                            <strong><h3 style="background:#98FB98; text-align:center">Empresas</h3></strong>
                            <thead class="thead-dark">
                                <tr style="text-align: center; background:#98FB98">
                                    <td>Empresa</td>
                                    <td>Contacto</td>
                                    <td>Teléfono</td>
                                    <td>Seguimiento</td>
                                    <td>Actual</td>
                                </tr>
                            </thead>
                            <?php
                                $query = mysqli_query($conexion,"SELECT * FROM registro");
                                $que = mysqli_num_rows($query);
                                if($que > 0){
                                    while($a = mysqli_fetch_array($query)){
                            ?>
                                <tbody style="text-align:center">
                                        <td><?php echo $empresa = $a['nomEmp'];  ?></td>
                                        <td><?php echo $contacto = $a['contacto']; ?></td>
                                        <td><?php echo $telefo = $a['telefono']; ?></td>
                                        <td>
                                            <form action="segui/seg.php" method="POST">
                                                <input type="hidden" name="idSe" id="idSe" value="<?php echo $idS = $a['idR']; ?>">
                                                <center><button class="btn btn-primary">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                </button></center>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="segui/seguimi.php" method="POST">
                                                <input type="hidden" name="idSe" value="<?php echo $idS = $a['idR']; ?>">
                                                <center><button class="btn btn-success"><i class="fa fa-folder-open" aria-hidden="true"></i></button></center>
                                            </form>
                                        </td>
                                </tbody>
                            <?php
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="sweetalert2.all.min.js"></script>
    </body>
</html>