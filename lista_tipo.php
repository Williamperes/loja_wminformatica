
<?php include "menu.html";?>
<!DOCTYPE html>
<html>
<head>
	<title>lista_tipo</title>
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
	include "conecta.php"; //O comando include adiciona um arquivo dentro 
                       //de outro ,que realiza a  conexão com o banco de dados.
	
	$sql = "SELECT * FROM tipo";
	$resultado = pg_query ($conexao, $sql);//A função pg_query() envia um comando SQL para o banco de dados
	$linhas = pg_num_rows ($resultado);//irá retornar o número de linhas do recurso de resultado
	
	
	echo "<form action='editaexclui_tipo.php' method='post'>";
	echo"<table>
	        <caption><h1>Lista Tipo</h1><caption>
			<caption><h3>Dados dos $linhas registros encontrados!</h3><caption>
			<th>Codigo</th>
			<th>Descrição</th>
			<th>Editar Excluir</th>
		";
		for($i=0; $i < $linhas; $i++){
	$registro = pg_fetch_array($resultado);// retorna um array que corresponde à linha (registro). Retorna false se não existem mais linhas.
		
		
		               //Exibindo as informações de cada produto.

		echo"
			<tr>
				<td>$registro[cd_tipo]<br></td>    
				<td>$registro[desc_tipo]<br></td>
				
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