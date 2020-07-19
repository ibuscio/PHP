<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Buscar persona</title>
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
<form method="post"  onSubmit="return validacion(this)" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Ingrese el apellido de la persona</strong> </p>
<blockquote> 


  Apellido <input name="apellido" type="int"/><br/>
  
   
<p align="center"> 
<input name="submit_nom" type="submit"  value="Buscar""><A HREF="Index.php""> Ir a Menú </A> 

</p></td>
</tr>
 <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		
 			if (document.doc.apellido.value.length==0){
        		alert("Error:\nTiene que escribir el apellido de la persona")
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
          if (isset($_POST['apellido'])){
          echo "<b>";   
         }else if (isset($_POST['apellido'])){
          echo "<b>";
             echo $_POST['apellido'];
             
          echo"</b>";
          }
          ?>
              <table width="80%" border="1">
	              <!--encabezado de la tabla donde se muestran los datos-->
	              <tr bgcolor="#999999"> 
	                <td  valign="top"><div align="center">Nombre</div></td>
	                <td height="23" valign="top"><div align="center">Apellido</div></td>
	                <td height="23" valign="top"><div align="center">Documento</div></td>
	                <td height="23" valign="top"><div align="center">Usuario</div></td>
	                <td height="23" valign="top"><div align="center">Mail</div></td>
	                <td height="23" valign="top"><div align="center">Telefono</div></td>
	                <td height="23" valign="top"><div align="center">Celular</div></td>
	                <td height="23" valign="top"><div align="center">Dirección</div></td>
	                <td height="23" valign="top"><div align="center">Sucursal</div></td>
	              </tr>
	              <?php
	               //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
	                include("datos.php");
					$consulta = new consulta();
					/*$sql_localidad = $consulta-> datos("select * from usuario where apellido like '%$_POST[apellido]%'  ");*/
					$sql_localidad = $consulta-> datos("select * from usuario a, sucursal b where apellido like '%$_POST[apellido]%' and a.sucursal=b.sucursal limit 10");
					while ($row = mysql_fetch_array($sql_localidad, MYSQL_ASSOC)) {
						echo "<tr>\n";
						echo "<td align=center>" . $row['nombre'] . "</td>";
						echo "<td align=center>" . $row['apellido'] . "</td>";
						echo "<td align=center><a href=EPersona.php?&nombre=$row[nombre]&apellido=$row[apellido]&documento=$row[documento]&usuario=$row[usuario]&mail=$row[mail]&telefono=$row[telefono]&celular=$row[celular]&direccion=$row[direccion]&sucursal=$row[sucursal]&descripcion=$row[descripcion]>" . $row['documento'] ."</a>", "</td>";
						echo "<td align=center>" . $row['usuario'] . "</td>";
						echo "<td align=center>" . $row['mail'] . "</td>";
						echo "<td align=center>" . $row['telefono'] . "</td>";
						echo "<td align=center>" . $row['celular'] . "</td>";
						echo "<td align=center>" . $row['direccion'] . "</td>";
						echo "<td align=center>" . $row['descripcion'] . "</td>";
							 "<td align=center>" . $row['sucursal'] . "</td>";
						echo "</tr>\n";
					}
					?>       
				</table>
			
</form>

</body>
</html>




