<?php
require_once '../model.php';

// Logica
//$aport = new Aporte();
//$model = new AporteModel();
$model = new Model();
$cedula = null;

	if(isset($_POST['Consultar']))
	{
		$cedula = $_POST['Cedula'];
	}
	elseif(isset($_POST['Nuevo'])){
		$cedula = null;
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
					<h3 id="TA" style="font-weight:bold;"></h3>
					<h3 id="TPE" style="font-weight:bold;"></h3>
					<h3 id="TPA" style="font-weight:bold;"></h3>
				</div>
            
				<br><br>	
			<table id="tabla" class="table table-bordered table-condensed table-hover" style="width:90%;" >
				<thead>
					
					<tr>
						<th >Año</th>
						<th >Mes</th>
						<th >Sueldo</th>
						<th >Sub Anterior</th>
						<th >Aporte Personal</th>
						<th >Aporte Patronal</th>
					</tr>
				</thead>
				<?php 
					$TPatronal=0;
					$TPersonal=0;
					$cont=0;
					if (!is_null($cedula) and !($cedula=="")){
						$model->Listar("SELECT * FROM aporte where CEDULA = ".$cedula);
					foreach( $model->result as $r): ?>
					<tr>
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->ANIO; ?></td>
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->MES; ?></td>
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->SUELDO; ?></td> 
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->SUBANTI; ?></td> 
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->APORTE_PERSONAL; ?></td>
						<td style="text-align:left;padding:.5em 5em"><?php echo $r->APORTE_PATRONAL; ?></td>
					</tr>
				<?php 
				   $TPatronal = $TPatronal+floatval($r->APORTE_PATRONAL);
				   $TPersonal = $TPersonal+floatval($r->APORTE_PERSONAL);
				   $cont = $cont+1;
					endforeach;
					}
			?>
			<tr style="font-weight:bold;">
				<td>Numero de aportes</td>
				<td id="NAportes"><?php echo $cont ?></td>
				<td></td>
				<td>Total: </td>
				<td id="TPersonal"><?php echo $TPersonal ?></td>
				<td id="TPatronal"><?php echo $TPatronal ?></td>
			</tr>	
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
        var NAportes = document.getElementById('NAportes').innerHTML;
        var TPersonal = document.getElementById('TPersonal').innerHTML;
        var TPatronal = document.getElementById('TPatronal').innerHTML;
            document.getElementById('TA').innerHTML = "Total numero de Aportes: "+NAportes;
            document.getElementById('TPE').innerHTML= "Total aporte personal $"+TPersonal;
            document.getElementById('TPA').innerHTML= "Total aporte patronal $"+TPatronal;
</script>
