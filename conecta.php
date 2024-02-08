<?php
     $servidor = "localhost";
	 $porta = 5432;
	 $bd = "loja_wminformatica";
	 $usuario = "postgres";
	 $senha = "8594";
	 
	 $conexao = pg_connect("host=$servidor port=$porta dbname=$bd
	                        user=$usuario password=$senha");
	if(!$conexao){
        die("Não foi possivel se conectar ao banco de dados.");

        }
		  else{
			  
			  echo "-";
		  }
		  
?>