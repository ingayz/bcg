<?php

require_once("../../../class/class_config.php");

if(!isset($_SESSION["usuario"])){

  header("Location:".Conectar::ruta()."login.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Soporte</title>
	<?php include '../../lib/link.php'; ?>

	<style>
		.content{
			margin-left: auto;
			margin-right: auto;
			width: 60%;
		}
	</style>

</head>
<body>
	<?php 
		if ($_SESSION["nivel"]=="Administrador"){
      		
      		include '../inc/menu.php';

    	}elseif ($_SESSION["nivel"]=="Usuario") {
    		
    		include '../inc/menu_usuario.php';
    	}
	?>

	<div class="content">
		<div class="col-sm-6">
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Facturas Pendientes</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<p align="center">BCG</p>
  			</div>
		</div><!--panel panel-default-->
	</div><!--col-sm-6-->
		<div class="col-sm-6">
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Servicios Pendientes</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<p align="center">BCG</p>
  			</div>
		</div><!--panel panel-default-->
		</div><!--col-sm-6-->

	</div><!--content-->
<?php include '../../lib/script.php'; ?>


</body>
</html>