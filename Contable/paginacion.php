<?php
/*
 * Created on 31/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 
 * 
 */
 
 class paginar{
 	 
	 function control_pagina($sql){	
	 	  include_once("datos.php");
	      $consulta = new consulta();	 
	 	  $aux_sql = $consulta ->datos($sql);
		  $cantidad_registros = mysql_num_rows($aux_sql);
		  $tamano_pagina = 10;
		  $aux_can = $cantidad_registros / $tamano_pagina;
		  $aux_can = $aux_can +1;
		  return $aux_can; 
	 }	  
		function paginacion($sql, $pagina){	
		  			 
       	  if (($pagina == 0) or ($pagina == 1)){
       		$aux_superior = 10;
       		$aux_inferior = 1;
          }else{
       		if ($pagina > 1){
       		$aux_superior = ($pagina * 10) + 1;
       		$aux_inferior = (($pagina * 10) -10) +1;		
       	  }
       }    		
       	
      		$sql_aux = $sql . " limit " . $aux_inferior . "," . $aux_superior;
      		 
      		include_once("datos.php");
	  		$consulta1 = new consulta();
	  		$aux_sql = $consulta1 ->datos($sql_aux);	
	    
	 		return $aux_sql;		 
	 }
	 	  
 }
?>

