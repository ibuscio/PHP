<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Buscar Rubro</title>
<style type="text/css">
</style>
</head>

<body>
<form method="post"  onSubmit="return validacion(this)"  name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese un Rubro</strong> </p>
<blockquote> 
<table>
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
	</td>	
</tr>
<tr>
	<td>
		<input name="submit_nom" type="submit"  value="Buscar"><A HREF="Index.php""> Ir a Menú </A> 
	</td>
</tr>

</table>

 <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		if (isNaN(f.rubro.value)) {
			alert("Error:\nEste campo debe tener sólo números.");
			f.rubro.focus();
			return (false);
 			}
 			if (document.doc.rubro.value.length==0){
        		alert("Error:\nTiene que escribir un rubro")
        		document.doc.rubro.focus()
        		return false; 
      		}
      		      		
		}
      
  </SCRIPT>
  
</form>
<form method="post" enctype="application/x-www-form-urlencoded" >
	<table width="80%" border="1">
  		<!--encabezado de la tabla donde se muestran los datos-->
  		<tr bgcolor="#999999"> 
			<td  valign="top"><div align="center">Rubro</div></td>
			<td height="23" valign="top"><div align="center">Descripción</div></td>
			<td height="23" valign="top"><div align="center">Saldo</div></td>
  		</tr>
			<?php
			   //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
		   
			include_once("datos.php");
			$consulta = new consulta();
			$sql_saldo = $consulta-> datos("select a.rubro, b.descripcion, sum(a.saldo) as saldo  from saldos a, rubro b where a.rubro = '$_POST[rubro]' and a.rubro=b.rubro group by a.rubro");
			
			while ($row = mysql_fetch_array($sql_saldo, MYSQL_ASSOC)) {
				echo "<tr>\n";
				echo "<td align=center>" . $row['rubro'] ."</td>";
				echo "<td align=center>" . $row['descripcion'] . "</td>";
				echo "<td align=center>" . $row['saldo'] . "</td>";
				echo "</tr>\n";
			}
			?> 
			
</table>		
</form>

</body>
</html>




