<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_cliente.php");

if(!isset($_SESSION["usuario"])){

  header("Location:".Conectar::ruta()."login.php");

}

$cliente = new Clientes();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $cliente->AgregarCliente();
    
    exit();
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Clientes - Agregar Cliente</title>
	<?php include '../../lib/link.php'; ?>
	<style>
		.content{
			margin-left: auto;
			margin-right: auto;
			width: 60%;
		}

		.panel-default > .panel-heading {
    		color: #333;
    		background-color: #005a92;
    		border-color: #ddd;
		}

		.panel-title{
			color: #fff;
		}

		.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    		color: #fff;
    		background: #005a92;
    		border-color: #285e8e;
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
    <ol class="breadcrumb">
        <li><a href="<?php echo Conectar::ruta();?>listado_clientes.php">Listado de Clientes Registrados</a></li>
        <li class="active">Agregar Cliente</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Modulo de Ingreso de Clientes</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<form  action="" method="POST" >
  					<div class="form-group">
    					<label for="exampleInputEmail1">Cliente</label>
    					<input type="text" class="form-control" name="cliente" placeholder="Nombre de la Institución">
  					</div><!--form-group-->
  					
  					<div class="form-group">
    					<label for="exampleInputPassword1">Unidad</label>
    					<input type="text" class="form-control" name="unidad" placeholder="Unidad">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputPassword1">Nombre de la Persona Contacto</label>
    					<input type="text" class="form-control" name="contacto" placeholder="Persona Contacto Dentro de la Institución">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputEmail1">Telefono</label>
    					<input type="text" class="form-control" name="telefono" placeholder="Número Telefonico de la Persona Contacto">
  					</div><!--form-group-->

  					<div class="form-group">
  						<label for="exampleInputEmail1">Correo Electronico</label>
  						<input type="email" class="form-control" name="correo" placeholder="Correo Electronico de la Persona Conacto">
  					</div><!--form-group-->

  					<input type="hidden" name="grabar" value="si">
  
  					<button type="submit" class="btn btn-round btn-primary">Ingresar Cliente</button>
				</form>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
</body>
</html>

