<?php

require_once '../../conexion/conexion.php';
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header('location:../../index.php');
}
$conexion = conexion();
$idSegui = $_POST['idS'];
//Contrato
$acta = $_POST['acta'];
$poder = $_POST['poder'];
$situacion = $_POST['situacion'];
$repre = $_POST['repre'];
$compro = $_POST['compro'];
$trami = $_POST['trami'];
$idTram = $_POST['idTram'];
$idTest = $_POST['idTest'];
$idTestD = $_POST['idTestD'];

//Evaluación
$solSer = $_POST['solSer'];
$solSerO = $_POST['solSerO'];
$tablaM = $_POST['tablaM'];
$tablaMO = $_POST['tablaMO'];
$evideC = $_POST['evideC'];
$evideCO = $_POST['evideCO'];
$cartaS = $_POST['cartaS'];
$cartaSO = $_POST['cartaSO'];
$cartaM = $_POST['cartaM'];
$cartaMO = $_POST['cartaMO'];
$proceP = $_POST['proceP'];
$procePO = $_POST['procePO'];
$cartaP = $_POST['cartaP'];
$cartaPO = $_POST['cartaPO'];
$marcaP = $_POST['marcaP'];
$marcaPO = $_POST['marcaPO'];
$contraI = $_POST['contraI'];
$contraIO = $_POST['contraIO'];
$otroD = $_POST['otroD'];
$otroDO = $_POST['otroDO'];

//Evidencia de compra de materia prima tabla 1
$mtu = $_REQUEST['mtu'];
$ftu = $_REQUEST['ftu'];
$pvu = $_REQUEST['pvu'];
$ctu = $_REQUEST['ctu'];
$pou = $_REQUEST['pou'];
$obu = $_REQUEST['obu'];
//Revisión de prototipos tabla 2
$rpu = $_REQUEST['rpu'];
$rlu = $_REQUEST['rlu'];
$rau = $_REQUEST['rau'];
$rmu = $_REQUEST['rmu'];
$rlu = $_REQUEST['rlu'];
$rou = $_REQUEST['rou'];
//Carta supuesto a certificar
$carc = $_POST['carc'];
$carco = $_POST['carco'];
$camap = $_POST['camap'];
$camapo = $_POST['camapo'];
$propr = $_POST['propr'];
$propro = $_POST['propro'];
$pmarcp = $_POST['pmarcp'];
$pmarcpo = $_POST['pmarcpo'];

$queryC = mysqli_query($conexion,"INSERT INTO contrato (acta,poder,situa,repres,compro,trammi,idTram,idTest,idTestD,idSeg) 
                                    VALUES ('$acta','$poder','$situacion','$repre','$compro','$trami','$idTram','$idTest','$idTestD','$idSegui')" );
if($queryC == true){
    $queryE = mysqli_query($conexion,"INSERT INTO evalua (solSer,solSerO,tablaM,tablaMO,evideC,evideCO,cartaS,cartaSO,cartaM,cartaMO,proceP,procePO,
                                    cartaP,cartaPO,marcaP,marcaPO,contraI,contraIO,otroD,otroDO,idSeg) 
                                    VALUES ('$solSer','$solSerO','$tablaM','$tablaMO','$evideC','$evideCO','$cartaS','$cartaSO','$cartaM','$cartaMO','$proceP','$procePO',
                                    '$cartaP','$cartaPO','$marcaP','$marcaPO','$contraI','$contraIO','$otroD','$otroDO','$idSegui')" );
    if($queryE == true){
        $queryS = mysqli_query($conexion,"INSERT INTO caSupu (carc,carco,camap,camapo,propr,propro,pmarcp,pmarcpo,idSeg) 
                                    VALUES ('$carc','$carco','$camap','$camapo','$propr','$propro','$pmarcp','$pmarcpo','$idSegui')");
        if($queryS == true){
            for($i = 0; $i < count($mtu); $i++){
                $query = mysqli_query($conexion,"INSERT INTO evComp (matPri,fact,provee,carta,proveed,obs,idEmp) 
                                                VALUES ('".$mtu[$i]."','".$ftu[$i]."','".$pvu[$i]."','".$ctu[$i]."','".$pou[$i]."','".$obu[$i]."','".$idSegui."') ");
            }
            
            for($u = 0; $u < count($rpu); $u++){
                $query = mysqli_query($conexion,"INSERT INTO reProto (prod, lugar, ancho, medAct, medCor, obs, idEmp) 
                                                VALUES ('".$rpu[$u]."','".$rlu[$u]."','".$rau[$u]."','".$rmu[$u]."','".$rlu[$u]."','".$rou[$u]."','".$idSegui."')" );
            }
            $_SESSION['msj'] = 'REGISTRADO CORRECTAMENTE';
            header('location: ../index.php');
        }else{
            $_SESSION['msj'] = 'ERROR EN CARTA SUPUESTO A CERTIFICAR';
        }
    }else{
        $_SESSION['msj'] = 'ERROR EN EVALUACIÓN';
    }
}else{
    $_SESSION['msj'] = 'ERROR EN EL CONTRATO';
}

?>