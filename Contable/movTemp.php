<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	
 	session_start();// se crea una seccion con los siguientes datos
	$usuario = $_SESSION['usuario'];
	$rubro = $_GET['rubro'];
	$fecha = $_GET['fecha'];
	$importe = $_GET['importe'];
	$debe = $_GET['debe'];
 	include_once("Sucursal.php");
 	$suc = new sucursal();
 	$sucursal = $suc-> devuelve($usuario);
 	/*el valor me lo devuelve esta variable $sucursal[sucursal]*/
 	//echo $sucursal['sucursal'];
 	include_once("controles.php");
 	$NMov = new controles();
 	$NMovimiento = $NMov -> retorna_mov();
 	echo $NMovimiento;
 	 	
 	if (($importe <> 0) and ($debe <> 0) and ($rubro <> 0) ){
 		echo "nacho2";
	 	include_once("datos.php"); 
	 	$consulta = new consulta();
	 	echo $usuario;
	 	echo $NMovimiento;
	 	echo $rubro;
	 	echo $debe;
	 	echo $fecha;
	 	echo $importe;
	    $dat = $consulta-> datos("INSERT INTO `movimientos` (`idmovimiento`, `rubro`, `moneda`, `credeb`, `fecha`, `usuario`, `importe`, `ax5`,`contabilizado` ) " .
	   		                                  "VALUES ( '$NMovimiento','$rubro', '1', '$debe', '$fecha', '$usuario' , '$importe', '$sucursal[sucursal]', 'E');");
	    
	     echo"<script language='JavaScript'>window.self.location='Movimientos.php?"."'</script>";
 	}else{
		
	   echo "El Movimiento no se dio de alta el Importe o  Debe/Haber o Rubro vino en cero";
	}   		                                  
 		                                  
 	
  
 ?>  
       