<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_producto.php");

    $producto = new Productos();

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       $producto->EditarProductos();
      //echo $id_usuarios = $_POST["id_usuarios"];
       exit();
    }else{
 
		$datos = $producto->get_producto_por_id($_GET["id_producto"]);
	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Productos - Editar Producto</title>
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
	<?php include '../inc/menu.php'; ?>

	<div class="content">
    <ol class="breadcrumb">
        <li><a href="<?php echo Conectar::ruta();?>listado_productos.php">Listado de Productos Registrados</a></li>
        <li><a href="<?php echo Conectar::ruta();?>agregar_productos.php">Agregar Productos</a></li>
        <li class="active">Editar Producto</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Modulo de Edición de Productos</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<form  action="" method="POST" >
            <input type="hidden" name="id_producto" value="<?php echo $datos[0]["id_producto"];?>">
  					<div class="form-group">
    					<label for="exampleInputEmail1">Producto</label>
    					<input type="text" name="producto" class="form-control" placeholder="Ingrese Producto" value="<?php echo $datos[0]["producto"];?>">
  					</div><!--form-group-->
 
  					<input type="hidden" name="grabar" value="si">
  
  					<button type="submit" class="btn btn-round btn-primary">Editar Producto</button>
				</form>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
</body>
</html>

