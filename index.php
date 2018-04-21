<?php

require_once("class/class_config.php");

$ingreso = new Conectar();

$ingreso->ruta();

header("Location:".Conectar::ruta()."login.php");

exit();



?>

