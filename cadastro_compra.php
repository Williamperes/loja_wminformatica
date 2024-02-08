<?php include "menu.html";?>

<!DOCTYPE html>
<html>
<head>

   <meta charset="UTF-8">
		<title>Cadastro compra</title>
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
	
	
	      <h1>Cadastro compra</h1>
       <?php 
           include "conecta.php"; 
         ?>
    <div>
    <form name ='cadastro' action='cadastro_compra.php' method='post'>
           <label>Funcionário:
            <select name="funcionario">
             <?php   
                        $sql = "SELECT * FROM  funcionario";
                        $res = pg_query($conexao, $sql);
                        $linhas = pg_num_rows($res);
                        for ($i=0; $i < $linhas ; $i++) { 
                             $reg = pg_fetch_array($res); 
                             echo"<option value='$reg[cd_func]'>$reg[nome_func]</option>";
                        }
                    ?>    
            
           </select>
       </label>
         <label>Produto:
            <select name="produto" >
                <?php  
                $sql = "SELECT * FROM produto";
                $res = pg_query($conexao, $sql);
                $linhas = pg_num_rows($res);
                for ($i = 0; $i < $linhas ; $i++) { 
                    $reg = pg_fetch_array($res); 
                    echo "<option value='$reg[cd_prod]'>$reg[nome_prod]</option>";
                }
            ?>
           </select>
       </label>
            <input type="date" name="data">
            <input type='submit' name='botao' value='Cadastrar'>
            <input type='reset'>
        </form>
</div>
<?php 
	if(isset($_POST['botao'])){
        $funcionario = $_POST['funcionario'];
        $produto= $_POST['produto'];
        $data = $_POST['data'];
        $sql = "INSERT INTO compra (cd_func, cd_prod, dt_compra) VALUES ('$funcionario', '$produto', '$data')";

        $resultado = pg_query($conexao, $sql);
        if($resultado){
            echo "ok!";
        }else{
            echo "Erro ao inserir as informações no banco de dados!";
        }
    } 
    
 ?>
</body>
</html>
