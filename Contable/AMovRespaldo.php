
<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Administración de Movimientos</title>
<style type="text/css">

Titulo_pagina {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
Estilo2 {
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}
Estilo3 {font-size: 14px}

</style>
</head>

<body>
<form method="post"  onSubmit="return validacion(f)"  name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Administración de movimientos</strong> </p>
<blockquote>
 
<table width="80%" height="30"  border="1">
 <!--tabla que contiene los datos para buscar por nombre y apellido-->

 <tr bgcolor="#999666">
 	<td>Rubro
    <?PHP
	   echo "<input name='rubro' readonly='true' value=".$rubro.">"."</input>";  
      ?>
    </td>
    <td height="10" valign="top">Descripción
     <?PHP
	   echo "<input name='descripcion' readonly='true' value=".$descripcion.">"."</input>"; 
      ?>
    </td>
    
    <td>Saldo
    <?PHP
	   echo "<input name='saldo' readonly='true' value=".$saldo.">"."</input>";  
      ?>
    </td>
   
 </tr>        
</tr></table>
<table align center>  
 <tr>
   <td>
   Desde<input name="desde" type="date" size="10" maxlength="10"/> Ej: aaaammdd
  </td>
  <td>
   Hasta<input name="hasta" type="date" size="10" maxlength="10"/>Ej: aaaammdd
  </td>
  <td>
  <input name="btnconsulta1" type="submit"  value="Por Fecha">
  </td>
  <td>
  <input name="btnconsulta2" type="submit"  value="25 Ultimos">
  </td>
 </tr>  
 <tr>
 </tr>     
 <tr>
 <td>
 	<A HREF="Index.php""> Ir a Menú </A> 
 </td>
 </tr>
</table>
</form>
<form method="post" enctype="application/x-www-form-urlencoded" >         
      <table width="80%" border="1">
          <!--encabezado de la tabla donde se muestran los datos-->
          <tr bgcolor="#999999"> 
            <td height="23" valign="top"><div align="center">Moneda</div></td>
            <td height="23" valign="top"><div align="center">Fecha</div></td>
            <td height="23" valign="top"><div align="center">Sucursal</div></td>
            <td height="23" valign="top"><div align="center">Debe/Credito</div></td>
            <td height="23" valign="top"><div align="center">Importe</div></td>
            <td height="23" valign="top"><div align="center">F. Anulado</div></td>
          </tr>
          <?php
           //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
            $sql_mov = "";
			if (isset($_POST['btnconsulta1']))
			{
				if (isset($_POST['desde'])||($_POST['hasta'])){
					$a = 1;
					include("datos.php");
		    		$consulta = new consulta();		
					$sql_mov= $consulta-> datos("select * from movimientos a, moneda b, sucursal c where rubro = '$_POST[rubro]' and a.moneda=b.moneda and fecha>=$desde and fecha<=$hasta and a.ax2 = c.sucursal order by fecha desc");
					grilla($sql_mov);
				   }			
	    	}else {
	    			$a = 2;
	    			include("datos.php");
		    		$consulta = new consulta();
					$sql_mov = $consulta-> datos("select * from movimientos a, moneda b, sucursal c where rubro = '$_POST[rubro]' and a.moneda=b.moneda and a.ax2 = c.sucursal order by fecha desc");
					grilla($sql_mov);					  
				   }	
					function grilla($sql_mov){
						while ($row = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
						echo "<tr>\n";
						echo "<td align=center>" . $row['signo'] . "</td>";
						echo "<td align=center>" . $row['fecha'] . "</td>";
						echo "<td align=center>" . $row['descripcion'] . "</td>";
						echo "<td align=center>" . $row['credeb'] . "</td>";	
						echo "<td align=center>" . $row['importe'] . "</td>";
						echo "<td align=center>" . $row['ax4'] . "</td>";
						//echo "<td align=center><a href=EMoneda.php?&moneda=$row[moneda]&descripcion=$row[descripcion]&signo=$row[signo]>" . $row['signo'] ."</a>", "</td>";
						echo "</tr>\n";
					}
				
				   }	

			?>
			    
		</table>
				
</form>

</body>
</html>



  
       


  
       