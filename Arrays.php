<main class="main_padding-top">
      <div class="container">
            <div class="row">
                <div class="col-lg-12">
      		<h1>Como crear un array :</h1><br>
      		//Esta linea sirve para quitar los advertencias de varibles undefined entre otros errores.<br>
      		error_reporting(1);<br>
      		//Declaracion de varibales.<br>
      		$nombre = "Brandon Axell Ruiz";<br>
      		$edad = 22;<br>
      		$fechaNacimiento = "18-07-2018"; <br>
      		$miArray = [];<br>
      		//Creacion de mi array con las variables previamente declaradas.<br>
      		$miArray[] = array(
      			"nombre" => $nombre,
      			"edad" => $edad, 
      			"fechaNacimiento" => $fechaNacimiento
      		);<br>
      		<br>
      		<h1>Envia tu array</h1>
      		<form method="POST">
      			<label for="nombre">Nombre:</label>
      			<input type="text" name="nombre" />
      			<label for="edad">Edad:</label>
      			<input type="number" name="edad" min="1"/>
      			<label for="fechaNacimiento">Fecha de Nacimiento:</label>
      			<input type="date" name="fechaNacimiento" />
      			<button type="submit"> Enviar</button>
      		</form>
      		<br>
      		var_dump($miArray);
      		<?php
      		//esta lnea sirve para quitar los avisos 
      		error_reporting(1);
      		$nombre = "Brandon Axell Ruiz";
      		$edad = 22;
      		$fechaNacimiento = "18-07-2018"; 
      		$miArray = [];
      		if(isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['fechaNacimiento'])){
      			$miArray[] = array(
      				"nombre" => $_POST['nombre'],
      				"edad" => $_POST['edad'],
      				"fechaNacimiento" => $_POST['fechaNacimiento']
      			);
      		}else{
      			$miArray[] = array(
      				"nombre" => $nombre,
      				"edad" => $edad, 
      				"fechaNacimiento" => $fechaNacimiento
      			);
      		}
      
      		var_dump($miArray);
      		?>
      		<h1>Impreso desde un foreach para descomponer el arreglo :</h1><br>
      
      		foreach ($miArray as $miNuevoArray) {<br>
      		<p>//en esta parte podrias poner cualquier nombre del array que pusiste en otro caso podria ser fechaNacimiento y asi obtener el valor.</p>
      			&nbsp;&nbsp;&nbsp;echo $miNuevoArray["nombre"]; 
      		<br>}<br>
      		Este es el resultado de el echo de la variable $miNuevoArray[nombre]: 
      		<?php
      		foreach ($miArray as $miArray) {
      			echo "<b>".$miArray["nombre"]."</b><br>";
      		}
      		?>
      		<br>
      		<h1>Este el arreglo esta preparado para usarlo en formato JSON (JavaScript Object Notation) :</h1><br>
      		$arrayToJSON = json_encode($miArray);
      		<br>echo $arrayToJSON;
      		<br>
      		<p>Este seria el resultadoe de el array mostrado en formato json</p>
      		<?php 
      		$arrayToJSON = json_encode($miArray);
      		echo $arrayToJSON;
      		?>
          	</div>
          </div>
      </div>
</main>