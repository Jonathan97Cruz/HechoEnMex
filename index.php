<?php
session_start();
if(!empty($_SESSION['active'])){
    header("location:sistema/");
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Inicio de sesión</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/alertifyjs/alertify.js"></script>
    </head>
    <body>
        <div class="container w-200 mt-5 rounded shadow">
            <div class="row align-items-stretch">
                <div class="col d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                    <div id="carouselExamplesSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1800">
                                <img src="img/m5.jpg" alt="" class="imag d-block w-100 rounded" style="height:575px">
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <img src="img/m1.jpg" alt="" class="imag d-block w-100 rounded" style="height:575px">
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <img src="img/m2.png" alt="" class="imag d-block w-100 rounded" style="height:575px">
                            </div>
                            <div class="carousel-item" data-bs-interval="1800">
                                <img src="img/m4.jpg" alt="" class="imag d-block w-100 rounded" style="height:575px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col bg-white p-5 rounded-end">
                    <center><div><img src="img/logo2.bmp" alt=""></div></center>
                    <h2 class="fw-bold text-center py-5">Bienvenido / Bienvenida</h2>
                    <div class="mb4">
                        <strong><label for="usuario" class="form-label">Usuario</label></strong>
                        <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" class="form-control">
                    </div>
                    <div class="mb4">
                        <strong><label for="password" class="form-label">Contraseña</label></strong>
                        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" class="form-control">
                    </div><br>
                    <button class="btn btn-primary" id="entrar">Iniciar sesión</button>
                    <strong><p style="text-align: right;">V.1.0.0</p></strong>    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

<?php 
}
?>

<script>
    $(document).ready(function(){
        $('#entrar').click(function(){
            if($('#usuario').val() == "" || $('#password').val() == "" ){
                alertify.error("Ingresa el usuario y contraseña");
                return false;
            }

            cad = "usuario=" + $('#usuario').val()+"&password=" + $('#password').val();
            $.ajax({
                type:"POST",
                url:"conexion/login.php",
                data: cad,
                success: function(r){
                    if(r == 1){
                        console.log(r);
                        alertify.success("Inicio de sesión");
                        window.location = "sistema/index.php";
                    }else{
                        alertify.error("Usuario o contraseña incorrecta");
                        console.log(r);
                    }
                }
            })
        })
    })
</script>