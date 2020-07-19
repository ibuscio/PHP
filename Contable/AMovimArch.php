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
	   echo "<input name='rubro' readonly='true' value=".$_GET['rubro'].">"."</input>";  
      ?>
    </td>
    <td height="10" valign="top">Descripción
     <?PHP
	   echo "<input name='descripcion' readonly='true' value=".$_GET['descripcion'].">"."</input>"; 
      ?>
    </td>
    
    <td>Saldo
    <?PHP
	   echo "<input name='saldo' readonly='true' value=".$_GET['saldo'].">"."</input>";  
      ?>
    </td>
   
 </tr>        
</tr></table>
<table align center>  
 <tr>
 <td>
   Nombre de archivo<input name="archivo" type="date" size="30" maxlength="30"/><br>
  </td>
  </tr>
</table align center>  
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

         
          <?php
           //controla que botón fue activado y dependiendo de ésto ejecuta la consulta que debe ejecutar
            $sql_mov = "";
			if (isset($_POST['btnconsulta1']))
			{
				if (isset($_POST['desde'])||($_POST['hasta'])){
					$a = 1;
					include("datos.php");
		    		$consulta = new consulta();		
					$sql_mov= $consulta-> datos("select * from movimientos a, moneda b, sucursal c where rubro = '$_POST[rubro]' and a.moneda=b.moneda and fecha>=$desde and fecha<=$hasta and ax4='0000-00-00' and a.ax2=c.sucursal and  a.credeb<>0 order by fecha desc");
					archivo_txt($sql_mov);
				   }			
	    	}else {
	    			$a = 2;
	    			include("datos.php");
		    		$consulta = new consulta();
					$sql_mov = $consulta-> datos("select * from movimientos a, moneda b, sucursal c where rubro = '$_POST[rubro]' and a.moneda=b.moneda and ax4='0000-00-00' and a.ax2=c.sucursal and  a.credeb<>0 order by fecha desc");
					archivo_txt($sql_mov);					  
				   }	
		  
			function archivo_txt($sql_mov){

				if (!file_exists("c:\Movimientos/" ."$_POST[archivo]".".txt")) {
					
			   		$ar=fopen("c:\Movimientos/"."$_POST[archivo]".".txt","w") or die("Problemas en la creacion");
			   		fputs($ar,"Rubro");
				   	fputs($ar,";");
				   	fputs($ar,$_POST['rubro']);
					fputs($ar,";");
					fputs($ar,$_POST['descripcion']);
					fputs($ar,";");
				   	fputs($ar,"\n");
			   		fputs($ar,"Fecha");
				   	fputs($ar,";");
				   	fputs($ar,"Sucursal");
				   	fputs($ar,";");
				   	fputs($ar,"Cre/Deb");
				   	fputs($ar,";");
				   	fputs($ar,"Importe");
				   	fputs($ar,"\n");
			   		
					while ($rowAux = mysql_fetch_array($sql_mov, MYSQL_ASSOC)) {
				   	  $i = $i + 1;
				   	  				   	 
					  fputs($ar,$rowAux['fecha']);
					  fputs($ar,";");
					  fputs($ar,$rowAux['descripcion']);
					  fputs($ar,";");
					  fputs($ar,$rowAux['credeb']);
					  fputs($ar,";");
					  fputs($ar,$rowAux['importe']);
					  fputs($ar,"\n");
					  
				   }	
				   fclose($ar);
					
				}else{
					echo "El archivo ya existe";
				
				}
				
					
				
				   				   
			
			}
			
		
			 
			
			?>
			    
		</table>
				
</form>

</body>
</html>



  
       


  
       