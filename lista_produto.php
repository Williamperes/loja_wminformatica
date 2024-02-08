<?php include "menu.html";?>

<!DOCTYPE html>
<html>
<head>
	<title>lista_produto.php</title>
	<meta charset="UTF-8">
	<style type="text/css">
		 table,tr,td,th {
	      border: 4px solid #000000;
		
		  margin:0 auto;
		  }
		  h1{
		   border: 4px solid #000000;
		   box-shadow: 5px 10px #BEBEBE;
		}
		 h3{
		  
		  color:white; text-shadow:#000 1px -1px, #000 -1px 1px, #000 1px 1px, #000 -1px -1px;
		}
		body{
		  border: 4px solid #000000;
		   background-image: linear-gradient(to bottom , blue, white);
		}
		 table{
			text-align: center;
			text-transform: uppercase;
		}
		
		</style>
</head>

     
<?php 
	//ok  
	
	include "conecta.php";

	$sql = "SELECT * FROM produto,categoria WHERE tipo_prod=cd_cat";
	$resultado = pg_query ($conexao, $sql);
	$linhas = pg_num_rows ($resultado);
	
	echo "$linhas";
	
	
	echo "<form action='editaexclui_produto.php' method='post'>";
	echo"<table>
	        <caption><h1>Lista produto</h1><caption>
			<caption><h3>Dados dos $linhas registros encontrados!</h3><caption>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Categoria</th>
			<th>Fotos</th>
		     <th>Editar Excluir</th>
		     
		";
		for($i=0; $i < $linhas; $i++){
	$registro = pg_fetch_array($resultado);
		
		echo"
			<tr>
                   <td> $registro[nome_prod] </td>
                   <td> $registro[quant_prod] </td>
                   <td> $registro[desc_cat] </td>
				   <td><img src='$registro[arquivo]' width='150' alt='$registro[nome_prod]'></td>
				   
				   
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