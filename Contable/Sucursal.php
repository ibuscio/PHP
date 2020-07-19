<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * 
 */
 
 class sucursal{
 	 Public $sucursal, $usuario;   
 	 
	 function devuelve($usuario){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("select sucursal from `usuario` where usuario = '$usuario'" ); 	 
	 $row = mysql_fetch_array($dat);
	 
	 return $row;

	 }
	 	 
     function cerrar(){
     
      mysql_close($link);
     }
 }
?>

