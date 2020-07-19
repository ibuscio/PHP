
<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
   $moneda  = $_POST["moneda"];
   $descripcion   = $_POST["descripcion"];
   $signo  = $_POST["signo"];
   
  
   
   include("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("INSERT INTO `moneda` (`moneda`, `descripcion`, `signo`, `ax1`, `ax2`) " .
   		                                  "VALUES ( '$moneda', '$descripcion', '$signo', '', '');");
   echo"<script language='JavaScript'>window.self.location='AMoneda.php"."'</script>";
 ?>  
       