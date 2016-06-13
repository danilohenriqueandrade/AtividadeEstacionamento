<html>
<head>
<title>Inserir Cliente</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>    
    function busca(){
        document.form.submit();
        return true;
    }
    
</script>
</head>
<body onload="document.form.CAMPOBUSCA.focus();">
<form name="form" method="post" action="InserirCliente2.php" onsubmit="return busca();">

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
	<tr><td bgcolor="#CCCCCC" align="center" class="titulo">Inseri Cliente</td></tr>
	<tr>
		<table>
			<tr>
				<td>Nome: <input name="NOME" type="text" id="NOME"/></td>
				<td>RG: <input name="RG" type="text" id="RG"/></td>
				<td><input type="submit" name="Submit" value="Incluir"</td>
			</tr>
		</table>
	</tr>
</table>

</form>

<?php

	require_once('funcoes.php');
	conectar('localhost', 'root','', 'bd_estacionamento');

	$NOME = $_POST["NOME"];
	$RG = $_POST["RG"];

	$query = "INSERT INTO clientes VALUES('', '$NOME', '$RG')";
	
	mysql_query($query) or die ('Falha ao executar query no banco de dados');
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>

<?php
    require_once('funcoes.php');  

	conectar('localhost', 'root','', 'bd_estacionamento');
	
	$result = mysql_query("SELECT * FROM clientes");

	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Nome</td><td>RG</td></tr>";
	
	while($row = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row['id_cliente']."</td>"."<td>".$row['nome_cliente']."</td>"."<td>".$row['rg_cliente']."</td>";
    }
	
	echo "</table><br><br>";
	
	echo "";
?>

</body>
</html>
