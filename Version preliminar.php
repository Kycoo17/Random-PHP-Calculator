<!Doctype html>
<html lang="es">
<head>
	<title> Calculadora Random </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel='stylesheet' href='style - Copia.css'/>
</head>
<body >

	<div class="container">
		<header>
		   <div id="header">
				<h1 id="title">RandomGen</h1>
			</div>
		</header>
		<div id="content"> 
		<!--<p> hola </p>-->
			    <form method="post">
		
<input type="checkbox" name="cb1" value="Yes"> No repetir numeros<br>
 <p>Minimo <input type="text" name="min" value="1"/></p>
 <p>Maximo <input type="text" name="max" value="100" /></p>
 <p>Valores <input type="text" name="valores" value="1" /></p>
 <p id="ex"> Excluidos(separados por coma) <input style="width:50%" type="text" name="excluido0" value="" id="ex" /></p>

 <p><input type="submit" /></p>
</form>
		
		</div>
		
		<div id ="content2">
		<h1 id="tt"> RESULTADO </h1>
		
		   <?php
   //2.-Creacion del valor $tiradas, neutralizacion de los errores con @ y recopilacion de datos del formulario html
   //UPDATE: Sistema de varios label eliminado y sustituido por separacion por comas, realizadas con explode y array_push
		@$valores=$_POST['valores'];
		@$min=$_POST['min'];
		@$max=$_POST['max'];
        @$strexclude=$_POST['excluido0'];
        @$excluidos=array();     
		$tiradas= 1;
		
		$arrayexclude=explode(",",$strexclude);
		//print_r($arrayexclude);
        
        
//3.-	Creacion de condiciones erradas que causaran un codigo de error.
	

		if ($min==null){
			echo "<p style= \"color:red\"><strong>ERROR: </strong>No has insertado el valor minimo.</p>";
		}
		elseif($max==null) {
			echo "<p style= \"color:red\"><strong>ERROR: </strong>No has insertado el valor maximo.</p>";
		}
		elseif($valores==null) {
			echo "<p style= \"color:red\"><strong>ERROR: </strong>No has insertado el valor maximo.</p>";
		}
		elseif ($max==0) {
			echo "<p style= \"color:red\"><strong>ERROR: </strong>El valor maximo no puede ser 0</p>";
		}
		elseif ($min>=$max){
			echo "<p style= \"color:red\"><strong>ERROR: </strong>{$min} es superior a {$max}</p>";
		}
		elseif (isset($_POST['cb1']) and ($max-$min)<= $valores) {
			echo "<p style= \"color:red\"><strong>ERROR loop</p>";
		}
		elseif (count($arrayexclude)>=($max-$min)) {
			echo "<p style= \"color:red\"><strong>ERROR loop 2</p>";
		}
	
		// 4.- Si no se causa ningun error de los anteriores se procedera a generar un numero al azar a partir de los datos insertados por el usuario 
        
        

		else {
			while ($tiradas <= $valores) {
				$tiradas ++;
				$resultado= @rand("$min","$max");
                //foreach ($excluidos as $no) {
                  //  while (@in_array($resultado,$excluidos)) {
                    //    $tiradas --;
                      //  $resultado = @rand("$min","$max") ;
                     // }
                    if (@in_array($resultado,$arrayexclude)) {
                    $tiradas --;
                    }
                    else {
						if(isset($_POST['cb1']) && 
                        $_POST['cb1'] == 'Yes') {
                        @array_push ( $arrayexclude , $resultado );
						}
                        echo "<p id=\"res\"><strong>|$resultado|&nbsp;</strong></p>";
                    }
                //}
		if ($resultado==null){
// En el caso de que por qualquier motivo $resultado no tenga ningun valor se mostrara el mensaje de error.
			echo "ERROR"; 
		}
		}
        }
        
	?>
		</div>
		<footer>
		<div id="foot">
			<p id="ft" >Made by Thomas</p>
		</div>
		</footer>
	</div>
</body>





















</html>