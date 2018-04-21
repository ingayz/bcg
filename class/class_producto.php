<?php

	class Productos extends Conectar
	{
		
		public function AgregarProductos()
		{
			$conectar = parent::conexion();
        	parent::set_names();
				
				$producto = $_POST["producto"];

				$sql = "INSERT INTO productos (producto) VALUES (:miproducto)";

				$resultado=$conectar->prepare($sql);

				$resultado->execute(array(":miproducto"=>$producto));

				header("Location:agregar_productos.php");

		}//Agregarproducto

		public function Listarproductos()
		{

			$conectar=parent::conexion();
    		parent::set_names();

    		$sql="select * from productos order by producto asc";

    		$sql=$conectar->prepare($sql);

    		$sql->execute();

    		return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

		}//Listarproducto

		public function get_producto_por_id($id_producto)
		{

         	$conectar=parent::conexion();
         	parent::set_names();

         	$sql="select * from productos where id_producto=?";

         	$sql=$conectar->prepare($sql);

         	$sql->bindValue(1,$id_producto);
         
         	$sql->execute();

         	return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      	}//get_producto_por_id

		public function EditarProductos()
		{
			$conectar=parent::conexion();
			parent::set_names();

			$id_producto = $_POST['id_producto'];
			$producto = $_POST['producto'];
			
			$sql="UPDATE productos SET producto=:miproducto WHERE id_producto=:miid_producto";

			$resultado=$conectar->prepare($sql);

			$resultado->execute(array(":miid_producto"=>$id_producto));

			$error = $resultado->errorInfo();

        	header("Location:".Conectar::ruta()."listado_productos.php");
        	exit();
		}//Editarproductos

		public function Eliminarproducto($id_producto)
      	{
      		$conectar=parent::conexion();
        	parent::set_names();

			$conectar->query("DELETE FROM productos WHERE id_producto='$id_producto'");

			header("Location:listado_productos.php");
      	
		  }//Eliminarproductos
		  

	}//Class productos

?>