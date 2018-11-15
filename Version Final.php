<!--25/08/16 Completado, se ha implementado todo lo esencial </p>-->
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
		<!-- He añadido mi propia funcion para asi no reescribir todo el rato el codigo en el formulario, la finalidad de esta funcion
             es que haya un valor predefinido en cada label, y una vez se inserte uno diferente, se guarde.		-->
			    <form method="post">
				<?php
				function formvalue($valor,$form){
					if (@$_POST["{$form}"]==null){
						echo $valor;
					}
					else {
						echo @$_POST["{$form}"];
					}
				}
				function checkvalue(){
					if (isset($_POST['cb1'])) {
						echo "checked";
					}
					else {
						echo "";
					}
				}
				
				
				?>
		
<input type="checkbox" name="cb1" value="Yes" <?php checkvalue() ?>> No repetir numeros<br>
 <p>Minimo <input type="text" name="min" value="<?php formvalue(1,"min") ?>"/></p>
 <p>Maximo <input type="text" name="max" value="<?php formvalue(100,"max") ?>" /></p>
 <p>Valores <input type="text" name="valores" value="<?php formvalue(1,"valores") ?>" /></p>

 <p id="ex"> Excluidos(separados por coma) <input style="width:50%" type="text" name="excluido0" value="<?php formvalue(1,"excluido0") ?>" id="ex" /></p>
<div class="wrapper">
   

 <p><input type="submit" class="button" /></p>
 </div>
</form>
		
		</div>
		
		<div id ="content2">
		<h1 id="tt"> RESULTADO </h1>
		
		   <?php
   //2.-Creacion del valor $tiradas, neutralizacion de los errores con @ y recopilacion de datos del formulario html
   //UPDATE: Sistema de varios label eliminado y sustituido por separacion por comas, realizadas con explode y array_push,
		@$valores=$_POST['valores'];
		@$min=$_POST['min'];
		@$max=$_POST['max'];
        @$strexclude=$_POST['excluido0'];
        @$excluidos=array();     
		$tiradas= 1;
		$arrayexclude=explode(",",$strexclude);
		//print_r($arrayexclude);
        
        
//3.-	Creacion de condiciones erradas que causaran un codigo de error.
//Edit 24/08/16: Resueltos bugs en errores loop anadiendo 1, y puesto otro caso de error posible desde el uso de explode,ademas ya no da error antes de postear
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
	

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
		elseif (isset($_POST['cb1']) and ($max-$min+1)< $valores) {
			echo "<p style= \"color:red\"><strong>ERROR loop</p>";
		}
		elseif (count($arrayexclude)>=($max-$min+1)) {
			echo "<p style= \"color:red\"><strong>ERROR loop 2</p>";
		}
		elseif (isset($_POST['cb1']) and ((count($arrayexclude)+$valores)) > ($max-$min+1)){
			echo "<p style= \"color:red\"><strong>ERROR loop 3</p>";
		}
		else {
			while ($tiradas <= $valores) {
				$tiradas ++;
				$resultado= @rand("$min","$max");
                if (@in_array($resultado,$arrayexclude)) {
                    $tiradas --;
                }
                else {
					if(isset($_POST['cb1']) && $_POST['cb1'] == 'Yes') {
                        @array_push ( $arrayexclude , $resultado );
					}
                        echo "<p id=\"res\"><strong>|$resultado|&nbsp;</strong></p>";
                    }
                }
		}
        }
		
		
	
		// 4.- Si no se causa ningun error de los anteriores se procedera a generar un numero al azar a partir de los datos insertados por el usuario 
        
        


        
	?>
		</div>
		<footer>
		<div id="foot">
			<p id="ft" >Calculadora aleatoria escrita en codigo fuente PHP 5.6.23</p>
		</div>
		</footer>
	</div>
</body>





















</html>