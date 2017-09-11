<?php
require_once '../model.php';

// Logica
$model = new Model();
// se obtiene la cedula por medio de la url
$cedula = (int)(!isset($_GET['cedula'])) ? null : $_GET['cedula'];;
//si presiona consultar se envia la cedula
if(isset($_POST['Consultar']))
{
    $cedula = $_POST['Cedula'];
}
elseif(isset($_POST['Nuevo'])){
    $cedula = null;
}
$compag =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
$TotalRegistro = 0;
$CantidadMostrar = 20;
$consultavistas ="SELECT * FROM interes ORDER BY interes.ID_INTERES ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
if (!is_null($cedula) and !($cedula=="") and ($cedula!=0)){
    $consulta = $model->Listar("SELECT * FROM interes where CEDULA = ".$cedula);
    $cont = count($model->result);
    $TotalRegistro = ceil($cont/$CantidadMostrar);
    $consultavistas ="SELECT * FROM interes where CEDULA = ".$cedula." ORDER BY interes.ID_INTERES ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
}
else{
    $model->Listar("SELECT * FROM interes");
    $cont = count($model->result);
    $TotalRegistro = ceil($cont/$CantidadMostrar);
}

if ($compag > $TotalRegistro) {
    echo '<script type="text/javascript">location.href="?pag='.$TotalRegistro.'&cedula='.$cedula.'";</script>';
}
elseif($compag<1){
    echo '<script type="text/javascript">location.href="?pag=1&cedula='.$cedula.'";</script>';
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
        <br><br><br>
        <div>

         <div class="pure-g">
            <div class="pure-u-1-12">
                <form method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <table>
                        <tr>    
                            <td><label>Cedula: </label></td>
                            <td></td><td></td>
                            <td><input type="text" name="Cedula" value="<?php echo $cedula; ?>" /></td>
                        </tr>
                    </table>        
                    <br>
                    <table>                     
                    <tr>
                    <td><button type="submit" name="Consultar" class="pure-button pure-button-primary">Consultar</button></td>
                    
                    <td><button type="submit" name="Nuevo" class="pure-button pure-button-primary">Nuevo</button></td>
                    </tr>
                    </table>
                </form>
                </div>
                </div>
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Id</th>
                            <th style="text-align:left;">Año</th>
                            <th style="text-align:left;">Cédula</th>
                            <th style="text-align:left;">Capital</th>
                            <th style="text-align:left;">Captota</th>
                            <th style="text-align:left;">Interés</th>
                            <th style="text-align:left;">Monto</th>
                        </tr>
                    </thead>
                <?php 
                    $model->Listar($consultavistas);
                    foreach( $model->result as $r): ?>
                    <tr>
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->ID_INTERES; ?></td>
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->ANIO; ?></td>
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->CEDULA; ?></td> 
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->CAPITAL; ?></td> 
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->CAPTOTA; ?></td>
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->INTERES; ?></td>
                        <td style="text-align:left;padding:.5em 5em"><?php echo $r->MONTO; ?></td>
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