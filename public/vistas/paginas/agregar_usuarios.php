<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_usuario.php");

if(!isset($_SESSION["usuario"])){

  header("Location:".Conectar::ruta()."login.php");

}

$usuario = new Usuarios();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $usuario->AgregarUsuario();
    
    exit();
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuarios - Agregar Usuario</title>
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
        <li><a href="<?php echo Conectar::ruta();?>listado_usuarios.php">Listado de Usuarios Registrados</a></li>
        <li class="active">Agregar Usuario</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Modulo de Ingreso de Usuarios</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<form  action="" method="POST" >
  					<div class="form-group">
    					<label for="exampleInputEmail1">Nombre y Apellido</label>
    					<input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido">
  					</div><!--form-group-->
  					
  					<div class="form-group">
    					<label for="exampleInputPassword1">Usuario</label>
    					<input type="text" class="form-control" name="usuario" placeholder="Usuario">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputPassword1">Password</label>
    					<input type="password" class="form-control" name="password" placeholder="Password">
  					</div><!--form-group-->

  					<div class="form-group">
    					<label for="exampleInputEmail1">Email</label>
    					<input type="email" class="form-control" name="correo" placeholder="Email">
  					</div><!--form-group-->

  					<div class="form-group">
  						<label for="exampleInputEmail1">Nivel de Acceso</label>
  						<select type="email" class="form-control" name="nivel" placeholder="Email">
  							<option></option>
  							<option>Administrator</option>
  							<option>Usuario</option>
  						</select>
  					</div><!--form-group-->

  					<input type="hidden" name="grabar" value="si">
  
  					<button type="submit" class="btn btn-round btn-primary">Ingresar Usuario</button>
				</form>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
</body>
</html>

