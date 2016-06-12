<?php
	require_once('funcoes.php');
	conectar('localhost', 'root', '', 'biblioteca');


	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$nascimento = $_POST["nascimento"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];

	$tipo_emprestimo = $_POST["tipo_emprestimo"];
	$nome_item = $_POST["nome_item"];
	$nome_autor = $_POST["nome_autor"];
	$quantidade_item = $_POST["quantidade_itens"];

	$query = "INSERT INTO usuarios VALUES('$nome', '$sobrenome', '$nascimento', '$rg', '$cpf')";
	echo $query;

	mysql_query($query) or die ('Falha ao executar query no banco de dados');

	mysql_close() or die ('Falha ao fechar o banco de dados');

	echo "<br>Inserção OK!!";
?>