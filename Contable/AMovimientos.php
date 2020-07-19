<html></title>
<body>
<form method="get"  onSubmit="return validacion(f)"  name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Listados de Movimientos</strong> </p>
<blockquote>
 
<table width="80%" height="30"  border="1">
 <!--tabla que contiene los datos para buscar por nombre y apellido-->

 <table align center> 
 <tr>
 
<td>Reporte  
    <select name='tipo'>
    	<option>SELECCIONE </option>
	    <option>POR_FECHA </option>
	    <option>MOVIMIENTOS_RUBRO</option>
	    <option>ANULADOS_RUBRO</option>
	    <option>ANULADOS_RUBRO_FECHA</option>
	    <option>SALDOS_RUBRO</option>
	    <option>SALDOS</option>
	</select>
</td> 
</tr>
  <tr>
    <td height="10" valign="top">Rubro
  <?PHP
    echo "<select name='rubro'>";
	include_once("datos.php");
    $consulta = new consulta();
    $dat = $consulta-> datos("select * from rubro");
	while ($fila = mysql_fetch_array($dat))
	{
	echo "<option value=".$fila["rubro"].">".$fila["descripcion"]."/".$fila["rubro"]."</option>";  
	}
    echo "</select>"
?> 
</td>
<td>
   Desde<input name="desde" type="date" size="10" maxlength="10"/> Ej: aaaammdd
</td>
<td>
   Hasta<input name="hasta" type="date" size="10" maxlength="10"/>Ej: aaaammdd
</td>
</tr> 
 <tr>
 <td>
  <input name="btnconsulta1" type="submit"  value="Aceptar"><A HREF="Index.php"> Ir a Men� </A>
  </td>
 </tr>     
</table>
</from>
<form action="link" method="post" onSubmit="return validacion(this)" enctype="text/plain">         
  <!--<table width="80%" border="1">
  encabezado de la tabla donde se muestran los datos
  <tr bgcolor="#999999"> 
  	<td height="23" valign="top"><div align="center">Rubro</div></td>
    <td height="23" valign="top"><div align="center">Moneda</div></td>
    <td height="23" valign="top"><div align="center">Fecha</div></td>
    <td height="23" valign="top"><div align="center">Sucursal</div></td>
    <td height="23" valign="top"><div align="center">Debe/Credito</div></td>
    <td height="23" valign="top"><div align="center">Importe</div></td>

  </tr>-->
  <?php
  
  	
  	 
  	 if ($_GET['tipo'] <> 'SELECCIONE'){
	  	 //include_once("datos.php");
		 //$consulta = new consulta();
		 $aux_saldo = 'N';
		if (($_GET['tipo'] == 'SALDOS') or ($_GET['tipo'] == 'SALDOS_RUBRO')){
		 	$aux_saldo = 'S';
		}
		
		include_once("MovReporte.php");
  		$reporte = new reporte();
  		$tipo = $_GET['tipo'];
  	    $aux_sql = $reporte ->resuelve_reporte($_GET['tipo'], $_GET['rubro'], $_GET['desde'], $_GET['hasta'] );
  	    	    
		$fecha = getdate();
	    $scarpeta="C:/Movimientos"; //carpeta donde guardar el archivo.
			//debe tener permisos 775 por lo menos
		$sfile=$scarpeta."/excel.'$fecha[year]'.'$fecha[mon]'.'$fecha[mday]'.'$_GET[tipo]' .xls"; //ra del archivo a generar
		$fp = fopen($sfile,"w");
		$shtml="<table>";
        $shtml=$shtml."<tr>\n";
           
        if ($aux_saldo == 'N'){
        
        $shtml=$shtml."<td align=center>" . Rubro . "</td>";
        $shtml=$shtml."<td align=center>" . Descripcion . "</td>";
		$shtml=$shtml."<td align=center>" . Moneda . "</td>";
		$shtml=$shtml."<td align=center>" . Fecha . "</td>";
		$shtml=$shtml."<td align=center>" . Sucursal . "</td>";
		$shtml=$shtml."<td align=center>" . DebitoCredito . "</td>";
		$shtml=$shtml."<td align=center>" . Importe . "</td>";
		$shtml=$shtml."<td align=center>" . FechaAnulado . "</td>";
		$shtml=$shtml."<td align=center>" . Motivo . "</td>";
		$shtml=$shtml."</tr>";
        }else{
        	if ($aux_saldo == 'S'){
        		$shtml=$shtml."<td align=center>" . Rubro . "</td>";
        		$shtml=$shtml."<td align=center>" . Descripcion . "</td>";
				$shtml=$shtml."<td align=center>" . Moneda . "</td>";
				$shtml=$shtml."<td align=center>" . Saldo . "</td>";
				$shtml=$shtml."</tr>";
        	}
        }
		fwrite($fp,$shtml);
		if 	($aux_sql <> ''){
			while ($row = mysql_fetch_array($aux_sql)) {
		    $shtml="<table>";
	        $shtml=$shtml."<tr>\n";
	        
	        if ($aux_saldo == 'S'){
	        	
	        $shtml=$shtml."<td align=center>" . $row['rubro'] . "</td>";
	        $shtml=$shtml."<td align=center>" . $row['descripcion'] . "</td>";
			$shtml=$shtml."<td align=center>" . $row['moneda'] . "</td>";
			$shtml=$shtml."<td align=center>" . $row['saldo'] . "</td>";
	        }else{
	        	if ($aux_saldo == 'N'){
	        		 
	        		$shtml=$shtml."<td align=center>" . $row['rubro'] . "</td>";
	        		$shtml=$shtml."<td align=center>" . $row['descripcion'] . "</td>";
					$shtml=$shtml."<td align=center>" . $row['moneda'] . "</td>";
					$shtml=$shtml."<td align=center>" . $row['fecha'] . "</td>";
					$shtml=$shtml."<td align=center>" . $row['ax5'] . "</td>";
					$shtml=$shtml."<td align=center>" . $row['credeb'] . "</td>";
					//entradas de plata
					if(($row['rubro']>399) and ($row['rubro']<499)){
						
						if ($row['credeb'] == 2){
							
							$importe = $row['importe'] * (-1);
						}else{ 
							$importe = $row['importe'] ;
							}
							
					}
					if(($row['rubro']>100) and ($row['rubro']<200)){
						
						if ($row['credeb'] == 1){
							//enra plata a la caja es positivo
							$importe = $row['importe'];
						}else{ 
							//sale plata
							$importe = $row['importe'] * (-1) ;
							}
							
					}
					
					
					if ($row['rubro']>499){
						if ($row['credeb'] == 1){
							$importe = $row['importe'] ;
							
						}else{
							$importe = $row['importe'] * (-1);
							}
					}		
					$shtml=$shtml."<td align=center>" . $importe . "</td>";
					
					$shtml=$shtml."<td align=center>" . $row['ax4'] . "</td>";
					if($row['rubro']>399){
						$shtml=$shtml."<td align=center>" . $row['motivo'] . "</td>";
	        		}
	        	}	
	        }
	        
			$shtml=$shtml."</tr>";
		    fwrite($fp,$shtml);			    
			}
		}	
		fclose($fp);
 }
	?>
</table>
</form>
</body>
</html>



  
       


  
       