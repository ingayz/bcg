<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_usuario.php");

if(!isset($_SESSION["usuario"])){

  header("Location:".Conectar::ruta()."login.php");

}

$usuario = new Usuarios();

$datos = $usuario->ListarUsuario();
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuarios - Listado de Usuarios</title>
	<?php include '../../lib/link.php'; ?>
	<style>
		.content{
			margin-left: auto;
			margin-right: auto;
			width: 80%;
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

    if ($_SESSION["nivel"]=="Administrador") 
    {
      include '../inc/menu.php';
    }else{
      include '../inc/menu_usuario.php';
  }
   ?>

	<div class="content">
    <ol class="breadcrumb">
        <li><a href="<?php echo Conectar::ruta();?>agregar_usuarios.php">Agregar Usuario</a></li>
        <li class="active">Listado de Usuarios Registrados</li>
    </ol>
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Listado de Usuarios Registrados</h3>
  			</div><!--panel-heading-->
  			<div class="panel-body">
    			<table id="usuarios" class="table table-striped table-border" border="1" align="center">
              <thead>
                
                <tr>
                  <td><div align="center"><strong>Nombre</strong></div></td>
                  <td><div align="center"><strong>Usuaurio</strong></div></td>
                  <td><div align="center"><strong>Correo</strong></div></td>
                  <td><div align="center"><strong>Nivel</strong></div></td>
                  <td><div align="center"><strong>Acciones</strong></div></td>
                </tr>
              </thead>
              <?php for($i=0;$i<sizeof($datos);$i++){?>
                
              <tr>
                  <td><div align="center"><?php echo $datos[$i]['nombre']; ?></div></td>
                  <td><div align="center"><?php echo $datos[$i]['usuario']; ?></div></td>
                  <td><div align="center"><?php echo $datos[$i]['correo']; ?></div></td>
                  <td><div align="center"><?php echo $datos[$i]['nivel']; ?></div></td>
                  <td><div align="center"><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_usuarios.php?id_usuarios=<?php echo $datos[$i]["id_usuarios"];?>"><span class="" aria-hidden="true"></span> Editar</a>  <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_usuarios.php?id_usuarios=<?php echo $datos[$i]["id_usuarios"];?>"><span class="" aria-hidden="true"></span> Eliminar</a></div></td>
              </tr>
              <?php } ?> 
          </table>
  			</div><!--panel-body-->
		</div><!--panel panel-default-->
		
	</div><!--content-->

	<?php include '../../lib/script.php'; ?>
  <script>
 $(document).ready( function () {
    $('#usuarios').DataTable();
} );

</script>
</body>
</html>

