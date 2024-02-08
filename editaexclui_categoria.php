



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
//ok
	include "conecta.php";
	include "menu2.html";
		
	if(isset($_POST['editar'])){
		
		$id=$_POST['editar'];
		$sql= "SELECT * FROM categoria WHERE cd_cat = '$id'";
		$resultado= pg_query($conexao,$sql);
		$registro= pg_fetch_array($resultado);
?>		<h1>editaexclui_categoria</h1>
		<form name="Editar"  action="editaexclui_categoria.php" method="post">
		
			<input type="hidden" name="cd_cat" value="<?=$registro[0]?>">
			<div>
			Descrição: <input type="text" name="desc_cat" placeholder="desc" value="<?=$registro[1]?>"/>
					
			<input type="submit" name="botao" value="Enviar"/>
			
			</div>
		</form>
		
		
<?php		
	}else if(isset ($_POST['excluir'])){
		
		$id=$_POST['excluir'];
		$sql= "DELETE FROM categoria WHERE cd_cat = '$id'";
		$resultado= pg_query($conexao, $sql);
		  
		  if($resultado){
			  echo "excluido com SUCESSO";
		  }else{
			  echo "ERRO ao excluir ";
		  }
		
	}else if(isset ($_POST['botao'])){
		
		$cd_cat = $_POST ['cd_cat'];
		$desc_cat = $_POST ['desc_cat'];
		
		
		$sql= "UPDATE categoria
			    SET desc_cat = '$desc_cat'
				WHERE cd_cat = '$cd_cat'
			  ";
		$resultado = pg_query($conexao, $sql);
		if($resultado){
			echo"Registro atualizado com SUCESSO!";
		}else{
			echo "ERRO ao atualizar o registro!";
		}
	}
	
?>	
