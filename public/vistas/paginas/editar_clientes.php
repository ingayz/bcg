<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_cliente.php");

    $cliente = new Clientes();

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       $cliente->EditarClientes();
      //echo $id_usuarios = $_POST["id_usuarios"];
       
       exit();
    }else{
 
		$datos = $cliente->get_cliente_por_id($_GET["id_cliente"]);
	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Clientes - Editar Cliente</title>
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
        <li><a href="<?php echo Conectar::ruta();?>listado_clientes.php">Listado de Clientes Registrados</a></li>
        <li><a href="<?php echo Conectar::ruta();?>agregar_clientes.php">Agregar Clientes</a></li>
        <li class="active">Editar Cliente</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Modulo de Edición de Clientes</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<form  action="" method="POST" >
            <input type="hidden" name="id_cliente" value="<?php echo $datos[0]["id_cliente"];?>">
  					<div class="form-group">
    					<label for="exampleInputEmail1">Cliente</label>
    					<input type="text" name="cliente" class="form-control" placeholder="ingrese Cliente" value="<?php echo $datos[0]["cliente"];?>">
  					</div><!--form-group-->
  					
  					<div class="form-group">
    					<label for="exampleInputPassword1">Unidad</label>
    					<input type="text" class="form-control" name="unidad" placeholder="Unidad" value="<?php echo $datos[0]["unidad"];?>">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputPassword1">Nombre de la Persona Conacto</label>
    					<input type="text" class="form-control" name="contacto" placeholder="Password" value="<?php echo $datos[0]["contacto"];?>">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputEmail1">Telefono</label>
    					<input type="text" class="form-control" name="telefono" placeholder="Email" value="<?php echo $datos[0]["telefono"];?>">
  					</div><!--form-group-->

  					<div class="form-group">
  						<label for="exampleInputEmail1">Correo Electronico </label>
  						<input type="email" class="form-control" name="correo" placeholder="Email" value="<?php echo $datos[0]["correo"];?>">
  					</div><!--form-group-->

  					<input type="hidden" name="grabar" value="si">
  
  					<button type="submit" class="btn btn-round btn-primary">Editar Cliente</button>
				</form>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
</body>
</html>

