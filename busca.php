
<?php include "menu.html";?>

    <h1>Busca funcionario</h1>
     <form action="busca.php" method="post" name="funcionario">
	       <label>Busca:<input type="text" name="busca"></label>
	 <input type="submit" name="botao">
	
    </form>

      <style >
        table,tr,td,th{
		   border: 4px solid #000000;
           margin:0 auto;		
		   }	
        body{
		   text-align: center;
		   border: 4px solid #000000;
		   background-image: linear-gradient(to bottom , blue, white);
		}
		h3{
			
		   border: 4px solid #000000;
		}
			
		 </style>
		 
		
<?php 
	include"conecta.php";
    
    if(isset($_POST['botao'])){
    	$busca = $_POST['busca'];
    	$sql = "SELECT * FROM funcionario WHERE nome_func iLIKE '%$busca%'";
		$resultado = pg_query($conexao, $sql);
	    $linhas = pg_num_rows($resultado);
		
		   
			echo"<table>
			<caption><h3>Dados dos $linhas registros encontrados!</h3><caption>
			<th>Nome:</th>
			<th>Endereço:</th>
			<th>cpf</th>
			
		";
		
		
    	for ($i=0; $i < $linhas; $i++) { 
    		$registro = pg_fetch_array($resultado, $i);
			
			echo"
			<tr>
				<td>$registro[nome_func]<br></td>
				<td>$registro[end_func]<br></td>
				<td>$registro[cpf_func]<br></td>
	
					
			</tr>
				
		      ";		
    		
    	}
    }
	
	   echo"</tabela>";
 ?>

 </body>