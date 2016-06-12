<html>
	<head>
		<tlte>Classe de conexao</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	</head>
	<?php
		require_once('funcoes.php');
	?>
	<body>
		<h2>Conectando ao Banco de Dados</h2>
		<?php
			$ret = conectar('localhost', 'root', '', 'biblioteca');
			echo "Conexao ".$ret;
		?>
	</body>