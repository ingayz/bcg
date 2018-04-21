<?php

	class Clientes extends Conectar
	{
		
		public function AgregarCliente()
		{
			$conectar = parent::conexion();
        	parent::set_names();
				
				$cliente = $_POST["cliente"];
				$unidad = $_POST["unidad"];
				$contacto = $_POST["contacto"];
				$telefono = $_POST["telefono"];
				$correo = $_POST["correo"];

				$sql = "INSERT INTO clientes (cliente, unidad, contacto, telefono, correo) VALUES (:micliente, :miunidad, :micontacto, :mitelefono, :micorreo)";

				$resultado=$conectar->prepare($sql);

				$resultado->execute(array(":micliente"=>$cliente, ":miunidad"=>$unidad, ":micontacto"=>$contacto, ":mitelefono"=>$telefono, ":micorreo"=>$correo));

				header("Location:agregar_clientes.php");

		}//AgregarCliente

		public function ListarClientes()
		{

			$conectar=parent::conexion();
    		parent::set_names();

    		$sql="select * from clientes order by cliente asc";

    		$sql=$conectar->prepare($sql);

    		$sql->execute();

    		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}//ListarCliente

		public function get_cliente_por_id($id_cliente)
		{

         	$conectar=parent::conexion();
         	parent::set_names();

         	$sql="select * from clientes where id_cliente=?";

         	$sql=$conectar->prepare($sql);

         	$sql->bindValue(1,$id_cliente);
         
         	$sql->execute();

         	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      	}//get_cliente_por_id

		public function EditarClientes()
		{
			$conectar=parent::conexion();
			parent::set_names();

			$id_cliente = $_POST['id_cliente'];
			$cliente = $_POST['cliente'];
			$unidad = $_POST['unidad'];
			$contacto = $_POST['contacto'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];

			$sql="UPDATE clientes SET cliente=:micliente, unidad=:miunidad, contacto=:micontacto, correo=:micorreo, telefono=:mitelefono WHERE id_cliente=:miid_cliente";

			$resultado=$conectar->prepare($sql);

			$resultado->execute(array(":miid_cliente"=>$id_cliente, ":miunidad"=>$unidad, ":micontacto"=>$contacto, ":micorreo"=>$correo, ":mitelefono"=>$telefono, "micliente"=>$cliente));

			$error = $resultado->errorInfo();

        	header("Location:".Conectar::ruta()."listado_clientes.php");
        	exit();
		}//EditarClientes

		public function EliminarCliente($id_cliente)
      	{
      		$conectar=parent::conexion();
        	parent::set_names();

			$conectar->query("DELETE FROM clientes WHERE id_cliente='$id_cliente'");

			header("Location:listado_clientes.php");
      	
		  }//EliminarClientes
		  

	}//Class Clientes

?>