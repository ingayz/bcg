<?php

  session_start();

   class Conectar
   {

   	   protected $dbh;

   	   protected function conexion()
   	   {

   	   	$conectar= $this->dbh= new PDO("mysql:local=localhost; dbname=bcg","root","");
   	    return $conectar;
   	   }

   	   public function set_names()
   	   {

   	   	 return $this->dbh->query("SET NAMES 'utf8'");
   	   }

   	  
   	  public function ruta()
   	  {

   	  	return "http://localhost/bcg/public/vistas/paginas/";
   	  }


   	}
?>