<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * 
 */
 
 class saldoAnul{
 	 Public $rubro, $sucursal;   
 	 
     function cerrar(){
     
      mysql_close($link);
     }
     function AnulMov($rubro, $sucursal, $fecha, $moneda, $saldo){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
   	 $dat = $consulta-> datos("INSERT INTO `saldos` (`rubro`, `sucursal`, `fecha`, `moneda`, `saldo`) " .
   		                                  "VALUES ( '$rubro', '$sucursal', '$fecha', '1', '$saldo');" ); 	 
	
	 }
	 function modificarMov($idmov, $fecha){
	 	
	 include_once("datos.php");
	 $consulta = new consulta();
	 echo $rubro, $sucursal, $saldo;
   	 $dat = $consulta-> datos("update `movimientos` set ax4 ='$fecha' where idmovimiento = '$idmov' ");
	 

	 }
	 
 }
?>

