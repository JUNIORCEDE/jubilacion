<?php
require_once '../entidades/cruge_system.entidad.php';
require_once '../models/cruge_system.model.php';

// Logica
$cruge = new CrugeSystem();
$model = new CrugeSystemModel();
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
                            <th style="text-align:left;">idsystem</th>
                            <th style="text-align:left;">name</th>
                            <th style="text-align:left;">largename</th>
                            <th style="text-align:left;">sessionmaxdurationmins</th>
                            <th style="text-align:left;">sessionmaxsameipconnections</th>
                            <th style="text-align:left;">sessionreusesessions</th>
                            <th style="text-align:left;">sessionmaxsessionsperday</th>
                            <th style="text-align:left;">sessionmaxsessionsperuser</th>
                            <th style="text-align:left;">systemnonewsessions</th>
                            <th style="text-align:left;">systemdown</th>
                            <th style="text-align:left;">registerusingcaptcha</th>
                            <th style="text-align:left;">registerusingterms</th>
                            <th style="text-align:left;">terms</th>
                            <th style="text-align:left;">registerusingactivation</th>
                            <th style="text-align:left;">defaultroleforregistration</th>
                            <th style="text-align:left;">registerusingtermslabel</th>
                            <th style="text-align:left;">registrationonlogin</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idsystem'); ?></td>
                            <td><?php echo $r->__GET('name'); ?></td>
                            <td><?php echo $r->__GET('largename'); ?></td>
                            <td><?php echo $r->__GET('sessionmaxdurationmins'); ?></td>
                            <td><?php echo $r->__GET('sessionmaxsameipconnections'); ?></td>
                            <td><?php echo $r->__GET('sessionreusesessions'); ?></td>
                            <td><?php echo $r->__GET('sessionmaxsessionsperday'); ?></td>
                            <td><?php echo $r->__GET('sessionmaxsessionsperuser'); ?></td>
                            <td><?php echo $r->__GET('systemnonewsessions'); ?></td>
                            <td><?php echo $r->__GET('systemdown'); ?></td>
                            <td><?php echo $r->__GET('registerusingcaptcha'); ?></td>
                            <td><?php echo $r->__GET('registerusingterms'); ?></td>
                            <td><?php echo $r->__GET('terms'); ?></td>
                            <td><?php echo $r->__GET('registerusingactivation'); ?></td>
                            <td><?php echo $r->__GET('defaultroleforregistration'); ?></td>
                            <td><?php echo $r->__GET('registerusingtermslabel'); ?></td>
                            <td><?php echo $r->__GET('registrationonlogin'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

        </div>

    </body>
</html>
