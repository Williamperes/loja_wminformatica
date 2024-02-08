<?php 
	include "conecta.php";
	include "menu.html";
	 session_start();
   ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Busca_campo </title>
         
  </head>
   <body>
      <style>
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
      <h1>Busca funcionario/endereço</h1>
 <form action="busca_campo1.php" method="post" name="funcionario">
	<label>Busca:<input type="text" name="busca"></label>
	
		<select name="campo">
			<option value="nome_func">Nome</option>
			<option value="end_func">Endereço</option>
		</select>
	</label>
	<input type="submit" name="botao"value="Buscar">
</form>


  <?php 
  
        if(isset($_POST['botao']) or isset($_GET['pagina'])){
			
				
		if(isset($_POST['busca'])){
					$_SESSION['busca']=$_POST['busca'];
					$_SESSION['campo']=$_POST['campo'];
				}
				
			
				$busca=$_SESSION['busca'];
				$campo=$_SESSION['campo'];
				
			
				$limite = 2;
				
			 if (isset($_GET["pagina"])) {
                $pagina  = $_GET["pagina"];
            }else{ 
                $pagina=0;
			}
			
			$inicio = $pagina * $limite;
			
			
			 $sql= "SELECT * FROM funcionario WHERE $campo iLIKE '%$busca%'";
			
			 $resultado =  pg_query($conexao, $sql);
			 
			 $linhas = pg_num_rows($resultado);
			 
			 
			$sql_pg = "SELECT * FROM funcionario WHERE $campo iLIKE '%$busca%' ORDER BY nome_func asc LIMIT $limite OFFSET $inicio   ";
               
            $resultado_pg = pg_query($conexao,$sql_pg);
			
            $linhas_pg = pg_num_rows($resultado_pg);
			
			
			   
		echo"<table>
		<tr>
			<caption><h3>Dados da busca: $linhas registros encontrados </h3><caption>
			<th>Nome:</th>
			<th>Endereço:</th>
			<th>cpf</th>
			<th>tipo</th>
			
		  </tr>";
		
	      for ($i=0; $i <$linhas_pg; $i++) { 
    		$registro = pg_fetch_array($resultado_pg);

    		echo"
			<tr>
				<td>$registro[nome_func]<br></td>
				<td>$registro[end_func]<br></td>
				<td>$registro[cpf_func]<br></td>
				<td>$registro[tipo_func]<br></td>
	
					
			   </tr>
		         ";
				 
		    }
			 echo "</table>";
			
			
            $paginas = ceil(pg_num_rows($resultado)/ $limite);
	   
	   if (!isset($_GET['pagina']) or $_GET['pagina']==0) {
               
			   echo"<< anterior";
			   
            }else{ 
			
	           $anterior = $pagina-1;
		  
	   echo "<a href='busca_campo1.php?pagina=".$anterior."'\">".'<< Anterior'."</a>";
	   
			}
	   
	   for($i=0;$i<$paginas;$i++){
		   if(isset($_GET['pagina']) and $_GET['pagina'] == $i){
			   
			   echo $i+1 . "|";
			   
		   }else{
		  
		   echo "<a href='busca_campo1.php?pagina=$i'>".$i+1;
		   echo "</a> |";
		   
		   }
		   
	   }  
		   
		 if (isset($_GET['pagina']) and $_GET['pagina'] == $paginas-1){ 
		 
           echo"Próximo >>";
		 
		  }else{   
		  
		     $proximo = $pagina+1;

		   echo "<a href='busca_campo1.php?pagina=".$proximo."'\>".'Proximo >>'."</a>";
    
		}
		
	}
		
    
 ?>

</body>
</html>