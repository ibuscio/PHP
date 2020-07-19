<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 	
 	session_start();// se crea una seccion con los siguientes datos
	$usuario = $_SESSION['usuario'];
	
	
	//Los datos los voy a tener que ir a buscar a la tabla temporal, hay que controlar que el asiento cierre
	//primero verifico el importe de los debitos
	include("controles.php");
 	$control_imp = new controles();
 	$result_control_mov1 = $control_imp -> control_movimientos(1);
 	
 	
 	//primero verifico el importe de los creditos
 	
 	$control_imp = new controles();
 	$result_control_mov2 = $control_imp -> control_movimientos(2);	
 	//me devuelve cual es el ultimo movimiento a esto se le debe sumar uno para grabar
 	$NMov = new controles();
 	$NMovimiento = $NMov -> retorna_mov();
 	$auxmov = $NMovimiento; 
 	$NMovimiento = $NMovimiento + 1; 

 	if (($result_control_mov1 == $result_control_mov2)and ($result_control_mov1 <> 0) and ($result_control_mov2 <> 0)){
	 	$sql_mov = "";		
		include_once("datos.php");
		$consulta = new consulta();
		$sql_mov = $consulta-> datos("select * from movimientos where idmovimiento = '$auxmov' ");
		
		//leo dos veces para poder hacer los controles para que o se ingresen malos datos en la base
		while ($row = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
		
		 $rubro = $row['rubro'] ;
		 $fecha = $row['fecha'] ;
		 $moneda = $row['moneda'];
		 $debe = $row['credeb'];	
		 $importe = $row['importe'];
		 $sucursal = $row['ax5'];
		
			 if (($rubro <> 0) and ($fecha <> '0000-00-00') and ($moneda <> 0) and ($debe <> 0) and ($importe <> 0) and ($sucursal <> 0)){
			 		$errordatos = 0;		
			 }else{
			 	 	$errordatos = 1;
			 }
		}
		
		if ($errordatos == 0){
			$sql_mov = "";		
			include_once("datos.php");
			$consulta = new consulta();
			$sql_mov = $consulta-> datos("select * from movimientos where idmovimiento = '$auxmov' ");
			while ($row = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
			
			 $rubro = $row['rubro'] ;
			 $fecha = $row['fecha'] ;
			 $moneda = $row['moneda'];
			 $debe = $row['credeb'];	
			 $importe = $row['importe'];
			 $sucursal = $row['ax5'];
			 
			 //plan de cuentas
			 $activo = '';
			 if (($rubro>= 400) and ($rubro<= 500)){
			 	// es un rubro de entrada de caja
			 	$activo = 'S';
			 }
			 if (($rubro>= 500) and ($rubro<= 600)){
			 	// salida de caja
			 	$activo = 'N';
			 }  	
			 $escaja == 'NO';
			 if (($rubro>= 100) and ($rubro<= 200)){
			 	//es un rubro de caja
			 	$escaja == 'SI';
			 }	
							
			//	echo $activo;
		//		echo $escaja;		
			
			//ver si el ruro es caja o no
			    
			// 	$escajaaux = new controles();
			// 	$escaja = $escajaaux -> rubro_caja($rubro);
			 				 		
			 	include_once("Saldo.php");
			 	$saldo = new saldo();
			 	$saldo_importe = $saldo -> control($rubro,$sucursal);
			 	$saldo_importe1 = $saldo_importe['saldo'];
			 	
			 	if ($escaja == 'NO'){
				 	if ($debe == 1){
				 		//if ($importe <= $saldo_importe1){
				 			$total = 0;
				 			$total = $saldo_importe1 + $importe;  
						//	$debe = 1;	
				 		//}else{
				 	   	//	$error = 1;
				 	   	//	echo "Error: esta debitando mas de lo que tiene";
				 	    //     }		
					}else{
							$total = 0;
							$total = $saldo_importe1 - $importe;
							//$debe = 2;
					}
					//echo $saldo_importe1;
					/*if ($error == 0){
					 	if ($saldo_importe1 == 0){
					 		
						 	$nuevosaldo = new saldo();
						 	$newsaldo = $nuevosaldo -> insertsaldo($rubro, $sucursal, $fecha, $moneda, $total);
					 	
					 	}else{
						 	$modificarsaldo = new saldo();
						 	$updatsaldo = $modificarsaldo -> modificar($rubro, $sucursal, $total);
					 	}
					} */	 
			 	}else{
			 	
			 	if ($escaja = 'SI')
			 	{
			 		 if ($debe == 1){
				 		//if ($importe >= $saldo_importe1){
				 			//echo "Caja";
				 			
				 			// echo $saldo_importe1;
				 			// echo $importe;
				 			$total = 0; 
				 			$total = $saldo_importe1 + $importe;
				 			//echo $total;  
							//$debe = 1;	
				 		//}else{
				 	    //		$error = 2;
				 	   	//	echo "Error: esta acreditando un rubro de caja por mas de lo que tiene";
				 	    //     }		
					}else{
							$total = 0;
							$total = $saldo_importe1 - $importe;
							//$debe = 2;
					}
					//echo $saldo_importe1;
				/*	if ($error == 0){
					 	if ($saldo_importe1 == 0){
					 		
						 	$nuevosaldo = new saldo();
						 	$newsaldo = $nuevosaldo -> insertsaldo($rubro, $sucursal, $fecha, $moneda, $total);
					 	
					 	}else{
						 	$modificarsaldo = new saldo();
						 	$updatsaldo = $modificarsaldo -> modificar($rubro, $sucursal, $total);
					 	}
					}*/
					 
			 	}
			 	
			 	}
			 	if ($error == 0){
			 			
					 	if ($saldo_importe1 == 0){
					 			
						 	$nuevosaldo = new saldo();
						 	$newsaldo = $nuevosaldo -> insertsaldo($rubro, $sucursal, $fecha, $moneda, $total);
					 	
					 	}else{
						 	$modificarsaldo = new saldo();
						 	$updatsaldo = $modificarsaldo -> modificar($rubro, $sucursal, $total);
					 	}
					}
			 		 	
			 	if ($importe <> 0){
			 		
				    include_once("datos.php"); 
				 	$consulta = new consulta();
				    $dat = $consulta-> datos("update `movimientos` set `contabilizado` = 'S' where `idmovimiento` = '$auxmov' ");
				    $NuevoMov = new controles();
			 	    $nuevoid = $NuevoMov -> inserta_mov($NMovimiento);
			 	    
			 	    //voy a agregar el motivo de movimiento
			 	    $insert_mot = new saldo();
			 	    $motivo = $_POST['motivos'];
			 	    $nuevo_mot = $insert_mot -> insert_motivo($auxmov ,$motivo) ;
			 	     	 
			 	    
			 	//cada vez que se confirma el movimiento recupero el ultimo e inserto el siguiente
			 	   //echo $auxmov;		                                  
			 	}	                                   		
			
		  } //del do while
	     	
			echo"<script language='JavaScript'>window.self.location='Movimientos.php"."'</script>";
			
	  	  }else{
	  	  	echo "Hay errores de datos en los movimientos por favor revisar";	
	  	  
	  	  } //del if
  	  
  	  }
	  else{
	  	echo "El asiento no balancea";
	  }
 	  
 ?>  
       