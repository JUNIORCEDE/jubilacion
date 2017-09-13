<?php
require_once '../model.php';

$model = new Model();
$msgError = (int)(!isset($_GET['error'])) ? null : $_GET['error'];
$compag =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
$TotalRegistro = 0;
$CantidadMostrar = 20;
$cont = 0;
$consultavistas ="SELECT * FROM prestamos_uni ORDER BY prestamos_uni.mes ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
$model->Listar("SELECT * FROM prestamos_uni");
$cont = count($model->result);
$TotalRegistro = ceil($cont/$CantidadMostrar);
if($cont<1){
    echo '<script type="text/javascript">location.href="?pag=1&error=true";</script>';
}
elseif ($compag > $TotalRegistro) {
    echo '<script type="text/javascript">location.href="?pag='.$TotalRegistro.'";</script>';
}
elseif($compag<1){
    echo '<script type="text/javascript">location.href="?pag=1";</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Datos</title>
        <link href="../style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" href="../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="stylesheet" href="../bootstrap/css/paginacion.css">
        <meta charset="utf-8">
	</head>
    <body style="padding:25px;">
    <h4>Tablas restauradas</h4><br>
        <div class="menu" >
            <ul class="horizontal">
                <li><a href="../index.php">Empleado</a></li>
                <li><a href="interes.php">Interes</a></li>
                <li><a href="liquidacion.php">Liquidaciones</a></li>
                <li><a href="prestamo.php">Prestamos</a></li>
                <li><a href="aporte.php">Aporte</a></li>
                <li><a href="prestamos_uni.php">Prestamos_Uni</a></li>
                <li><a href="prestamos_solicitud.php">Prestamos_Solicitud</a></li>
                <li><a href="prestamos_mov.php">Prestamos_Movimiento</a></li>
                <li><a href="cruge_authassignment.php">cruge_authassignment</a></li>
                <li><a href="cruge_authitem.php">cruge_authitem</a></li>
                <li><a href="cruge_authitemchild.php">cruge_authitemchild</a></li>
                <li><a href="cruge_session.php">cruge_session</a></li>
                <li><a href="cruge_system.php">cruge_system</a></li>
            </ul>
        </div>
            <?php  
                if ($msgError) {
                    echo '<div class="alert alert-danger">';
                    echo '<strong>Error!</strong> Ocurrio algo inesperado no se pudo extraer los datos.';
                    echo '</div>';
                }
                ?>
        <div>
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Código</th>
                            <th style="text-align:left;">Mes</th>
                            <th style="text-align:left;">Nombre</th>
                        </tr>
                    </thead>
                    <?php $model->Listar($consultavistas); 
                    foreach( $model->result as $r): ?>
                        <tr>
                            <td><?php echo $r->CODIGO; ?></td>
                            <td><?php echo $r->MES; ?></td>
                            <td><?php echo $r->NOMBRE; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php
                    if ($TotalRegistro>1) {
                    /*Sector de Paginacion */
                    //Operacion matematica para botón siguiente y atrás 
                    $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
                    $DecrementNum =(($compag -1))<1?1:($compag -1);
                ?>  <center>
                    <ul>
                    <li title='Primera Pagina'><a href=<?php echo '?pag=1&cedula='.$cedula;?> >◀◀</a></li>    
                    <li title='Anterior'><a href=<?php echo '?pag='.$DecrementNum."&cedula=".$cedula;?> >◀</a></li>
                <?php
                   //Se resta y suma con el numero de pag actual con el cantidad de 
                    //números  a mostrar
                     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
                     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
                     //Se valida
                     $Desde=($Desde<1)?1: $Desde;
                     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
                     //Se muestra los números de paginas
                     for($i=$Desde; $i<=$Hasta;$i++){
                        //Se valida la paginacion total
                        //de registros
                        if($i<=$TotalRegistro){
                            //Validamos la pag activo
                          if($i==$compag){
                           echo "<li title='Pagina".$i."' class=\"active pag\"><a href=\"?pag=".$i."&cedula=".$cedula."\">".$i."</a></li>";
                          }else {
                            echo "<li title='Pagina".$i."' class=\"pag\"><a href=\"?pag=".$i."&cedula=".$cedula."\">".$i."</a></li>";
                          }             
                        }
                     }
                    echo "<li title='Siguiente' class=\"btnp pag\"><a href=\"?pag=".$IncrimentNum."&cedula=".$cedula."\">▶</a></li>";
                    echo "<li title='Ultimo' class=\"btnp pag\"><a href=\"?pag=".$TotalRegistro."&cedula=".$cedula."\">▶▶</a></li></ul></center>";
                     } 
                 ?>
        </div>

    </body>
</html>