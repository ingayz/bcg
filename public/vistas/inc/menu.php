<!--Menu-->
<style>

  div#bs-example-navbar-collapse-1 {
    background: #005a92;
  }

  .navbar .nav a {
    font-size: 14px;
    color: #005a92;
}

.navbar-default .navbar-nav > li > a {
    color: #fff;
}

</style>
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li><a href="home.php">Home </a></li>
        
        <li><a href="<?php echo Conectar::ruta();?>listado_clientes.php">Clientes</a></li>

        <li><a href="#">Facturación</a></li>

        <li><a href="#">Cobranzas</a></li>

        <li><a href="<?php echo Conectar::ruta();?>listado_usuarios.php">Usuarios</a></li>

        <li><a href="<?php echo Conectar::ruta();?>listado_Productos.php">Productos</a></li>

      </ul>
        
      <!--form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienveido <?php echo $_SESSION["usuario"];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Cambiar Password</a></li>
            <li><a href="<?php echo Conectar::ruta();?>logout.php"">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>