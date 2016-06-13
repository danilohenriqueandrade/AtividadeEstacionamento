<?php
	
	mysql_connect('localhost', 'root', '') or die ("Falha na conexao");
	mysql_select_db('bd_estacionamento') or die ("Falha no acesso" .'bd_estacionamento');

	$user = $_POST["LOGIN"];
	$password = $_POST["SENHA"];
	$newpassword = $_POST["NOVASENHA"];
	$confnewpassword = $_POST["CONFIRMASENHA"];
	
	if ($newpassword == $confnewpassword){
		
		$resultado = mysql_fetch_assoc(mysql_query("SELECT password FROM usuarios WHERE user='".$user."'"));
		
		if ($resultado['password'] == ""){	
			
			header('Location: AlteraSenha.html');
			echo "<script>alert('Senha incorreta!);</script>";
			
		} elseif ($resultado['password'] == $password) {
			
			mysql_query("UPDATE usuarios SET password = '".$newpassword."' WHERE user='".$user."'");
			header('Location: ..\home\index.php');
			
		} else {
			
			header('Location: AlteraSenha.html');
			echo "<script>alert('Senha incorreta!);</script>";
			
		}
		
	} else {
		
		header('Location: AlteraSenha.html');
			
	}
	
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>