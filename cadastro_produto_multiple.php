<?php include "menu.html";?>

<?php
session_start(); // Iniciar a sessão
?>

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
	
	<h1>Cadastro Produtos e Imagens</h1>
	
		<form action="cadastro_produto_multiple.php" method="post" enctype="multipart/form-data" autocomplete="off">
		<div>					
		Nome: <input type="text" name="nome_prod" placeholder=" nome" value "" required></input>
		Quantidade: <input type="text" name="quant_prod" placeholder="digite o quantidade" value "" required></input>
		
		categoria:<select name="cd_categoria"><br>
		
		</div>
		
		
		
		<?php
		//selectbox.//ok
		    include "conecta.php";
			
		    $sql="select*from categoria";
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
		</form><br><br>
	
     
		Imagens do Produto:<input type="file" name="arquivo[]" multiple="multiple" id="arquivo">
                           <input type="submit" value="Enviar Imagem" name="botao">
	
<?php 
	
	if (isset ($_POST['botao'])){
		$nome_prod = $_POST ['nome_prod'];
		$quant_prod = $_POST ['quant_prod'];
		$tipo_prod = $_POST ['cd_categoria'];
		
		
	     $sql= "INSERT INTO produto (nome_prod,quant_prod,tipo_prod) VALUES('$nome_prod','$quant_prod','$tipo_prod')
		RETURNING cd_prod";
		
	 $resultado = pg_query ($conexao, $sql);
		
		$registro = pg_fetch_array($resultado);
		
        $id_prod=$registro['cd_prod'];  //vetor registro        
     
                   

    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Acessa o IF quando o usuário clicar no botão
    if (!empty($dados['botao'])) {

        // Receber os arquivos do formulário
        $arquivo = $_FILES['arquivo'];

        // Ler o array de arquivos
        for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

            // Criar o endereço de destino das imagens
            $destino = "upload_imagens/" . $arquivo['name'][$cont];

            // Acessa o IF quando realizar o upload corretamente
            if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
				
                $_SESSION['msg'] = "<p>Upload realizado com sucesso!</p>";
			
			
			$sql_img= "INSERT INTO produto_imagens ( id_prod, arquivos) VALUES('$id_prod','$destino')";
			
			 $resultado_img = pg_query ($conexao, $sql_img);
		
		     
				
				
            } else {
                $_SESSION['msg'] = "<p>Erro: Upload não realizado com sucesso!</p>";
            }
        }
    }

         // Imprimir a mensagem de erro ou sucesso da variável global
            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
	    }   }
	
   ?>