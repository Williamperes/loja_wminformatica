
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




<?php
	include "conecta.php";
		
	if(isset($_POST['editar'])){
		
		$id=$_POST['editar'];
		$sql= "SELECT * FROM compra WHERE cd_compra = '$id  '";
		$resultado= pg_query($conexao,$sql);
		$registro= pg_fetch_array($resultado);
?>		
		<form name="Editar"  action="editaexclui_compra.php" method="post">
			<input type="hidden" name="cd_compra" value="<?=$registro[0]?>">
			
			Data: <input type="date" name="dt_compra" placeholder="data" value="<?=$registro[1]?>"/><br>
			
			
			
					
			<?php 
				include "conecta.php";
		
				$sqlcom = "SELECT * FROM compra";
				$resultadocom = pg_query ($conexao, $sqlcom);
				$linhas = pg_num_rows ($resultadocom);
		
		
				echo"<option value=''>Escolha o tipo</option>";
					for($i=0; $i < $linhas; $i++)
					{
					$registrocom = pg_fetch_array($resultadocom,$i);
					
					if($registro['cd_tipo']==$registrocom['cd_tipo']){
					echo" <option value='$registrocom[0]' selected> $registrocom[1] </option>";
					}else{
						echo" <option value='$registrocom[0]'> $registrocom[1] </option>";
					}
				}					
			?>

			

			<input type="submit" name="botao" value="Enviar"/>
		</form>
		
		
<?php		
	}else if(isset ($_POST['excluir'])){
		
		$id=$_POST['excluir'];
		$sql= "DELETE FROM compra WHERE cd_compra = '$id'";
		$resultado= pg_query($conexao, $sql);
		  
		  if($conexao){
			  echo "excluido com SUCESSO";
		  }else{
			  echo "ERRO ao excluir ";
		  }
		
	}else if(isset ($_POST['botao'])){
		
		$cd_compra = $_POST ['cd_compra'];
		$dt_compra = $_POST ['dt_compra'];
		
		
		$sql= "UPDATE compra
			    SET dt_compra = 'dt_compra'
				WHERE cd_compra = '$cd_compra'
			  ";
		$resultado = pg_query($conexao, $sql);
		if($resultado){
			echo"Registro atualizado com SUCESSO!";
		}else{
			echo "ERRO ao atualizar o registro!";
		}
	}
	
?>	
