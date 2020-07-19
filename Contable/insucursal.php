
<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
   $sucursal   = $_POST["sucursal"];
   $localidad   = $_POST["localidad"];
   include("datos.php");
  
   $consulta = new consulta();
   $dat = $consulta-> datos("INSERT INTO `sucursal` (`sucursal`, `descripcion`, `ax1`, `ax2`, `ax3`) " .
   		"VALUES ( '$sucursal', '$localidad', '0', '0', '0');");
    echo"<script language='JavaScript'>window.self.location='ASucursal.php"."'</script>";
 ?>  
       