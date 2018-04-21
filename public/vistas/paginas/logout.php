<?php

 require_once("../../../class/class_config.php");

   session_destroy();

   header("Location:".Conectar::ruta()."login.php");
?>