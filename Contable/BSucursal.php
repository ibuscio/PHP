<html><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Buscar sucursal</title>
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
<form method="post"  onSubmit="return validacion(this)" name="doc" enctype="application/x-www-form-urlencoded" >
<p><strong>Administración de sucursal</strong> </p>
<blockquote> 


  Localidad <input name="localidad" type="int"/><br/>
  
   
<p align="center"> 
<input name="submit_nom" type="submit"  value="Buscar""><A HREF="Index.php""> Ir a Menú </A> 

</p></td>
</tr>
 <SCRIPT LANGUAGE="JavaScript">
      function validacion(f)  {
		
 			if (document.doc.localidad.value.length==0){
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
          if (isset($_POST['localidad'])){
          echo "<b>";   
         }else if (isset($_POST['localidad'])){
          echo "<b>";
             echo $_POST['localidad'];
             
          echo"</b>";
          }
          ?>
              <table width="80%" border="1">
	              <!--encabezado de la tabla donde se muestran los datos-->
	              <tr bgcolor="#999999"> 
	                <td  valign="top"><div align="center">Sucursal</div></td>
	                <td height="23" valign="top"><div align="center">Localidad</div></td>
	              </tr>
	              <?php
	               //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
	                include("datos.php");
					$consulta = new consulta();
					$sql_localidad = $consulta-> datos("select * from sucursal where descripcion like '%$_POST[localidad]%'");
					
					while ($row = mysql_fetch_array($sql_localidad, MYSQL_ASSOC)) {
						echo "<tr>\n";
						echo "<td align=center>" . $row['sucursal'] . "</td>";
						echo "<td align=center><a href=ESucursal.php?&sucursal=$row[sucursal]&localidad=$row[descripcion]>" . $row['descripcion'] ."</a>", "</td>";
						echo "</tr>\n";
					}
					?>       
				</table>
				
</form>

</body>
</html>




