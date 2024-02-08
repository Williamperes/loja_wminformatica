<?php include "menu.html";?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cadastro categoria</title>
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
	<body>
	
	<h1>Cadastro categoria</h1>
		<form action="cadastro_categoria.php" method="post" autocomplete="off">
		<div>
		categoria: <input type="text" name="desc_cat" placeholder="descrição" value "" required>
		
		
		<input type="reset" name="botao" value="Limpar"/>
		<input type="submit" name="botao" value="Enviar"/>
		
		</div>
		
		</form>
	

	
			<?php 
			//ok
		include "conecta.php";
	
	if (isset ($_POST['botao'])){
	   	$desc_cat = $_POST ['desc_cat'];
		
		
		$sql= "INSERT INTO categoria (desc_cat) VALUES('$desc_cat')";
		
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