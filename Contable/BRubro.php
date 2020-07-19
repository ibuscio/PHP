<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Buscar Rubro</title>
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
<form method="post"  onSubmit="return validacion(this)"  name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese el Rubro</strong> </p>
<blockquote> 
<table>
<tr>
	<td>
  		Rubro <input name="rubro" type="int"/><br/>
	</td>
	<td>
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
         
          <?php
          //pregunta si existen las variables, a partir de ésto muestra lo que la persona ingresa 
          //para realizar las busquedas 
          if (isset($_POST['rubro'])){
          echo "<b>";   
         }else if (isset($_POST[rubro])){
          echo "<b>";
             echo $_POST['rubro'];
             
          echo"</b>";
          }
          ?>
              <table width="80%" border="1">
	              <!--encabezado de la tabla donde se muestran los datos-->
	              <tr bgcolor="#999999"> 
	                <td  valign="top"><div align="center">Rubro</div></td>
	                <td height="23" valign="top"><div align="center">Descripción</div></td>
	              </tr>
	              <?php
	               //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
	                include("datos.php");
					$consulta = new consulta();
					$sql_rubro = $consulta-> datos("select * from rubro where rubro = '$_POST[rubro]'");
					
					while ($row = mysql_fetch_array($sql_rubro, MYSQL_ASSOC)) {
						echo "<tr>\n";
						echo "<td align=center>" . $row['rubro'] . "</td>";
						echo "<td align=center><a href=ERubro.php?&rubro=$row[rubro]&descripcion=$row[descripcion]>" . $row['descripcion'] ."</a>", "</td>";
						echo "</tr>\n";
					}
					?> 
				</table>
				
</form>

</body>
</html>




