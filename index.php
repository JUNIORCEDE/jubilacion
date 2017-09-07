<?php
require_once 'model.php';

// Logica
//$aport = new Aporte();
//$model = new AporteModel();
$model = new Model();
$cedula = null;
$sentencia = "SELECT * FROM empleado";
    if(isset($_POST['Consultar']))
    {
        $cedula = $_POST['Cedula'];
        $sentencia = "SELECT * FROM empleado where CEDULA = ".$cedula;
        if ($cedula==""){
        $cedula="  ";
        $sentencia = "SELECT * FROM empleado";
        }
    }
    elseif(isset($_POST['Nuevo'])){
        $cedula="  ";
        $sentencia = "SELECT * FROM empleado";
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Datos</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <meta charset="utf-8">
    </head>
    <body style="padding:25px;">
    <h4>Tablas restauradas</h4><br>
        <div class="menu" >
            <ul class="horizontal">
                <li><a href="index.php">Empleado</a></li>
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
                
                <div class="patito">
                    <h3 id="TA"></h3>
                    <h3 id="TPE"></h3>
                    <h3 id="TPA"></h3>
                </div>
            
                <br><br>    
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
                        if (!is_null($cedula) and !($cedula=="") or $sentencia){
                            $model->Listar($sentencia);
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


                    <?php 
                        endforeach;
                        }
                ?>
                </table>     
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




