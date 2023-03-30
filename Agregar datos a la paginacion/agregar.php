<?php 
    $conectar = new mysqli("localhost", "root", "", "paginacion");

    $nombre 	= $_POST['Nombre'];
    $apellido 	= $_POST['Apellido'];
        
	mysqli_query($conectar, "INSERT INTO personas(Nombre,Apellido) VALUES('$nombre','$apellido')");
    
    header("Location:index.php");
	

?>
