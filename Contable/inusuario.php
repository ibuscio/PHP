
<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
   $documento  = $_POST["documento"];
   $nombre   = $_POST["nombre"];
   $apellido   = $_POST["apellido"];
   $usuario   = $_POST["usuario"];
   $contrasena   = $_POST["contrase�a"];
   $sucursal   = $_POST["sucursal"];
   $direccion   = $_POST["direccion"];
   $mail   = $_POST["mail"];
   $telefono   = $_POST["telefono"];
   $celular   = $_POST["celular"];
  /* echo $documento;
   echo $nombre;
   echo $apellido;
   echo $usuario;
   echo $contrase�a;
   echo $sucursal;
   echo $direccion;
   echo $mail;
   echo $telefono;
   echo $celular;*/
   
   include("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("INSERT INTO `usuario` (`documento`, `nombre`, `apellido`, `usuario`, `contrase�a`,`sucursal`, `direccion`, `mail`, `telefono`, `celular`) " .
   		                                  "VALUES ( '$documento', '$nombre', '$apellido', '$usuario', '$contrase�a', '$sucursal', '$direccion', '$mail', '$telefono', '$celular');");
   echo"<script language='JavaScript'>window.self.location='AUsuario.php"."'</script>";
 ?>  
       