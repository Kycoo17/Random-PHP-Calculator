<!--25/08/16 Completado, se ha implementado todo lo esencial </p>-->
<!Doctype html>
<html lang="es">
<head>
	<title> Calculadora Random </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
<?php

$amigosJordi = 9;
function tiene_amigos($nombre){
$amigosjordi = 1;
$variable = "$amigos".$nombre."";
if($variable == 0){
	print "{$nombre} no tiene amigos :( <br>";
	return false;
	
} 
else {
	print "{$nombre}  tiene amigos :) <br>";
	return true;
	
}
}
tiene_amigos('Jordi'); 
?>
</body>





















</html>