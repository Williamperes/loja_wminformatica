<?php include "menu.html";?>

<!DOCTYPE html>
<html>
<head>
	<title>lista_produto_imagens.php</title>
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
	        <caption><h1>lista_produto_imagens</h1><caption>
			<caption><h3>Dados dos $linhas registros encontrados!</h3><caption>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Categoria</th>
			<th>Editar</th>
			<th<Excluir</th>
			<th>Fotos</th>
			<th>Fotos</th>
			<th>Fotos</th>
		    
		     
		";
			
		
		for($i=0; $i < $linhas; $i++){
	$registro = pg_fetch_array($resultado);
	
	
	
		$id=$registro['cd_prod']; 
		echo"
			<tr>
			
			
                   <td> $registro[nome_prod] </td>
                   <td> $registro[quant_prod] </td>
                   <td> $registro[desc_cat] </td>
				   
			
	 <td><button name='editar' value='$registro[0]'>Editar</button>	
				<button name='excluir' value='$registro[0]'>Excluir</button></td>";
	
				   
				   
				   
				   
			$sql_img = "SELECT * FROM produto_imagens WHERE id_prod = '$id'";
			
                $resultado_img = pg_query($conexao, $sql_img);
                $linhas_img = pg_num_rows($resultado_img);
				
				

                for($j=0; $j<$linhas_img; $j++){
                    $registro_img = pg_fetch_array($resultado_img);
					
					
                    $imagens = $registro_img['arquivos']; //caminho da imagen no servidor
					
					
                    echo"<td> <img  src= '$imagens' width='200' height='100'> </td>";
                }
					  

				echo "</tr>
				
				
				
		";
		
	}
	echo"</table>";
	echo "</form>";

?>
</body>
</html>