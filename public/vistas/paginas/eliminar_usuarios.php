<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_usuario.php");

      $usuario=new Usuarios();

      $usuario->EliminarUsuario($_GET["id_usuarios"]);

      header("Location:".Conectar::ruta()."listado_usuarios.php");
      exit(); 
   
?>