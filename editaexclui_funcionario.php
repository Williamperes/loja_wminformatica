

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
		$sql= "SELECT * FROM funcionario WHERE cd_func = '$id'";
		$resultado= pg_query($conexao,$sql);
		$registro= pg_fetch_array($resultado);
?>		
		<form name="Editar"  action="editaexclui_funcionario.php" method="post">
			<input type="hidden" name="cd_func" value="<?=$registro[0]?>">
						
			<h1>editar excluir funcionario</h1>
			<div>
		Nome: <input type="text" name="nome_func" placeholder="primeiro nome" value="<?=$registro[1]?>"/>
		Endereço: <input type="text" name="end_func" placeholder="digite o endereço" value="<?=$registro[2]?>"/>
		CPF: <input type="text" name="cpf_func" placeholder="cpf" value="<?=$registro[3]?>"/>
		Tipo:<select name="funcionario_tipo" id="cat"> 
		</div>
		
                    <?php  
                        $sql = "SELECT * FROM tipo";
                        $res = pg_query($conexao, $sql);
                        $linhas = pg_num_rows($res);
                        for ($i = 0; $i < $linhas ; $i++) { 
                            $reg = pg_fetch_array($res); 
                            if($reg['cd_tipo'] == $registro['tipo_func']){
                                echo "<option value='$reg[cd_tipo]' selected>$reg[desc_tipo]</option>";
                            } else{
                                echo "<option value='$reg[cd_tipo]'>$reg[desc_tipo]</option>";    
                            }
                            
                        }
                    ?> 
                </select>
			

			<input type="submit" name="botao" value="Enviar"/>
		</form>
		
		
<?php		
	}else if(isset ($_POST['excluir'])){
		
		$id=$_POST['excluir'];
		$sql= "DELETE FROM funcionario WHERE cd_func = '$id'";
		$resultado= pg_query($conexao, $sql);
		  
		  if($conexao){
			  echo "excluido com SUCESSO";
		  }else{
			  echo "ERRO ao excluir ";
		  }
		
	}else if(isset ($_POST['botao'])){
		
		$cd_func= $_POST['cd_func'];
		$nome_func = $_POST ['nome_func'];
		$end_func = $_POST ['end_func'];
		$cpf_func = $_POST ['cpf_func'];
		$cd_tipo = $_POST ['funcionario_tipo'];
		
		$sql= "UPDATE funcionario
			    SET nome_func = '$nome_func', end_func = '$end_func', cpf_func = '$cpf_func',tipo_func='$cd_tipo'
				WHERE cd_func = '$cd_func'";
			  
		$resultado = pg_query($conexao, $sql);
		If($resultado){
			echo"Registro atualizado com SUCESSO!";
		}else{
			echo "ERRO ao atualizar o registro!";
		}
	}
	
?>	
