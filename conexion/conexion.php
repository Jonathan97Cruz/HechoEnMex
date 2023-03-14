<?php
    function conexion(){
        $conexion = new mysqli("localhost","root","","hem");
        if($conexion -> connect_errno){
            echo "Conexion erronea".$conexion->connect_errno;
        }else{
            $conexion->set_charset("utf8");
            return $conexion;
        }
    }
     

?>