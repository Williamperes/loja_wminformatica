<!DOCTYPE html>
<html>
<head>
	<title>lista_compra.php</title>
	<meta charset="UTF-8">
	<style type="text/css">
		 table,tr,td,th {border: 2px solid blue;
		text-align: center;}
		</style>
</head>
<body>

<?php 
	
	include "conecta.php";
	
	$sql = "SELECT * FROM compra,produto,funcionario WHERE produto.cd_prod=funcionario.cd_func";
	$resultado = pg_query ($conexao, $sql);
	$linhas = pg_num_rows ($resultado);
	
	
	echo "<form action='editaexclui_compra.php' method='post'>";
	echo"<table>
			<caption><h3>Dados dos $linhas registros encontrados!</h3><caption>
			<th>produto</th>
			<th>funcionario</th>
			<th>Editar Excluir</th>
		";
		for($i=0; $i < $linhas; $i++){
	$registro = pg_fetch_array($resultado);
		
		echo"
			<tr>
				<td>$registro[nome_prod]<br></td>
				<td>$registro[nome_func]<br></td>
				
				<td><button name='editar' value='$registro[0]'>Editar</button>	
				<button name='excluir' value='$registro[0]'>Excluir</button></td>
			</tr>
				
		";
	}
	echo"</table>";
	echo "</form>";

?>
</body>
</html>