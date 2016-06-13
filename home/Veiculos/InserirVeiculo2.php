<html>
<head>
<title>Inserir Veiculos</title>
<link rel="stylesheet" href="estilo.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" type="text/javascript" src="..\MascaraValidacao.js"></script> 
<script>    
    function busca(){
        document.form.submit();
        return true;
    }
    
</script>
</head>
<body onload="document.form.PLACA.focus();">
<form name="form" method="post" action="InserirVeiculo2.php" onsubmit="return busca();">

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
	<tr><td bgcolor="#CCCCCC" align="center" class="titulo">Inseri Veículo</td></tr>
	<tr>
		<table>
			<tr>
				<td>Placa</td>
				<td>Tipo</td>
				<td>Modelo</td>
				<td>Ano</td>
				<td>Cor</td>
				<td>Cliente</td>
			</tr>
			<tr>
				<td><input name="PLACA" type="text" id="PLACA" maxlength="8" onKeyPress="ColocaMascaraPlaca(document.form.PLACA);"/></td>
				<td><select name=TIPO>
				<option value="Carro">Carro</option>
				<option value="Moto">Moto</option>
				<option value="Caminhao">Caminhão</option>
				<option value="Outro">Outro</option>
				</select></td>
				<td><input name="MODELO" type="text" id="MODELO" maxlength="30"/></td>
				<td><input name="ANO" type="text" id="ANO" maxlength="4"/></td>
				<td><input name="COR" type="text" id="COR" maxlength="15"/></td>
				<td><?php
					require_once('funcoes.php');  
					conectar('localhost', 'root','', 'bd_estacionamento');
					$sql=mysql_query("SELECT nome_cliente,id_cliente FROM clientes order by nome_cliente"); 
					echo "<select name=CLIENTES>";
						while($rowl = mysql_fetch_assoc($sql)){
							echo "<option value=". $rowl['id_cliente'] . ">" . $rowl['nome_cliente'] . "</option>"; 
						}
					 echo "</select>";// Closing of list box
				?></td>
				
				<td><input type="submit" name="Submit" value="Incluir"</td>
				
			</tr>
		</table>
	</tr>
</table>

</form>

<?php

	require_once('funcoes.php');
	conectar('localhost', 'root','', 'bd_estacionamento');

	$PLACA = $_POST["PLACA"];
	$TIPO = $_POST["TIPO"];
	$MODELO = $_POST["MODELO"];
	$ANO = $_POST["ANO"];
	$COR = $_POST["COR"];
	$CLIENTES = $_POST["CLIENTES"];

	$query = "INSERT INTO veiculos VALUES('', '$TIPO', '$ANO', '$PLACA', '$MODELO', '$COR', '$CLIENTES')";
	
	mysql_query($query) or die ('Falha ao executar query no banco de dados');
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>

<?php
    require_once('funcoes.php');  
	conectar('localhost', 'root','', 'bd_estacionamento');
	
	$result = mysql_query("SELECT * FROM veiculos");

	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Placa</td><td>Tipo</td><td>Modelo</td><td>Ano</td><td>Cor</td><td>Cliente</td></tr>";
	
	while($row = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row['id_veiculo']."</td>"."<td>".$row['placa_veiculo']."</td>"."<td>".$row['tipo_veiculo']."</td>"."<td>".$row['modelo_veiculo']."</td>"."<td>".$row['ano_veiculo']."</td>"."<td>".$row['cor_veiculo']."</td>";
		$fk = mysql_fetch_assoc(mysql_query("SELECT * FROM clientes where id_cliente='".$row['fk_cliente_veiculo']."'"));
		echo "<td>".$fk['nome_cliente']."</td></tr>";
    }
	
	echo "</table><br><br>";
	
	echo "";
?>

</body>
</html>
