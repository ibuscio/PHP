<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	//session_start();// se crea una seccion con los siguientes datos

	$idmov = $_GET['idmov'];
 	
 	$sql_mov = "";		
	include_once("datos.php");
	$consulta = new consulta();
	$sql_mov = $consulta-> datos("select * from movimientos where idmovimiento = '$idmov' ");
	
	while ($row = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
		$rubro = $row['rubro'] ;
	 	$fecha = $row['fecha'] ;
	 	$moneda = $row['moneda'];
	 	$debe = $row['credeb'];	
	 	$importe = $row['importe'];
	 	$sucursal = $row['ax5'];
	 	 		
		//obtengo el saldo actual des rubro antes de actualizarlo
		include_once("Saldo.php");
		$actmov = new saldo();
		$saldo_importe = $actmov -> control($rubro,$sucursal);
	 	$saldo_importe1 = $saldo_importe['saldo']; //saldo del rubro y sucursal que estamos manejando
		echo $saldo_importe1;
		
		//veo si el rubro es caja o no 
		include_once("controles.php");
		$escajaaux = new controles();
 		$escaja = $escajaaux -> rubro_caja($rubro);
 		echo $escaja;
		if ($escaja == 'SI')
		{
		 	if ($debe == 1){
		 		//si un debito lo que estoy anulando debo sumar el importe al saldo actual
		 		$saldo_importe1 = $saldo_importe1 -	$importe;
		 		$nuevo_saldo = $actmov -> modificar($rubro, $sucursal, $saldo_importe1);
			}else{
				//si es un credito lo que estoy anulando resto el importe del movimiento
			    $saldo_importe1 = $saldo_importe1 + $importe;
			    
		 		$nuevo_saldo = $actmov -> modificar($rubro, $sucursal, $saldo_importe1);
			}
			echo $saldo_importe1;
		}
		else{
			if ($escaja == 'NO'){
			
			if ($debe == 1){
		 		//si un debito lo que estoy anulando debo sumar el importe al saldo actual
		 		$saldo_importe1 = $saldo_importe1 -	$importe;
		 		$nuevo_saldo = $actmov -> modificar($rubro, $sucursal, $saldo_importe1);
			}else{
				//si es un credito lo que estoy anulando resto el importe del movimiento
			    $saldo_importe1 = $saldo_importe1 + $importe;
			    
		 		$nuevo_saldo = $actmov -> modificar($rubro, $sucursal, $saldo_importe1);
			}
			
			}
		
		}
	}//del do while
		include_once("Saldo.php");
		$actmov = new Saldo();
		$hoy = date("Y-m-d"); //Vemos que fecha es HOY
		$actmovAux = $actmov -> ModificarMov($idmov, $hoy);
	    echo"<script language='JavaScript'>window.self.location='AnulMovimientos.php"."'</script>";
 ?>  
       