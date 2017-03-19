<?php

    #   Form:
    #   enctype="multipart/form-data"
    
    #   É importante que se cheque o packet size máximo configurado no servidor MySQL. 
    #   Caso este valor esteja muito pequeno podem ocorrer erros de gravação do arquivo na tabela.
        $imagem = $_FILES["imagem"];
        $host = "localhost";
        $username = "tunnes";
        $password = "";
        $db = "imagemTeste";
        
        if($imagem != NULL) { 
        	$nomeFinal = time().'.jpg';
        	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
        		
        		$tamanhoImg = filesize($nomeFinal); 
        
        		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
        
        		mysql_connect($host,$username,$password) or die("Impossível Conectar"); 
        
        		@mysql_select_db($db) or die("Impossível Conectar"); 
        
        		mysql_query("INSERT INTO PESSOA (PES_IMG) VALUES ('$mysqlImg')") or die("O sistema não foi capaz de executar a query"); 
        
        		unlink($nomeFinal);
        		
        		header("location:exibir.php");
        	}
        } 
        else { 
        	echo"Você não realizou o upload de forma satisfatória."; 
        } 
?>

