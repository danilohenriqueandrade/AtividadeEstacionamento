<?php
	require_once('funcoes.php');
	conectar('localhost', 'root', '', 'bd_estacionamento');

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
			header('Location: home\home.html');
			
		} else {
			
			header('Location: AlteraSenha.html');
			echo "<script>alert('Senha incorreta!);</script>";
			
		}
		
	} else {
		
		header('Location: AlteraSenha.html');
			
	}
	
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>