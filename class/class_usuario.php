<?php

	class Usuarios extends Conectar
	{
		
		public function login()
		{
			$conectar = parent::conexion();
			parent::set_names();

			try
			{
				$sql="SELECT * FROM usuarios WHERE usuario = :user AND password = :password";
					$resultado = $conectar->prepare($sql);
					$login = htmlentities(addslashes($_POST["txtuser"]));
					$password = htmlentities(addslashes($_POST["txtpassword"]));
					$resultado->bindValue(":user", $login);
					$resultado->bindValue(":password", $password);
					$resultado->execute();
					$numeroregistro = $resultado->rowCount();
					if($numeroregistro != 0)
					{
						session_start();
						$_SESSION["usuario"] = $_POST["txtuser"];
						$sql="SELECT nivel FROM usuarios WHERE usuario = '$login'";
						foreach ($conectar->query($sql) as $row) {
						$nivel = $row['nivel'];
						}//Cierre
						$_SESSION['nivel'] = $nivel; 
						header("Location:home.php");
					}else{
						header("Location:login.php"); 
					}//else
			}catch (Exception $e){
				die("Error: ". $e->getMessage());
			}//catch
		
		}// function login

		public function AgregarUsuario()
		{
			$conectar = parent::conexion();
        	parent::set_names();

				$nombre = $_POST["nombre"];
				$usuario = $_POST["usuario"];
				$password = $_POST["password"];
				$nivel = $_POST["nivel"];
				$correo = $_POST["correo"];

				$sql = "INSERT INTO usuarios (nombre, usuario, password, nivel, correo) VALUES (:minombre, :miusuario, :mipassword, :minivel, :micorreo)";

				$resultado=$conectar->prepare($sql);

				$resultado->execute(array(":minombre"=>$nombre, ":miusuario"=>$usuario, ":mipassword"=>$password, ":minivel"=>$nivel, ":micorreo"=>$correo));

				header("Location:agregar_usuarios.php");

		}//AgregarUsuario

		public function ListarUsuario()
		{

			$conectar=parent::conexion();
    		parent::set_names();

    		$sql="select * from usuarios order by nombre asc";

    		$sql=$conectar->prepare($sql);

    		$sql->execute();

    		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}//ListarUsuario

		public function get_usuario_por_id($id_usuarios)
		{

         	$conectar=parent::conexion();
         	parent::set_names();

         	$sql="select * from usuarios where id_usuarios=?";

         	$sql=$conectar->prepare($sql);

         	$sql->bindValue(1,$id_usuarios);
         
         	$sql->execute();

         	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      	}//get_usuario_por_id

		public function EditarUsuario()
		{

        	$conectar=parent::conexion();
        	parent::set_names();

          	$id_usuarios = $_POST['id_usuarios'];
			$nombre = $_POST["nombre"];
			$password = $_POST["password"];
			$usuario = $_POST["usuario"];
			$correo =  $_POST["correo"];
			$nivel = $_POST["nivel"];

			$sql="UPDATE usuarios SET nombre=:minombre, password=:mipassword, usuario=:miusuario, correo=:micorreo, nivel=:minivel WHERE id_usuarios=:miid_usuarios";

			$resultado=$conectar->prepare($sql);

			$resultado->execute(array(":miid_usuarios"=>$id_usuarios, ":minombre"=>$nombre, ":mipassword"=>$password, ":miusuario"=>$usuario, ":micorreo"=>$correo, ":minivel"=>$nivel));

			$error = $resultado->errorInfo();

        	header("Location:".Conectar::ruta()."listado_usuarios.php");
        	exit();

      	}//EditarUsuario

      	public function EliminarUsuario($id_usuarios)
      	{
      		$conectar=parent::conexion();
        	parent::set_names();

			$conectar->query("DELETE FROM usuarios WHERE id_usuarios='$id_usuarios'");

			header("Location:listado_usuarios.php");
      	
      	}//EliminarUsuario


	}//Class

?>