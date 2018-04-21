<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_cliente.php");

      $usuario=new Clientes();

      $usuario->EliminarCliente($_GET["id_cliente"]);

      header("Location:".Conectar::ruta()."listado_clientes.php");
      exit(); 
   
?>