<?php

require_once("../../../class/class_config.php");

require_once("../../../class/class_usuario.php");

$usuario = new Usuarios();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $usuario->login();
    

    exit();
 }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!--link rel="stylesheet" href="login.css"-->
    <?php require_once("../../lib/link.php"); ?>
  </head>
  <body>
    <div class="contenedor">
      <header>
        <h1 class="title">Sistema de Control Administrativo</h1>
        <a href="registro.html">Registrate</a>
      </header>
      <div class="login">
        <article class="fondo">
          <img src="../../img/logos/logo-bcg-transp.png" alt="User">
          <h3>Inicio de Sesión</h3>
          <form class="" action="" method="post">
            <span class="icon-user"></span><input class="inp" type="text" name="txtuser" value=""><br>
            <span class="icon-key"></span><input class="inp" type="password" name="txtpassword" value=""><br>
            <a href="" class="he">He olvidado mi contraseña</a>
            <input type="hidden" name="grabar" value="si">
            <input class="boton" type="submit" name="inicio" value="Iniciar Sesión">
          </form>
        </article>
      </div>
    </div>
  </body>
</html>
