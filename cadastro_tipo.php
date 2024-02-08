<?php include "menu.html";?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Titulo do documento</title>
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
	
	<h1>Cadastro tipo</h1>
		<form action="cadastro_tipo.php" method="post" autocomplete="off">
			
		    <div>	
	           Tipo: <input type="text" name="desc_tipo" placeholder="descrição" value "" required></input>
		
		
		       <input type="reset" name="botao" value="Limpar"/>
		      <input type="submit" name="botao" value="Enviar"/>
		    </div>
		</form>
	
	
			<?php 
			//ok
		include "conecta.php";
	
	if (isset ($_POST['botao'])){
	  	$desc_tipo = $_POST ['desc_tipo'];//Os arrays superglobals $_GET e $_POST são 
		                                    //utilizados para coletar dados de um formulário.
			
		$sql= "INSERT INTO tipo (desc_tipo) VALUES('$desc_tipo')";
		
		$resultado = pg_query ($conexao, $sql);//A função pg_query() envia um comando SQL para o banco de dados.
		if ($resultado){
			echo " <br>Cadastro realizado com SUCESSO!<br>";
			
		}else{
			echo "erro ao inserir as informações no banco de dados!";
		}	
	}
?>


	</body>
</html>