<?php
/*
 * Created on 16/01/2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class reporte{
 	   
 	 
	 function resuelve_reporte($tipo, $rubro, $desde,$hasta){
	 	
	 	include_once("datos.php");
		$consulta = new consulta();
	 	if ($tipo == 'POR_FECHA'){
		 	$sql_mov = $consulta-> datos("select * from `movimientos` a LEFT JOIN `rubro` b ON  a.rubro=b.rubro LEFT JOIN `motivosmov` c ON a.idmovimiento=c.idmovimiento  where a.fecha>= $desde and a.fecha<= $hasta  and a.contabilizado ='S'" );
		 	
		 	return $sql_mov; 	 
		 }	
		 if ($tipo == 'MOVIMIENTOS_RUBRO'){
		 	//echo $rubro;
		 	$sql_mov = $consulta-> datos("select * from `movimientos` a LEFT JOIN `rubro` b  ON a.rubro=b.rubro LEFT JOIN `motivosmov` c  ON a.idmovimiento=c.idmovimiento  where a.rubro = $rubro and a.contabilizado ='S' " );
		 								
		 	return $sql_mov; 	 
		 }
		 if ($tipo == 'ANULADOS_RUBRO'){
		 	$sql_mov = $consulta-> datos("select * from `movimientos` a, `rubro` b where a.rubro = $rubro  and a.contabilizado ='A' and a.rubro=b.rubro " );
		 	return $sql_mov; 	 
		 }
		 if ($tipo == 'ANULADOS_RUBRO_FECHA'){
		 	$sql_mov = $consulta-> datos("select * from `movimientos` a, `rubro` b where a.ax4>= $desde and a.ax4<= $hasta  and a.contabilizado ='A' and a.rubro=b.rubro" );
		 	return $sql_mov; 	 
		 }	  
		 if ($tipo == 'SALDOS_RUBRO'){
		 	
		 	$sql_mov = $consulta-> datos("select * from `saldos` a, `rubro` b where  a.rubro = $rubro and a.rubro=b.rubro" );
		 	return $sql_mov; 	 
		 }
		 if ($tipo == 'SALDOS'){
		 	
		 	$sql_mov = $consulta-> datos("select * from `saldos` a, `rubro` b where a.rubro=b.rubro " );
		 	return $sql_mov; 	 
		 }
		 
	 }
	 
 }
?>
