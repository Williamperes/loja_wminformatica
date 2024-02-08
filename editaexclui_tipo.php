

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
		$sql= "SELECT * FROM tipo WHERE cd_tipo = '$id'";
		$resultado= pg_query($conexao,$sql);//A função pg_query() envia um comando SQL para o banco de dados.
		$registro= pg_fetch_array($resultado);// retorna um array que corresponde à linha (registro).
?>		
            <h1>editaexclui_tipo</h1>    
		<form name="Editar"  action="editaexclui_tipo.php" method="post">  
		
			<input type="hidden" name="cd_tipo" value="<?=$registro[0]?>">
			<div>
			Descrição: <input type="text" name="desc_tipo" placeholder="tipo" value="<?=$registro[1]?>"/>	
			<input type="submit" name="botao" value="Enviar"/>
			
			</div>
		</form>
		
		
<?php		
	}else if(isset ($_POST['excluir'])){//A função isset verifica se a variável existe, ou seja, foi
                                        //passada pelo formulário através do botão de edição
		$id=$_POST['excluir'];
		$sql= "DELETE FROM tipo WHERE cd_tipo = '$id'";
		$resultado= pg_query($conexao, $sql);
		  
		  if($conexao){
			  echo "excluido com SUCESSO";
		  }else{
			  echo "ERRO ao excluir ";
		  }
		
	}else if(isset ($_POST['botao'])){
		
		$cd_tipo = $_POST ['cd_tipo'];
		$desc_tipo = $_POST ['desc_tipo'];
		
		
		$sql= "UPDATE tipo
			    SET desc_tipo = '$desc_tipo'
				WHERE cd_tipo = '$cd_tipo'
			  ";
		$resultado = pg_query($conexao, $sql);
		if($resultado){
			echo"Registro atualizado com SUCESSO!";
		}else{
			echo "ERRO ao atualizar o registro!";
		}
	}
	
?>	
