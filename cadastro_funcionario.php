
<?php include "menu.html";?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastro funcionario</title>
		<style type="text/css">		
		h1{
		   border: 4px solid #000000;
		   border-radius: 20px;
		   text-align:center;
		   margin:20px;
		   background-color: rgb(#00FFFF);
           transition: 1s; 
           cursor: pointer;
		}
		div{
			text-align:center;
		    margin:20px;
			font-weight: bold,
		}

          h1:hover { 
          border: 10px solid white;
          background-color: rgb(0, 0, 0);
		  color:white;
          transition: 1s;  
        }
		body{
		   border: 4px solid #000000;
		   background-image: linear-gradient(to bottom , blue, white);
		}
		
		
		 </style>
		
	</head>
	
	
	<h1>Cadastro funcionario</h1>
		<form action="cadastro_funcionario.php" method="post" autocomplete="off">
		<div>		
		Nome: <input type="text" name="nome_func" placeholder="primeiro nome" value "" required></input>
		Endereço: <input type="varchar" name="end_func" placeholder="digite o endereço" value "" required></input>
		CPF: <input type="text" name="cpf_func" placeholder="cpf" value "" required></input>
		Tipo:<select name="tip">
		</div>
		<?php
		//selectbox.///ok
		    include "conecta.php";
		    $sql="select*from tipo";
			$resultado = pg_query ($conexao, $sql);
	        $linhas = pg_num_rows ($resultado);
			
		    for($i=0; $i < $linhas; $i++){
	          $registro = pg_fetch_array($resultado);
			echo "<option value='$registro[0]'>$registro[1]</option>";
			}
		?>
		
		</select>
		
			
		
		<input type="reset" name="botao" value="Limpar"/>
		<input type="submit" name="botao" value="Enviar"/>
		</form>
	

	
			<?php 
	
	
	if (isset ($_POST['botao'])){
		$nome_func = $_POST ['nome_func'];
		$end_func = $_POST ['end_func'];
		$cpf_func = $_POST ['cpf_func'];
		$tipo_func = $_POST ['tip'];
		
		$sql= "INSERT INTO Funcionario (nome_func,end_func,cpf_func,tipo_func) VALUES('$nome_func','$end_func','$cpf_func','$tipo_func')";
		
		$resultado = pg_query ($conexao, $sql);
		if ($resultado){
			echo " <br>Cadastro realizado com SUCESSO!<br>";
			
		}else{
			echo "erro ao inserir as informações no banco de dados!";
		}	
	}
	?>


	</body>
</html>