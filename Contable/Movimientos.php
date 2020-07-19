<?PHP
session_start();// se crea una seccion con los siguientes datos
$usuario = $_SESSION['usuario'];
//echo $usuario;
?>
<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta de Movimientos</title>
<style type="text/css">
<!--
.Titulo_pagina {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.Estilo2 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {font-size: 14px}
-->
</style>
</head>
<body>
<form method="get"  onSubmit="return validacion(this)" Action="movTemp.php" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese Movimientos</strong> </p>
<blockquote>
<table width="50%" height="30"  border="0">
 <!--tabla que contiene los datos para buscar por nombre y apellido--> 
 <tr>
    <td height="10" valign="top">Rubro
  <?PHP
    echo "<select name='rubro'>";
	include("datos.php");
    $consulta = new consulta();
    $dat = $consulta-> datos("select * from rubro");
	while ($fila = mysql_fetch_array($dat))
	{
	echo "<option value=".$fila["rubro"].">".$fila["descripcion"]."/".$fila["rubro"]."</option>";  
	}
    echo "</select>"
?> 
</td>
    <td>Debe/Haber  
	    <select name='debe'>
	    	<option>Seleccione </option>
		    <option>1 </option>
		    <option>2 </option>
		</select>
    </td>
</tr>
<tr>
<tr></tr><tr></tr>
  <td>
  Fecha <input name="fecha" type="text" />Ej:20100131  
  </td>  
  <td>Importe<input name="importe" type="int"/></td
</tr>
</table> <br/>

<p align="center"> 
<input name="submit_nom" type="submit"  value="Agregar Movimiento"> </p>     
<SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		
 			if (document.doc.fecha.value.length==0){
        		alert("Error:\nTiene que escribir una fecha")
        		document.doc.nombre.focus()
        		return false; 
      		}    
 			if (document.doc.importe.value.length==0){
        		alert("Error:\nTiene que escribir un importe")
        		document.doc.apellido.focus()
        		return false; 
      		}	
		}
		
}
			
</SCRIPT>
<table width="80%" border="1">
  <!--encabezado de la tabla donde se muestran los datos-->
  <tr bgcolor="#999999"> 
    <td height="23" valign="top"><div align="center">Id Movimiento</div></td>
    <td height="23" valign="top"><div align="center">Moneda</div></td>
    <td height="23" valign="top"><div align="center">Fecha</div></td>
    <td height="23" valign="top"><div align="center">Rubro</div></td>
    <td height="23" valign="top"><div align="center">Debe/Haber</div></td>
    <td height="23" valign="top"><div align="center">Importe</div></td>

  </tr>
  <?php

   //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
    include_once("controles.php");
 	$NMov = new controles();
 	$NMovimiento = $NMov -> retorna_mov();
 	
 	echo $NMovimiento;
    $sql_mov = "";		
	include_once("datos.php");
	$consulta = new consulta();
	$sql_mov = $consulta-> datos("select * from movimientos a, moneda b, sucursal c, rubro d where  a.moneda=b.moneda and a.ax5 = c.sucursal and a.credeb<>0 and a.rubro=d.rubro and a.idmovimiento='$NMovimiento' order by fecha asc");
	while ($row = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
		echo "<tr>\n";
		echo "<td align=center><a href=ELMovimiento.php?&rubro=$row[rubro]&movimiento=$row[idmovimiento]>" . $row['idmovimiento'] ."</a>", "</td>";	
		echo "<td align=center>" . $row['signo'] . "</td>";
		echo "<td align=center>" . $row['fecha'] . "</td>";
		echo "<td align=center>" . $row['descripcion'] . "</td>";
		echo "<td align=center>" . $row['credeb'] . "</td>";	
		echo "<td align=center>" . $row['importe'] . "</td>";
	}
	//echo "<td align=center><a href=EMoneda.php?&moneda=$row[moneda]&descripcion=$row[descripcion]&signo=$row[signo]>" . $row['signo'] ."</a>", "</td>";
	echo "</tr>\n";
	?>
</table>
</form>
<form method="post"  onSubmit="return validacion(this)" Action="inmovitemp.php" name="formulario" enctype="application/x-www-form-urlencoded">
<p align="center"> 
<table>
	<tr>
		<td>
			Ingrese el motivo del movimiento
		</td>
		<td>
			<textarea class="form_tfield" cols="50" rows="5" type="text" name="motivos" value=""></textarea>
		</td>
	</tr>
</table>
<br>
<input name="submit_nom" type="submit"  value="Cofirmar Asiento"><A HREF="Index.php"> Ir a Menú </A> </p>


</form>

</body>
</html>



