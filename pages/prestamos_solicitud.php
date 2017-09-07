<?php
require_once '../entidades/prestamos_solicitud.entidad.php';
require_once '../models/prestamos_solicitud.model.php';

// Logica
$prest = new Prestamo_Soli();
$model = new Prestamo_SoliModel();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Datos</title>
        <link href="../style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" href="../bootstrap/js/bootstrap.min.js"></script>
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
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Código</th>
                            <th style="text-align:left;">Número de Solicitud</th>
                            <th style="text-align:left;">Cédula</th>
                            <th style="text-align:left;">Nombres</th>
                            <th style="text-align:left;">Monto</th>
                            <th style="text-align:left;">Periodos</th>
                            <th style="text-align:left;">Estado</th>
                            <th style="text-align:left;">Tipo</th>
                            <th style="text-align:left;">Procesado</th>
                            <th style="text-align:left;">Fecha</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('codigo'); ?></td>
                            <td><?php echo $r->__GET('num_soli'); ?></td>
                            <td><?php echo $r->__GET('cedula'); ?></td>
                            <td><?php echo $r->__GET('nombres'); ?></td>
                            <td><?php echo $r->__GET('monto'); ?></td>
                            <td><?php echo $r->__GET('periodos'); ?></td>
                            <td><?php echo $r->__GET('estado'); ?></td>
                            <td><?php echo $r->__GET('tipo'); ?></td>
                            <td><?php echo $r->__GET('procesado'); ?></td>
                            <td><?php echo $r->__GET('fecha'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
        </div>

    </body>
</html>
