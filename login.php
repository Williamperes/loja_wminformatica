
<?php
    include "conecta.php";

?>  
 	<head>
 		<style>
		*{
			margin:0;
			padding:0;
		}
		#cadastro{
			width: 20vh;
			padding: 50px;
			background-color: #551fbd;
			border-radius:0.5vh;
			margin:  20px auto;
			height: 10vh;
		}
		#cadastro input{
			border-radius: 0.5vh;
			margin: auto;
		}
		#cadastro input[name="Acessar"]{
			margin: 2.9vh;
		}
		#cadastro label{
			text-transform: uppercase;
			font-family: arial;
			font-size: 1.9vh;
			font-weight: bold;
		}
		#titulo {
			color:#b8df10;
			text-align: center;
			background-color: #390879;
			font-size: 40px;
			font-family:Impact;
		}
	#main-footer {
   			
			background-color: black;
			position: absolute;
            bottom: 0;
            width: 100%;
            height: 5.5rem; 
			}
        
	
      
		ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #b8df10;
			}

			li {
				float: left;
			}

			li a {
				color: #000;
				text-decoration: none;
				padding: 8px 16px;
				display: block;
				font-family: 'monospace',sans-serif; 
			}

			li a:hover {
				background-color: #000;
				color: white;
			}

			.conteudo_dropdown {
				display: none;
				position: absolute;
				background-color: #b8df10;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}

			.conteudo_dropdown li{
				float: none;
			}

			.conteudo_dropdown a {
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
			}

			.conteudo_dropdown a:hover { background-color: #000; }

			.dropdown:hover .conteudo_dropdown {
				display: block;
			}
				
			
	</style>
	
 	</head>

 	     <center id="titulo"> loja_wminformática </center>
	<body>
        <nav>
			<ul>
				<li><a href="lista_funcionario.php" class="home">Funcionario</a></li>
				<li class="dropdown">
					<a href="login.php" class="noticias" >Categorias</a>
					<ul class="conteudo_dropdown">
					    <li><a href="cadastro_funcionario.php">Cadastro Funcionario</a></li>
						<li><a href="cadastro_produto.php">Cadastro Produto</a></li>
						<li><a href="cadastro_produto_multiple.php">Cadastro Produtos e Imagens</a></li>
						<li><a href="cadastro_tipo.php">Cadastro Tipo</a></li>
						<li><a href="cadastro_categoria.php">Cadastro Categoria</a></li>
						<li><a href="cadastro_compra.php">Cadastro Compra</a></li>
						<li><a href="busca.php">Busca</a></li>
						<li><a href="busca_campo1.php">Busca Campo</a></li>
					</ul>	
				</li>
				<li><a href="lista_produto_imagens.php ">Produto</a></li>
				<li><a href="lista_tipo.php">Tipo</a></li>
				<li><a href="lista_categoria.php">Categoria</a></li>
			</ul>
		</nav>	

     
	<form action='login.php' method='post' id="cadastro">
		<label>Login: <input type='text' name='login'></label>
		<label>Senha: <input type='password' name='senha'></label>
		<a href="email/recupera_senha.php" style="color:white" >Esqueceu a senha?</a>
		<input type='submit' name='botao' value='Acessar'>
	</form>
<?php
        if(isset($_POST['botao'])){
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			
            $sql = "SELECT * FROM funcionario 
					WHERE login = '$login' AND senha = '$senha'";
        
            $resultado = pg_query($conexao, $sql);
			$linhas = pg_num_rows($resultado);
			
			
			
            if($linhas==1){
				$registro = pg_fetch_array($resultado);
				
				session_start();
				$_SESSION['nome_func'] = $registro['nome_func'];
				$_SESSION['tipo_func'] = $registro['tipo_func'];
				$_SESSION['logado'] = true;
		
				header("location: index.php");
			}else{
				echo " Erro ao Logar!";
			}
	}
?>

	
   <footer id="main-footer">

		<a class="action" href="https://www.instagram.com/">
				<img src="img/instagram.jpg" height="80" width="100" alt="">
		    </a>
             <a class="action" href="https://twitter.com/">
				<img src="img/twitter.png" height="80" width="200" alt="">
		     </a>
		       <a class="action" href="https://pt-br.facebook.com/">
		    <img src="img/facebook.png" height="80" width="100" alt="">
		</a>
   
   </footer>
 </body>
</html>