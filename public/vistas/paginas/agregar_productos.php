<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_producto.php");

if(!isset($_SESSION["usuario"])){

  header("Location:".Conectar::ruta()."login.php");

}

$producto = new Productos();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $producto->AgregarProductos();
    
    exit();
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Productos - Agregar Producto</title>
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
        <li><a href="<?php echo Conectar::ruta();?>listado_productos.php">Listado de Productos Registrados</a></li>
        <li class="active">Agregar Producto</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Modulo de Ingreso de Productos</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<form  action="" method="POST" >
  					<div class="form-group">
    					<label for="exampleInputEmail1">Producto</label>
    					<input type="text" class="form-control" name="producto" placeholder="Producto a Registrar">
  					</div><!--form-group-->
  					
  					<input type="hidden" name="grabar" value="si">
  
  					<button type="submit" class="btn btn-round btn-primary">Ingresar Produto</button>
				</form>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
</body>
</html>

