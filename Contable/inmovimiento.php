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
 	
 	//me devuelve cual es el ultimo movimiento
 	include_once("controles.php");
 	$NMov = new controles();
 	$NMovimiento = $NMov -> retorna_mov();
 	echo $NMovimiento;
 	
 	include_once("Saldo.php");
 	$saldo = new saldo();
 	$saldo_importe = $saldo -> control($rubro,$sucursal['sucursal']);
 	$saldo_importe1 = $saldo_importe['saldo'];
 	//echo $saldo_importe1;
 	//echo $_GET['debe'];
 	
 	If ($debe == 1){
 		If ($importe <= $saldo_importe1){
 			$total = $saldo_importe1 - $importe;  
			$debe = 1;	
 		}Else{
 	   		$debe = 0;
 	   		echo "Error: esta debitando mas de lo que tiene";
 	         }		
	}Else{
			$total = $saldo_importe1 + $importe;
			$debe = 2;
	}
	//echo $saldo_importe1;
 	If ($saldo_importe1 == 0){
 		
	 	$nuevosaldo = new saldo();
	 	$newsaldo = $nuevosaldo -> insertsaldo($rubro, $sucursal['sucursal'], $fecha, $moneda, $total);
 	
 	}Else{
	 	$modificarsaldo = new saldo();
	 	$updatsaldo = $modificarsaldo -> modificar($rubro, $sucursal['sucursal'], $total);
 	} 
 	
 	If ($importe <> 0){
 		If ($debe == 1){
 			$importe = $importe * (-1);
 		}
	 	include_once("datos.php"); 
	 	$consulta = new consulta();
	 //	echo $usuario;
	    $dat = $consulta-> datos("INSERT INTO `movimientos` (`idmovimiento`, `rubro`, `moneda`, `credeb`, `fecha`, `usuario`, `importe`, `ax2`) " .
	   		                                  "VALUES ( '$NMovimiento','$rubro', '1', '$debe', '$fecha', '$usuario' , $importe, $sucursal[sucursal]);");
	   		                                  
 	}	                                  
  		echo"<script language='JavaScript'>window.self.location='Movimientos.php"."'</script>";
  
 ?>  
       