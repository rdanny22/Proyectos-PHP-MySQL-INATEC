<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <title>Formulario</title>
</head>

<body>
  
  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">
            <label for="selectCiudad">Ciudad:</label>
            <br>
            <br>
            <select name="ciudad" id="selectCiudad" class="browser-default">
            <option value="" selected>Elige una ciudad</option>
            <?php
			         
			          $data = file_get_contents('data-1.json');
			          $propiedades = json_decode($data, true);
			          
			          $ciudades = array_unique(array_column($propiedades, 'Ciudad'));
			          
			          foreach ($ciudades as $ciudad) {
				            echo "<option value=\"$ciudad\">$ciudad</option>";
			          }
			      ?>              
            </select>
          </div>
          <div class="filtroTipo input-field">
            <label for="selecTipo">Tipo:</label>
            <br>
            <br>
            <select name="tipo" id="selectTipo" class="browser-default">
            <option value="" selected>Elige un tipo</option>
            <?php

			          $tipos = array_unique(array_column($propiedades, 'Tipo'));

			          foreach ($tipos as $tipo) {
				            echo "<option value=\"$tipo\">$tipo</option>";
			          }
			      ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>

    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="divider"></div>
        <form method="post">
          <button type="submit" name="todos" id="mostrarTodos">Mostrar Todos</button>
        </form>              
      </div>
      
      <div>
      <?php
        $busqueda_realizada = false;
          if(isset($_POST['ciudad']) && isset($_POST['tipo']) && isset($_POST['precio'])) {
            $busqueda_realizada = true;
            $ciudad = $_POST['ciudad'];
            $tipo = $_POST['tipo'];
            $precio = $_POST['precio'];

            $json = file_get_contents('data-1.json');
            $data = json_decode($json, true);

            $encontrado = false;
            foreach ($data as $registro) {
              if (($ciudad == '' || $registro['Ciudad'] == $ciudad) && ($tipo == '' || $registro['Tipo'] == $tipo)) {
                $precio_registro = str_replace('$', '', str_replace(',', '', $registro['Precio']));
                $precio_min = str_replace('$', '', explode(';', $precio)[0]);
                $precio_max = str_replace('$', '', explode(';', $precio)[1]);
                if ($precio_registro >= $precio_min && $precio_registro <= $precio_max) {
                  echo '<div class="itemMostrado card">';
                  echo '<img src="img/home.jpg">';
                  echo '<div class="card-stacked">';
                  echo '<strong>Dirección: </strong>' . $registro['Direccion'] . '<br>';
                  echo '<strong>Ciudad: </strong>' . $registro['Ciudad'] . '<br>';
                  echo '<strong>Teléfono: </strong>' . $registro['Telefono'] . '<br>';
                  echo '<strong>Código Postal: </strong>' . $registro['Codigo_Postal'] . '<br>';
                  echo '<strong>Tipo: </strong>' . $registro['Tipo'] . '<br>';
                  echo '<strong>Precio: </strong>' . $registro['Precio'] . '<br>';
                  echo '</div></div>';
                  $encontrado = true;
                }
              }
            }if (!$encontrado) {
              echo "No hay propiedades con las características que buscas.";
            }
          }

          if(isset($_POST['todos'])) {
            $json = file_get_contents('data-1.json');
            $data = json_decode($json, true);

              foreach ($data as $registro) {
                echo '<div class="itemMostrado card">';
                echo '<img src="img/home.jpg">';
                echo '<div class="card-stacked">';
                echo '<strong>Dirección: </strong>' . $registro['Direccion'] . '<br>';
                echo '<strong>Ciudad: </strong>' . $registro['Ciudad'] . '<br>';
                echo '<strong>Teléfono: </strong>' . $registro['Telefono'] . '<br>';
                echo '<strong>Código Postal: </strong>' . $registro['Codigo_Postal'] . '<br>';
                echo '<strong>Tipo: </strong>' . $registro['Tipo'] . '<br>';
                echo '<strong>Precio: </strong>' . $registro['Precio'] . '<br>';
                echo '</div></div>';
              }
            }
          ?>
      </div>
    </div>
    
  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  
</body>
</html>
