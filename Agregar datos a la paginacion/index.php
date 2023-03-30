<!DOCTYPE html>
<html>
<head>
	<title>Paginacion en PHP</title>
	
	<style type="text/css">
	
	form {
	padding: 15px 15px;
	background-color: #ff8000;
	margin: calc(30% + 10px);
	margin-top: 30px;
	padding-top: 10px;
	margin-bottom: 10px
	}

	body {
	font-family: 'Arial';
	font-weight: bold;
	font-size: 20px;
	text-align: center;
	padding: 2px;
	color: #444
	}

	input {
	width: calc(40% - 20px);
	margin: auto;
	margin-top: 12px;
	font-size: 16px
}

	input[type='submit']{
	background-color: #1e5799;
	color: #fff;
	width: calc(25% - 20px);
	height: 23px;
	margin: auto;
	margin-top: 22px;
	border: none;
	}

	table{
		width: 520px;
	}
	
	table th{

background: rgba(30,87,153,1);
color: #FFFFFF;
height: 30px;
	}
	   .active > a{
	   	background: rgb(255,116,0); 
	   }
	  ul{
	  	margin-left: 0px;
	  	    padding: 0px;
	  } 
      ul > li{
      	list-style: none;
      	display: inline-block;
      	margin-right:7px;
      }
      ul > li > a {
      	color: #FFFFFF;
      	text-decoration: none;
      	padding: 5px 10px 5px 10px;
        display: block;
		background: #1e5799;
		border-radius: 20px;

      }
      .btn > a{
      	padding: 3px;
		background: #1e5799;
		border-radius: 2px;
		text-align: center;
		width:30px;
      }
      table{
      	border: solid 1px #7E7C7C;
      	border-collapse: collapse;
      }
td , th{
      	border: solid 1px #7E7C7C;
      	padding: 2px;
      	text-align: center;
      }
	</style>
</head>

<body>
<div>
	<form action="agregar.php" method="POST"> 
		INTRODUZCA UN NUEVO NOMBRE Y APELLIDO
           <input type="text" placeholder="Nombre "  name="Nombre"  required>
           <input type="text" placeholder="Apellido" name="Apellido" required>
           <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">   
 	</form>
</div>
<div>
	<center>
		<?php 
		require_once 'paginador.php';
 		?>
    </center>
 </div>
</body>
</html>


