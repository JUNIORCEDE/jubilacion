<?php
require_once 'model.php';

$model = new Model();
// se obtiene la cedula por medio de la url
$cedula = (int)(!isset($_GET['cedula'])) ? null : $_GET['cedula'];
$msgError = (int)(!isset($_GET['error'])) ? null : $_GET['error'];

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
$cont = 1;
$consultavistas ="SELECT * FROM empleado ORDER BY empleado.FECHA_INGRESO ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
if (!is_null($cedula) and !($cedula=="") and ($cedula!=0)){
    $consulta = $model->Listar("SELECT * FROM empleado where CEDULA = ".$cedula);
    $cont = count($model->result);
    $TotalRegistro = ceil($cont/$CantidadMostrar);
    $consultavistas ="SELECT * FROM empleado where CEDULA = ".$cedula." ORDER BY empleado.FECHA_INGRESO ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
}
else{
    $model->Listar("SELECT * FROM empleado");
    $cont = count($model->result);
    $TotalRegistro = ceil($cont/$CantidadMostrar);
}
if($cont<1){
    echo '<script type="text/javascript">location.href="?pag=1&error=true";</script>';
}
elseif ($compag > $TotalRegistro) {
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
                <li class="active"><a href="index.php">Empleado</a></li>
                <li><a href="pages/interes.php">Interes</a></li>
                <li><a href="pages/liquidacion.php">Liquidaciones</a></li>
                <li><a href="pages/prestamo.php">Prestamos</a></li>
                <li><a href="pages/aporte.php">Aporte</a></li>
                <li><a href="pages/prestamos_uni.php">Prestamos_Uni</a></li>
                <li><a href="pages/prestamos_solicitud.php">Prestamos_Solicitud</a></li>
                <li><a href="pages/prestamos_mov.php">Prestamos_Movimiento</a></li>
                <li><a href="pages/cruge_authassignment.php">cruge_authassignment</a></li>
                <li><a href="pages/cruge_authitem.php">cruge_authitem</a></li>
                <li><a href="pages/cruge_authitemchild.php">cruge_authitemchild</a></li>
                <li><a href="pages/cruge_session.php">cruge_session</a></li>
                <li><a href="pages/cruge_system.php">cruge_system</a></li>
            </ul>
        </div>
        <br><br><br>
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
                <?php  
                if ($msgError) {
                    echo '<div class="alert alert-danger">';
                    echo '<strong>Error!</strong> Cédula no encontrada se mostrará todos los datos paginados.';
                    echo '</div>';
                }
                ?>   
                <table id="tabla" class="table table-bordered table-condensed table-hover">
                    <thead>
                        
                        <tr>
                            <th >CEDULA</th>
                            <th >NOMBRE</th>
                            <th >TIPO</th>
                            <th >FECHA_INGESO</th>
                            <th >ESTADO</th>
                        </tr>
                    </thead>
                <?php 
                    $model->Listar($consultavistas);
                    foreach( $model->result as $r): ?>
                        <tr>
                            <td style="text-align:left;padding:.5em 5em"><?php echo $r->CEDULA; ?></td>
                            <td style="text-align:left;padding:.5em 5em"><?php echo $r->NOMBRES; ?></td>
                            <?php  
                                $tipo = "";
                                if (intval($r->TIPO)== 2 ) {$tipo="Docente";}
                                elseif(intval($r->TIPO)== 1 ){$tipo = "Empleado";}
                                    elseif(intval($r->TIPO)== 3){$tipo = "Trabajador";}
                            ?>
                            <td style="text-align:left;padding:.5em 5em"><?php echo $tipo; ?></td> 
                            <td style="text-align:left;padding:.5em 5em"><?php echo $r->FECHA_INGRESO; ?></td> 
                            <td style="text-align:left;padding:.5em 5em"><?php echo $r->ESTADO; ?></td> 
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
    </body>
</html>


<script language="javascript">
        var tabla={}
        var tablaHTML = document.getElementById('tabla');
        for (var i = 1; i < tablaHTML.rows.length; i++)
        {
            tablaHTML.rows[i].addEventListener("click", function(){
                if (tabla[this]&&tabla[this]==this) {
                    tabla[this]= null;
                    this.style.removeProperty("background-color");
                    this.style.removeProperty("color");
                }
                else{
                    var tablaHTML = document.getElementById('tabla');
                    for (var a = 1; a < tablaHTML.rows.length; a++)
                    {
                        tablaHTML.rows[a].style.removeProperty("background-color");
                        tablaHTML.rows[a].style.removeProperty("color");
                    }
                    this.style.backgroundColor="#0cede1";
                    this.style.color="#ffffff";
                    tabla[this] = this;
                }
                });
        }
</script>




