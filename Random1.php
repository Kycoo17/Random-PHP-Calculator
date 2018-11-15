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
 <p id="ex"> Excluidos <input style="width:12px" type="text" name="excluido0" value="" id="ex" /></p>
	<input style="width:12px" type="text" name="excluido1" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido2" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido3" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido4" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido5" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido6" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido7" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido8" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido9" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido10" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido11" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido12" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido13" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido14" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido15" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido16" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido17" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido18" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido19" value="" id="ex" />
	<input style="width:12px" type="text" name="excluido20" value="" id="ex" />
 <p><input type="submit" /></p>
</form>
		
		</div>
		
		<div id ="content2">
		<h1 id="tt"> RESULTADO </h1>
		
		   <?php
   //2.-Creacion del valor $tiradas, neutralizacion de los errores con @ y recopilacion de datos del formulario html
		@$valores=$_POST['valores'];
		@$min=$_POST['min'];
		@$max=$_POST['max'];
        
        @$excluidos=array();     
		$tiradas= 1;
		
			$i=0;
 
			for($i=0; $i < 21; $i++){ 
 
			  ${@"excluido".$i.""} = (@$_POST[@'excluido'.$i.""]);
			 @array_push ( $excluidos ,${"excluido".$i.""} );
 
}
									  
        
        
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
                    if (@in_array($resultado,$excluidos)) {
                    $tiradas --;
                    }
                    else {
						if(isset($_POST['cb1']) && 
                        $_POST['cb1'] == 'Yes') {
                        @array_push ( $excluidos , $resultado );
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