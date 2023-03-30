<?php
$CantidadMostrar=10;
$conectar = new mysqli("localhost", "root", "", "paginacion");
if ($conectar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{

    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg       =$conectar->query("SELECT * FROM personas");
	
	$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
	
	$consultavistas ="SELECT
						personas.id,
						personas.Nombre,
						personas.Apellido
						FROM
						personas
						ORDER BY
						personas.id DESC
						LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
                       
	$consulta=$conectar->query($consultavistas);
         echo "<table>
		 	<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Apellido</th>
			</tr>";
	while ($lista=$consulta->fetch_row()) {
	     echo "<tr><td>".$lista[0]."</td><td>".$lista[1]."</td><td>".$lista[2]."</td></tr>";
	}
	    echo "</table>";
     
   	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);
  
	echo "<ul><li class=\"btn\"><a href=\"?pag=".$DecrementNum."\">◀</a></li>";
    
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
         $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     
     for($i=$Desde; $i<=$Hasta;$i++){
     	
     	if($i<=$TotalRegistro){
     		
     	  if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }else {
     	  	echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }     		
     	}
     }
	echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">▶</a></li></ul>";
  
}
?>
