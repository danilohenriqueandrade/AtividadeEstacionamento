<html>
<head>
<title>Vagas</title>
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
<form name="form" method="post" action="Vagas2.php" onsubmit="return busca();">

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
	<tr><td bgcolor="#CCCCCC" align="center" class="titulo">Relação de Vagas</td></tr>
	<tr>
		<table>
			<tr>
				<td>ID</td>
				<td>Status</td>
				<td>Veículo</td>
			</tr>
			<tr>
				<td><?php
						require_once('funcoes.php');  
						conectar('localhost', 'root','', 'bd_estacionamento');
						$sql=mysql_query("SELECT * FROM vagas order by id_vaga"); 
						echo "<select name=ID>";
							while($row31 = mysql_fetch_assoc($sql)){
								echo "<option value=".$row31['id_vaga'].">".$row31['id_vaga']."</option>";
							}
						 echo "</select>";// Closing of list box
					?></td>
				<td><select name=STATUS>
					<option value="OCUPADO">OCUPADO</option>
					<option value="DISPONIVEL">DISPONÍVEL</option>
				</select></td>
				<td><?php
					require_once('funcoes.php');  
					conectar('localhost', 'root','', 'bd_estacionamento');
					$sql=mysql_query("SELECT * FROM veiculos order by id_veiculo"); 
					echo "<select name=VEICULO>";
					?><option value=""></option><?php
						while($row32 = mysql_fetch_assoc($sql)){
							echo "<option value=".$row32['id_veiculo'].">"."Placa: ".$row32['placa_veiculo']." | Tipo: ".$row32['tipo_veiculo']." | Modelo: ".$row32['modelo_veiculo']." | Ano: ".$row32['ano_veiculo']." | Cor: ".$row32['cor_veiculo']." | Dono: "; 
							$fk1 = mysql_fetch_assoc(mysql_query("SELECT nome_cliente FROM clientes where id_cliente='".$row32['fk_cliente_veiculo']."'"));
							echo $fk1['nome_cliente']."</option>";
						}
					 echo "</select>";// Closing of list box
				?></td>
				
				<td><input type="submit" name="Submit" value="Atualizar"</td>
				
			</tr>
		</table>
	</tr>
</table>

</form>

<?php
	require_once('funcoes.php');
	conectar('localhost', 'root','', 'bd_estacionamento');

	$ID = $_POST["ID"];
	$STATUS = $_POST["STATUS"];
	$VEICULO = $_POST["VEICULO"];
	
	if ($STATUS == "DISPONIVEL"){
		$query = "UPDATE `vagas` SET `status_vaga` ='DISPONIVEL', `fk_veiculo_vaga`=null WHERE `vagas`.`id_vaga` = ".$ID;
		mysql_query($query) or die ('Falha ao executar query no banco de dados');
		atualizaRegistro($ID);
	} else {
		$query = "UPDATE `vagas` SET `status_vaga` = '".$STATUS."', `fk_veiculo_vaga` = '".$VEICULO."' WHERE `vagas`.`id_vaga` = ".$ID;
		mysql_query($query) or die ('Falha ao executar query no banco de dados');
		criaRegistro($ID, $VEICULO);
	}
	
	function criaRegistro($ID, $VEICULO){
		$query2 = "INSERT INTO `registros` (`id_registro`, `entrada_registro`, `saida_registro`, `fk_registro_cliente`, `fk_registro_veiculo`, `fk_registro_vaga`) VALUES ('', NOW(), NULL, NULL, '".$VEICULO."', '".$ID."')";
		mysql_query($query2) or die ('Falha ao executar query no banco de dados');
	}
	
	function atualizaRegistro($ID){
		$VEICULO=mysql_fetch_assoc(mysql_query("SELECT * FROM vagas where id_vaga='".$ID."'"));
		$query2 = "UPDATE `registros` SET `saida_registro`=NOW() WHERE `registros`.`fk_registro_vaga`=".$ID;
		echo $query2;
		mysql_query($query2) or die ('Falha ao executar query no banco de dados');
	}
	
	mysql_close() or die ('Falha ao fechar o banco de dados');

?>

<?php
    require_once('funcoes.php');  

	conectar('localhost', 'root','', 'bd_estacionamento');
	
	$result = mysql_query("SELECT * FROM vagas");

	echo "<table border=5 style=3 width=100%><tr><td>ID</td><td>Status</td><td>Placa</td><td>Tipo</td><td>Modelo</td><td>Ano</td><td>Cor</td><td>Dono</td></tr>";
	
	while($row3 = mysql_fetch_assoc($result)){
        echo "<tr><td>".$row3['id_vaga']."</td>"."<td>".$row3['status_vaga']."</td>";
		$fk2 = mysql_fetch_assoc(mysql_query("SELECT * FROM veiculos where id_veiculo='".$row3['fk_veiculo_vaga']."'"));
		echo "<td>".$fk2['placa_veiculo']."</td><td>".$fk2['tipo_veiculo']."</td><td>".$fk2['modelo_veiculo']."</td><td>".$fk2['ano_veiculo']."</td><td>".$fk2['cor_veiculo']."</td>";
		$fk3 = mysql_fetch_assoc(mysql_query("SELECT * FROM clientes where id_cliente='".$fk2['fk_cliente_veiculo']."'"));
		echo "<td>".$fk3['nome_cliente']."</td></tr>";
    }
	
	echo "</table><br><br>";
	
	echo "";
?>

</body>
</html>
