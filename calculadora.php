<?php
$expresion = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$expresion = $_POST["expresion"] ?? "";
	$btn = $_POST["btn"] ?? "";
	if ($btn === "C") {
		$expresion = "";
	}elseif ($btn ==="=") {
		$operacion=str_replace(["x"], ["*"], $expresion);
		if (preg_match("#^[0-9+\-*/().]+$#", $operacion)) {
			$resultado = eval("return ($operacion);");
			 $expresion = (string)$resultado;
		}else {
			$expresion= "Error";
		}
	}
else {
	$expresion = $expresion . $btn;
	}
	
}
?>

<!DOCTYPE html>
<html lang= "es">
<head>
<meta charset="UTF-8">
<title>Calculadora</title>
<link rel="stylesheet" href="Stylecalculador.css">
</head>

<body>
	<div class="contenedor">
	<h1 class= "titulo">Calculadora</h1>

	<form method="POST">
		<input type="text" value= "<?php echo htmlspecialchars($expresion);?>"readonly>
		<input type="hidden" name="expresion" value="<?php echo htmlspecialchars($expresion); ?>">
		<a href="../html/index.html" class="btn-volver">Volver</a>
		<button type="submit" name="btn" value="C">Borrar</button>
	
		<table>
			<tr>
				<td><button type= "submit" name= "btn" value= "7">7</button></td>
				<td><button type= "submit" name= "btn" value= "8">8</button></td>
				<td><button type= "submit" name= "btn" value= "9">9</button></td>
				<td><button type= "submit" name= "btn" value= "/">/</button></td>
			</tr>
			<tr>
				<td><button type= "submit" name= "btn" value= "4">4</button></td>
				<td><button type= "submit" name= "btn" value= "5">5</button></td>
				<td><button type= "submit" name= "btn" value= "6">6</button></td>
				<td><button type= "submit" name= "btn" value= "*">x</button></td>
			</tr>
			<tr>
				<td><button type= "submit" name= "btn" value= "1">1</button></td>
				<td><button type= "submit" name= "btn" value= "2">2</button></td>
				<td><button type= "submit" name= "btn" value= "3">3</button></td>
				<td><button type= "submit" name= "btn" value= "-">-</button></td>

			</tr>
			<tr>
				<td><button type= "submit" name= "btn" value= "0">0</button></td>
				<td><button type= "submit" name= "btn" value= ".">.</button></td>
				<td><button type= "submit" name= "btn" value= "=">=</button></td>
				<td><button type= "submit" name= "btn" value= "+">+</button></td>
			</tr>
		</table>
	</form>
	</div>
<script>
function add(valor) {
	document.getElementById("display").value+= valor;
	}
	</script>

</body>
</html>


