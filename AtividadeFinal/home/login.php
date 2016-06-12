<?php
	require_once('funcoes.php');
	conectar('localhost', 'root', '', 'bd_estacionamento');

	$user = $_POST["user"];
	$password = $_POST["password"];
	
	$resultado = mysql_fetch_assoc(mysql_query("SELECT password FROM usuarios WHERE user='".$user."'"));
	
	if ($resultado['password'] == ""){	
		header('Location: \atividadefinal\index.html');
	} elseif ($resultado['password'] == $password) {
		header('Location: home.html');
	} else {
		header('Location: \atividadefinal\index.html');
	}
	
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>