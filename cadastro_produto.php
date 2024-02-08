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
	
	<h1>Cadastro produto</h1>
		<form action="cadastro_produto.php" method="post" enctype="multipart/form-data" autocomplete="off">
		<div>					
		Nome: <input type="text" name="nome_prod" placeholder=" nome" value "" required></input>
		Quantidade: <input type="text" name="quant_prod" placeholder="digite o quantidade" value "" required></input>
		
		categoria:<select name="cd_categoria"><br>
		
		
		
		
		
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
	
     
		Imagens do Produto:<input type="file" name="arquivo" id="arquivo">
                           <input type="submit" value="Enviar Imagem" name="botao">
	
<?php 
		
	
	if (isset ($_POST['botao'])){
		$nome_prod = $_POST ['nome_prod'];
		$quant_prod = $_POST ['quant_prod'];
		$tipo_prod = $_POST ['cd_categoria'];
		
		
        $diretorio = "upload_imagens/";
        $caminho_arquivo = $diretorio . basename($_FILES["arquivo"]["name"]);
        $tipo_arquivo = strtolower(pathinfo($caminho_arquivo, PATHINFO_EXTENSION));
        $uploadOk = 1;
		
		
		
     if(isset($_POST["botao"])) {
              $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
       if($check !== false) { 
              echo "Arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
		
            } else { 
              echo "Arquivo NÃO é uma imagem.";
              $uploadOk = 0;
            }
		if (file_exists($caminho_arquivo)) {
              echo "Desculpe, arquivo já existe!";
              $uploadOk = 0;
            }
       if ($_FILES["arquivo"]["size"] > 500000) {
              echo "Desculpe, o tamanho do arquivo ultrapassa o limite.";
              $uploadOk = 0;
            }
       if($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg"
             && $tipo_arquivo != "gif" ) {
             echo "Desculpe, apenas arquivo JPG, JPEG, PNG & GIF files são permitidos.";
             $uploadOk = 0;
            }
        if ($uploadOk == 0) {
             echo "Desculpe, seu arquivo não foi enviado ao servidor.";
	        } else {
		   
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminho_arquivo)) {
                echo "O arquivo ". basename( $_FILES["arquivo"]["name"]). " foi enviado com sucesso.";
				
		$sql= "INSERT INTO produto (nome_prod,quant_prod,tipo_prod,arquivo) VALUES('$nome_prod','$quant_prod','$tipo_prod','$caminho_arquivo')";
		
		
		$resultado = pg_query ($conexao, $sql);
		$registro = pg_fetch_array($resultado);
		
		
		
        if ($resultado){
			echo " <br>Cadastro realizado com SUCESSO!<br><br>";
			
		}else{
			echo "erro ao inserir as informações no banco de dados!";
		}
		
				
				
            } else {
			
                echo "Desculpe, houve um erro durante o envio do arquivo!";
	    
			}
			
			
		}	
		
	  }
	}
	
	?>
	</body>
</html>