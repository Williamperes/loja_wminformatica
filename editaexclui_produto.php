



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
		$sql= "SELECT * FROM produto WHERE cd_prod = '$id'";
		$resultado= pg_query($conexao,$sql);
		$registro= pg_fetch_array($resultado);
		
?>		<h1>Editaexclui_Produto</h1>

		<form name="Editar"  action="editaexclui_produto.php" method="post">
			<input type="hidden" name="cd_prod" value="<?=$registro[0]?>">
			<div>			
	   Nome: <input type="text" name="nome_prod" placeholder="nome" value="<?=$registro[1]?>"/>
	   Quantidade: <input type="text" name="quant_prod" placeholder="quantidade" value="<?=$registro[2]?>"/>
	    <select name="produto_categoria" id="cat"> 
		</div>
                    <?php  
                        $sql = "SELECT * FROM categoria";
                        $res = pg_query($conexao, $sql);
                        $linhas = pg_num_rows($res);
                        for ($i = 0; $i < $linhas ; $i++) { 
                            $reg = pg_fetch_array($res); 
                            if($reg['cd_cat'] == $registro['tipo_prod']){
                                echo "<option value='$reg[cd_cat]' selected>$reg[desc_cat]</option>";
                            } else{
                                echo "<option value='$reg[cd_cat]'>$reg[desc_cat]</option>";    
                            }
                            
                        }
                    ?> 
                </select>		

			

			<input type="submit" name="botao" value="Enviar"/>
		</form>
		
		
<?php		
	}else if(isset ($_POST['excluir'])){
		
		$id=$_POST['excluir'];
		$sql= "DELETE produto FROM  WHERE cd_prod ='$id'";
	    $sql= "DELETE FROM produto_imagens WHERE cd_prod ='$id'";
		$resultado= pg_query($conexao, $sql);
		  
		  if($conexao){
			  echo "Excluido com SUCESSO";
		  }else{
			  echo "ERRO ao excluir Aluno";
		  }
		//Atualiza os dados no Banco
	}else if(isset ($_POST['botao'])){
		$cd_prod= $_POST['cd_prod'];
		$nome_prod = $_POST ['nome_prod'];
		$quant_prod = $_POST ['quant_prod'];
		$tipo_prod= $_POST ['produto_categoria'];
		
		
		$sql= "UPDATE produto
			    SET  nome_prod = '$nome_prod', quant_prod = '$quant_prod', tipo_prod = '$tipo_prod'
				WHERE cd_prod = '$cd_prod'
			  ";
		$resultado = pg_query($conexao, $sql);
		If($resultado){
			echo"Registro atualizado com SUCESSO!";
		}else{
			echo "ERRO ao atualizar o registro!";
		}
    }
	
?>	
